require ('dotenv').config();
const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql2');
const jwt = require('jsonwebtoken');


const app = express();
app.use(express.static(__dirname + '/public'));

const port = process.env.PORT || 3000;

app.use(bodyParser.json());

// Create a MySQL connection pool
const pool = mysql.createPool({
    host: '127.0.0.1',
    user: 'root',
    password: '',
    database: 'drugpendtb',
    waitForConnections: true,
    connectionLimit: 10,
    queueLimit: 0
});





app.use(bodyParser.json());


// To register the API USER
app.post('/api/register', (req, res) => {
    const { Username, Password, ProductType } = req.body;
  
    // Query to insert a new user with product type
    const insertUserQuery = 'INSERT INTO `APIUser` (Username, Password, ProductType) VALUES (?, ?, ?)';
    
    pool.query(insertUserQuery, [Username, Password, ProductType], (error, results) => {
      if (error) {
        console.error(error);
        res.sendStatus(400); // Bad Request
      } else {
        res.sendStatus(201); // Created
      }
    });
});

// Route for the API user to login 
app.post('/api/login', (req, res) => {
    const username = req.body.Username;
    const password = req.body.Password;

    const validateUserQuery = 'SELECT * FROM `APIUser` WHERE Username = ? AND Password = ?';

    pool.query(validateUserQuery, [username, password], (error, results) => {
      if (error) {
        console.error(error);
        return res.status(500).json({ error: 'Internal Server Error' });
      }
  
      if (results.length === 0) {
        return res.status(401).json({ error: 'Invalid credentials' });
      }
  
      const user = results[0];
      const productType = user.ProductType;
      
      //For debugging
      console.log('Product Type:', productType);

      if (productType === 'Premium') {
        // Generate an access token with an expiry date for premium users
        const accessToken = jwt.sign({ user }, process.env.ACCESS_TOKEN_SECRET, { expiresIn: '60s' });
        res.json({ accessToken: accessToken, accessLevel: 'secure' });
      } else {
        res.json({ accessLevel: 'unsecure' });
      }
    });
});



//function to generate tokens
function authenticateToken(req,res, next) {
    const authHeader = req.headers['authorization'];
    const token = authHeader && authHeader.split(' ')[1];
    if (token == null) return res.sendStatus(401);

    jwt.verify(token, process.env.ACCESS_TOKEN_SECRET, (err, user) => {
        if (err) return res.sendStatus(403);
        req.Username = user;
        next();
    });
}



/// Routes


//SECURE ENDPOINTS
 
// To fetch data of pharmaceuticalcompanies

app.get('/api/pcm', authenticateToken, (req, res) => {
    try {
        pool.query('SELECT * FROM `pharmaceuticalcompanies`', (error, results) => {
            if (error) {
                console.error(error);
                res.status(500).json({ error: 'Internal Server Error' });
            } else {
                res.json(results);
            }
        });
    } catch (err) {
        console.error(err);
        res.status(500).json({ error: 'Internal Server Error' });
    }
});


// To fetch PCM using ID
app.get('/api/pcm/id/:pcid', authenticateToken, (req, res) => {
    const pcid= req.params.pcid;
    pool.query('SELECT * FROM `pharmaceuticalcompanies`s where PCID=?' , [pcid], (error, results) => {
        if (error) {
            res.status(500).json({ error: 'Internal Server Error' });
        } else {
            res.json(results);
        }
    });
});

// To fetch PCM using Gender
app.get('/api/pcm/gender/:gender', authenticateToken, (req, res) => {
    const gender= req.params.gender;
    pool.query('SELECT * FROM `pharmaceuticalcompanies`s where Gender =?' , [gender], (error, results) => {
        if (error) {
            res.status(500).json({ error: 'Internal Server Error' });
        } else {
            res.json(results);
        }
    });
});

//To fetch details of patients
app.get('/api/patients', authenticateToken, (req, res) => {
    pool.query('SELECT * FROM `patients`', (error, results) => {
        if (error) {
            res.status(500).json({ error: 'Internal Server Error' });
        } else {
            res.json(results);
        }
    });
});



//To fetch data of Patients using ID
app.get('/api/patients/id/:id',authenticateToken, (req, res) => {
    const patientID= req.params.id;
    pool.query('SELECT * FROM `patients` where PatientID =?',[patientID], (error, results) => {
        if (error) {
            res.status(500).json({ error: 'Internal Server Error' });
        } else {
            res.json(results);
        }
    });
});

// Get all patient details using gender 
app.get('/api/patients/gender/:gender',authenticateToken, (req, res) => {
    const gender= req.params.gender;
    pool.query('SELECT * FROM `patients` where Gender =?',[gender] ,(error, results) => {
        if (error) {
            res.status(500).json({ error: 'Internal Server Error' });
        } else {
            res.json(results);
        }
    });
});


//To list all users who purchased a specidic drug in a category

app.get('/api/patient/dispensed/:category',authenticateToken, (req, res) => {
    const category= req.params.category;
    pool.query('SELECT PatientName FROM `dispenseddrugs` WHERE Category= ?', [category], (error, results) => {
        if (error) {
            res.status(500).json({ error: 'Internal Server Error' });
        } else {
            const names = results.map(result => result.PatientName);
            res.json(names);
        }
    });
});


//To fetch details of Doctor's
app.get('/api/doc',authenticateToken, (req, res) => {
    pool.query('SELECT * FROM `Doctors`', (error, results) => {
        if (error) {
            res.status(500).json({ error: 'Internal Server Error' });
        } else {
            res.json(results);
        }
    });
});


//To fetch details of Doctor's using ID
app.get('/api/doc/id/:id',authenticateToken, (req, res) => {
    const docID =req.params.id;
    pool.query('SELECT * FROM `Doctors` where DoctorsID =?',[docID],(error, results) => {
        if (error) {
            res.status(500).json({ error: 'Internal Server Error' });
        } else {
            res.json(results);
        }
    });
});


//To fetch details of Doctor's using Gender
app.get('/api/doc/gender/:gender',authenticateToken, (req, res) => {
    const gender =req.params.gender;
    pool.query('SELECT * FROM `Doctors` where Gender =?',[gender],(error, results) => {
        if (error) {
            res.status(500).json({ error: 'Internal Server Error' });
        } else {
            res.json(results);
        }
    });
});

//To fetch pharmacist's 
app.get('/api/pharmacists',authenticateToken, (req, res) => {
    pool.query('SELECT * FROM `pharmacists`', (error, results) => {
        if (error) {
            res.status(500).json({ error: 'Internal Server Error' });
        } else {
            res.json(results);
        }
    });
});


//To fetch pharmacist's using ID
app.get('/api/pharmacists/id/:id', authenticateToken, (req, res) => {
    const pharmacistID= req.params.id
    pool.query('SELECT * FROM `pharmacists` where PharmacyID =?',[pharmacistID] ,(error, results) => {
        if (error) {
            res.status(500).json({ error: 'Internal Server Error' });
        } else {
            res.json(results);
        }
    });
});

//To fetch pharmacist's using Gender
app.get('/api/pharmacists/gender/:gender', authenticateToken, (req, res) => {
    const gender = req.params.gender
    pool.query('SELECT * FROM `pharmacists` where Gender =?',[gender] ,(error, results) => {
        if (error) {
            res.status(500).json({ error: 'Internal Server Error' });
        } else {
            res.json(results);
        }
    });
});


//To fetch details of admin
app.get('/api/admin', authenticateToken, (req, res) => {
    pool.query('SELECT * FROM Admin', (error, results) => {
        if (error) {
            res.status(500).json({ error: 'Internal Server Error' });
        } else {
            res.json(results);
        }
    });
});

//To fetch details of admin using ID
app.get('/api/admin/id/:id', authenticateToken, (req, res) => {
    const adminID= req.params.id;
    pool.query('SELECT * FROM Admin where AdminID=?',[adminID], (error, results) => {
        if (error) {
            res.status(500).json({ error: 'Internal Server Error' });
        } else {
            res.json(results);
        }
    });
});

//To fetch details of admin using ID
app.get('/api/admin/gender/:gender', authenticateToken, (req, res) => {
    const gender = req.params.gender;
    pool.query('SELECT * FROM Admin where Gender=?',[gender], (error, results) => {
        if (error) {
            res.status(500).json({ error: 'Internal Server Error' });
        } else {
            res.json(results);
        }
    });
});


//To fetch list of users who purchased a drug on a specific date

app.get('/api/patient/dispensed/date/:date', authenticateToken, (req, res) => {
    const date = req.params.date;
    pool.query('SELECT PatientName FROM `dispenseddrugs` WHERE Date = ?', [date], (error, results) => {
        if (error) {
            res.status(500).json({ error: 'Internal Server Error' });
        } else {
            const Name= results.map(result => result.PatientName);
            res.json(Name);
        }
    });
});


// API endpoint to get users by last login time
app.get('/api/users/logintime', authenticateToken, (req, res) => {
    const query = 'SELECT * FROM `APIUser` ORDER BY LoginTime DESC';
  
    pool.query(query, (error, results) => {
      if (error) {
        console.error(error);
        res.status(500).json({ error: 'Internal Server Error' });
      } else {
        res.json(results);
      }
    });
  });





//INSECURE ENDPOINTS

//To fetch all drugs from the database 
app.get('/api/drugs',  (req, res) => {
    pool.query('SELECT * FROM Drugs', (error, results) => {
        if (error) {
            res.status(500).json({ error: 'Internal Server Error' });
        } else {
            res.json(results);
        }
    });
});

// To fetch drug details using ID
app.get('/api/drug/:id',  (req, res) => {
    const drugId = req.params.id;

    pool.query('SELECT * FROM Drugs WHERE DrugID = ?', [drugId], (error, results) => {
        if (error) {
            res.status(500).json({ error: 'Internal Server Error' });
        } else {
            res.json(results);
        }
    });
});


// To fetch drug details using category
app.get('/api/drugs/category/:category', (req, res) => {
    const category = req.params.category;

    pool.query('SELECT * FROM Drugs WHERE category = ?', [category], (error, results) => {
        if (error) {
            res.status(500).json({ error: 'Internal Server Error' });
        } else {
            res.json(results);
        }
    });
});


// To fetch drug details using PCID
app.get('/api/drugs/:pcid', (req, res) => {
    const pcid = req.params.pcid;

    pool.query('SELECT * FROM Drugs WHERE PCID = ?', [pcid], (error, results) => {
        if (error) {
            res.status(500).json({ error: 'Internal Server Error' });
        } else {
            res.json(results);
        }
    });
});





// Start the server
app.listen(port, () => {
    console.log(`Server is running on port ${port}`);
});



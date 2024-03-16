const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql');
const session = require('express-session');
const cookieParser = require('cookie-parser');

const app = express();
const PORT = process.env.PORT || 3000;

// Middleware
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());
app.use(cookieParser());
app.use(session({
    secret: 'secret',
    resave: true,
    saveUninitialized: true
}));

// Create MySQL connection
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'parfumerie'
});

db.connect((err) => {
    if (err) {
        console.error('Error connecting to MySQL:', err);
        return;
    }
    console.log('MySQL connected');
});

// Handle requests
app.get('/', (req, res) => {
    // Your route logic here
    res.send('Welcome to the homepage');
});

app.post('/add-to-cart', (req, res) => {
    const userId = req.session.userId; // Retrieve userId from session
    if (!userId) {
        return res.status(401).json({ error: 'Unauthorized' });
    }

    const productId = req.body.productId;
    if (!productId || typeof productId !== 'number') {
        return res.status(400).json({ error: 'Invalid product ID' });
    }

    const query = 'INSERT INTO panier (IDCLIENT, IDPROD) VALUES (?, ?)';
    db.query(query, [userId, productId], (err, result) => {
        if (err) {
            console.error('Error adding product to cart:', err);
            return res.status(500).json({ error: 'Failed to add product to cart' });
        }
        if (result.affectedRows === 0) {
            return res.status(404).json({ error: 'Product not found' });
        }
        console.log('Product added to cart');
        res.status(200).json({ success: true });
    });
});


app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});

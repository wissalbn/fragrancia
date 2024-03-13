const express = require('express');
const bodyParser = require('body-parser');
const mysql= require('mysql');
var session = require('express-session')

const app = express();
const PORT = process.env.PORT || 3000;

app.use(bodyParser.json());

app.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});

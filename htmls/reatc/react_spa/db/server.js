const express = require('express');
const fs = require('fs');
const mysql = require('mysql');
const app = express();

var cors = require('cors')


const bodyParser = require('body-parser')

app.use(bodyParser.urlencoded({ extended: false }))
app.use(bodyParser.json())
app.use(cors()) // Use this after the variable declaration

app.set('port', (process.env.PORT || 3001));

// Express only serves static assets in production
console.log("NODE_ENV: ", process.env.NODE_ENV);
if (process.env.NODE_ENV === 'production') {
  app.use(express.static('client/build'));

  // Return the main index.html, so react-router render the route in the client
  app.get('/', (req, res) => {
    res.sendFile(path.resolve('client/build', 'index.html'));
  });
}

const host = "localhost"
const user = "root"
const pswd = "root"
const dbname = "books"

// config db ====================================
const pool = mysql.createPool({
  host: host,
  user: user,
  password: pswd,
  port: "3306",
  database: dbname
});

const COLUMNS = [
  'last_name',
  'first_name'
];

app.post('/myaction', function(req, res) {

  console.log('req.body');
  console.log(req.body);
  console.log('res.body');
  console.log(req.body.username);
  pool.query('INSERT INTO test SET ?', req.body, function (error, results, fields) {
    if (error) throw error;
    res.end(JSON.stringify(results));
  });
  // res.write('You sent the name "' + req.body.name+'".\n');
});

app.get('/users', function(req, res, next) {
    pool.query('select * from test', function (error, results, fields) {
        if(error) throw error;
        res.send(JSON.stringify(results));
    });
});

app.post('/users/delete', function(req, res) {
  let sql = `DELETE FROM test WHERE id = ?`;
    pool.query(sql, req.body.id, function (error, results, fields) {
        if(error) throw error;
        res.send(JSON.stringify(results));
        console.log('Deleted Row(s):', results.affectedRows);
    });
  console.log('%%%%');
  console.log(req.body.id);
});

app.get('/api/books', (req, res) => {
console.log('hhhhhhhhh');
  const firstName = req.query.firstName;

  if (!firstName) {
    res.json({
      error: 'Missing required parameters',
    });
    return;
  }

  let queryString = ``;
  if(firstName=="*"){
    queryString = `SELECT * from authors`
  }else{
     queryString = `SELECT * from authors WHERE first_name REGEXP '^${firstName}'`
  }
console.log(queryString);
console.log('###SSS');
  pool.query(queryString,
         function(err, rows, fields) {
          if (err) throw err;

          if (rows.length > 0){
            res.json(
              rows.map((entry) => {
                const e = {};
                COLUMNS.forEach((c) => {
                  e[c] = entry[c];
                });
                return e;
                })
              );
            } else {
              res.json([]);
            }
      });

});

app.listen(app.get('port'), () => {
  console.log(`Find the server at: http://localhost:${app.get('port')}/`); // eslint-disable-line no-console
});

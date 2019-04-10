 
const mysql = require('mysql');
const express = require('express');
var app = express();
const bodyparser = require('body-parser');

app.use(bodyparser.json());

var mysqlConnection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: 'mauu',
    database: 'tsf',
    multipleStatements: true
});

mysqlConnection.connect((err) => {
    if (!err)
        console.log('DB connection succeded.');
    else
        console.log('DB connection failed \n Error : ' + JSON.stringify(err, undefined, 2));
});


app.listen(3000, () => console.log('Express server is runnig at port no : 3000'));


//Get all user
app.get('/user', (req, res) => {
    mysqlConnection.query('SELECT * FROM USER', (err, rows, fields) => {
        if (!err)
            res.send(rows);
        else
            console.log(err);
    })
});

//Get an user
app.get('/user/:id', (req, res) => {
    mysqlConnection.query('SELECT * FROM USER WHERE uid = ?', [req.params.id], (err, rows, fields) => {
        if (!err)
            res.send(rows);
        else
            console.log(err);
    })
});

//Delete an user
app.delete('/user/:id', (req, res) => {
    mysqlConnection.query('DELETE FROM USER WHERE uid = ?', [req.params.id], (err, rows, fields) => {
        if (!err)
            res.send('Deleted successfully.');
        else
            console.log(err);
    })
});

//Insert an user

//Update an user
//rest api to create a new record into mysql database
app.post('/users', (req, res) => {
    let emp = req.body;
    var sql = "SET @uid = ?;SET @name = ?;SET @email = ?;SET @cucd = ?; \
    CALL UserAddOrEdit(@uid,@name,@email,@cucd);";
    mysqlConnection.query(sql, [emp.uid, emp.name, emp.email, emp.cucd], (err, rows, fields) => {
        if (!err)
            rows.forEach(element => {
                if(element.constructor == Array)
                res.send('Inserted user id : '+element[0].uid);
            });
        else
            console.log(err);
    })
});
app.put('/users', (req, res) => {
    let emp = req.body;
    var sql = "SET @uid = ?;SET @name = ?;SET @email = ?;SET @cucd = ?; \
    CALL UserAddOrEdit(@uid,@name,@email,@cucd);";
    mysqlConnection.query(sql, [emp.uid, emp.name, emp.email, emp.cucd], (err, rows, fields) => {
        if (!err)
            
                res.send('updated user id : ');
                    else
            console.log(err);
    })
});

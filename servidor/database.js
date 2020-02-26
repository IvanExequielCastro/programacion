const mysql = require("mysql");

const connection = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "programacion3"
});

connection.connect((err) => {
    if(err) {
        console.log(err);
        return;
    }else {
        console.log("CONNECT");
    }
});

module.exports = connection;
const express = require("express");
const app = express();

// Settings
app.set("port", 4000);

// Middlewares
app.use(express.json());

// Static files
app.use(require("./routers"));
// app.use(function(req, res, next) { 
//     require("./routers");
//     next();
// });

app.use(function(req, res, next) {
    res.header("Access-Control-Allow-Origin", "*");
    res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
    next();
  });

// Start server
app.listen(app.get("port"));
console.log("PORT: ",app.get("port"));
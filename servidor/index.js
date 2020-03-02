const express = require("express");
const app = express();

// Settings
// app.set("port", process.env.PORT || 3000);
app.set("port", 3000);

// Middlewares
app.use(express.json());

// Static files
app.use(require("./routers"));

app.use(function(req, res, next) {
    res.header("Access-Control-Allow-Origin", "*"); // update to match the domain you will make the request from
    res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
    next();
  });   //Agregamos a nivel global los permisos para el cors y luego llamamos next en cada metodo

  //Tarea en casa : Averiguar bien que hace next y como funciona esto y explicarselo a lean 

// Start server
app.listen(app.get("port"));
console.log("PORT: ",app.get("port"));
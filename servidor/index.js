const express = require("express");
const app = express();

// Settings
app.set("port", process.env.PORT || 8000);

// Middlewares
app.use(express.json());

// Static files
app.use(require("./routers"));

// Start server
app.listen(app.get("port"));
console.log("PORT: ",app.get("port"));
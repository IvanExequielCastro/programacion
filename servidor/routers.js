const express = require("express");
const router = express.Router();

const connection = require("./database");

router.get("/all/", (req, res, next) => {

    connection.query("SELECT * FROM products", (err, rows) => {
        if(!err) {
            res.json(rows);
        } else {
            console.log(err);
        }
    });
});

router.delete("/delete/:id", (req, res) => {
    const id = req.params.id;

    connection.query("DELETE FROM `programacion3`.`products` WHERE (`id` = '"+id+"')", (err) => {
        if(!err) {
            res.send();
        } else {
            console.log(err);
        }
    });
});

router.get("/:id", (req, res) => {    
    const id = req.params.id;

    connection.query("SELECT * FROM products WHERE (`id` = '"+id+"')", (err, rows) => {
        if(!err) {
            res.json(rows);
        } else {
            console.log(err);
        }
    });
});

router.post("/send", (req, res, next) => {  
    next();

    const {name, price, quantity} = req.body;

    connection.query('INSERT INTO products SET ?', {
        name,
        price,
        quantity
    }, (err) => {
        if(!err) {
            // res.redirect("/all");   //TODO : eliminos esto (terminar de eliminar )
        } else {
            console.log(err);
        }
    });
});

router.put("/update/:id", (req, res) => {
    const {name, price, quantity} = req.body;
    const id = req.params.id;

    connection.query("UPDATE `programacion3`.`products` SET ? WHERE (`id` = '"+id+"')", {
        name,
        price,
        quantity
    }, (err) => {
        if(!err) {
            res.send();
        } else {
            console.log(err);
        }
    });
});

module.exports = router;  
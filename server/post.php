<?php

include "connection.php";

$connection = new Connection();
$con=$connection->connect();

$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

if($name === '' || $price=== ''){
    echo json_encode('error');
}else{
    $con->createProducts();
    $con->insert($name,$price,$quantity);

    echo json_encode('Correcto ha insertado en la base de datos <br>Nombre: '.$name.'<br>Precio: $ '.$price.
    '<br>Cantidad: '.$quantity.' Articulos');
}

?>
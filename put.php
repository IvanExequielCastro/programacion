<?php

include 'connection.php';

$connection = new Connection();
$connection->connect();

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

if($name === '' || $price=== ''){
    echo json_encode('error');
}else{
    // $connection->createProducts();
    // $connection->update($name,$price,$quantity,$id);
    
    
    $sql ="UPDATE `products` SET `name` =`".$name."`, `price` = `".$price."`, `quantity` = `".$quantity."` WHERE (`id` = `".$id."`);";
    
    $connection->createProducts();
    $connection->update($sql);


    echo json_encode('Correcto ha editado en la base de datos Nombre: '.$name.' Precio: $'.$price.' Cantidad: '.$quantity.' Articulos');

}

?>
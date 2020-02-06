<?php

include "connection.php";

if(!isset($_GET["id"])) exit();
$id = $_GET["id"];

$connection = new Connection();
$con=$connection->connect();

$sentences = $con->prepare("DELETE FROM products WHERE id = ?;");
$result = $sentences->execute([$id]);

if($result === TRUE)
	header("Location: product.php");
else echo "Algo salió mal";

?>
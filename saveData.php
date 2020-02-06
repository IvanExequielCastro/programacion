<?php

include "connection.php";

$connection=new Connection();
$con = $connection->connect(); 
$result= $connection->llenarTabla();

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Programacion</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <header id="header">
            <div class="container">
                <h1 class="text-center">Servicio de ventas</h1>
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="product.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sales.html">Ventas</a>
                    </li>
                </ul>
                <br><br>
                <a href="newProduct.html" class="btn btn-success btn-sm btn-block" type="button">Nuevo producto</a>   
            </div>
        </header> 
        <section id="hero">
            <div class="hero-container">        
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Opcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $res) { ?>
                        <tr>
                            <td><?php echo $res["id"] ?></td>
                            <td><?php echo $res["name"] ?></td>
                            <td><?php echo $res["price"] ?></td>
                            <td><?php echo $res["quantity"] ?></td>
                            <td>
                            <a class="btn btn-lg btn-warning btn-sm" href="<?php echo "edit.php?id=" . $res["id"]?>">Editar</a> 
                            <a class="btn btn-lg btn-danger btn-sm" href="<?php echo "delete.php?id=" . $res["id"]?>">Eliminar</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
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
    </head>
    <body>
        <header>
            <div>
                <h1>Servicio de ventas</h1>
                <ul>
                    <li>
                        <a href="index.html">Inicio</a>
                    </li>
                    <li>
                        <a href=#>Productos</a>
                    </li>   
                </ul>
                <br><br>
                <a href="newProduct.html" type="button">Nuevo producto</a>  
            </div>
        </header> 
        <section>
            <div>
                <table>
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
                            <a href="<?php echo "edit.php?id=" . $res["id"]?>">Editar</a> 
                            <a href="<?php echo "delete.php?id=" . $res["id"]?>">Eliminar</a>
                        </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </body>
</html>
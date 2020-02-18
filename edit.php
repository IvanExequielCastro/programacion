<?php

include "connection.php";

if(!isset($_GET["id"])){
    exit();
} 
$id = $_GET["id"];

$connection = new Connection();
$connection->connect();

$sentences = $connection->consulta($id);

while($registro=$sentences->fetch(PDO::FETCH_ASSOC)){
    $id = $registro["id"];
    $name = $registro["name"];
    $price = $registro["price"];
    $quantity = $registro["quantity"];
};

if($sentences === FALSE){
	echo "No se encontro el id = ".$id;
	exit();
};

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Programacion</title>
    </head>
    <body>
        <div>
            <h2>Editar Producto</h2>
            <br>
            <form id="formulario" method="POST" action="put.php">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div>
                    <label for="name">Nombre</label>
                    <div>
                        <input value="<?php echo $name ?>" name="name" onchange="validarNombre()" required type="text">
                    </div>
                </div>
                <div>
                    <label for="price">Precio</label>
                    <div>
                        <input value="<?php echo $price ?>" name="price" required type="number">
                    </div>
                </div>
                <div>
                    <label for="quantity">Cantidad</label>
                    <div>
                        <input value="<?php echo $quantity ?>" name="quantity" required type="number">
                    </div>
                </div>
                <div>
                    <button type="submit" value="Guardar cambios">Guardar</button>
                    <a href="product.php"value="cancelar">Cancelar</a>
                </div>
            </form>
        <div id="respuesta" value="edit"></div>
        </div>

        <script src="fetch.js"></script>
        <script src="validacion.js"></script>
    </body>
</html>
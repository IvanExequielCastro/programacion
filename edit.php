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
    echo "aca ".$registro["price"];
};

// print_r($sentences);

if($sentences === FALSE){
	echo "No se encontro el id = ".$id;
	exit();
}

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
            <form method="post" action="saveData.php">
                <input type="hidden" name="id" value="<?php echo $productList["id"]; ?>">
                <div>
                    <label for="NAME">Nombre</label>
                    <div>
                        <input value="<?php echo $productList["name"] ?>" name="name" onblur="validation()" required type="text" id="fnamePro">
                    </div>
                </div>
                <div>
                    <label for="price">Precio</label>
                    <div>
                        <input value="<?php echo $productList["price"] ?>" onkeypress="return validarNumero(event)" name="price" required type="text" id="price">
                    </div>
                </div>
                <div>
                    <label for="quantity">Cantidad</label>
                    <div>
                        <input value="<?php echo $productList["quantity"] ?>" onkeypress="return validarNumero(event)" name="quantity" required type="text" id="quantity">
                    </div>
                </div>
                <div>
                    <button type="submit" value="Guardar cambios">Guardar</button>
                    <a href="product.php"value="cancelar">Cancelar</a>
                </div>
            </form>
        <div id="respuesta"></div>
        </div>

        <script src="Validaciones.js"></script>
        <script src="fetch.js"></script>
    </body>
</html>
<?php

include "connection.php";

if(!isset($_GET["id"])) exit();
$id = $_GET["id"];

$connection = new Connection();
$con=$connection->connect();

$sentences = $connection->consulta($id);

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
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container my-5">
            <h2 class="text-center">Editar Productos</h2>
            <br>
            <form method="post" action="saveData.php">
                <input type="hidden" name="id" value="<?php echo $productList["id"]; ?>">
                <div class="form-group row">
                    <label for="NAME" class="col-sm-2 col-fomr-label">Nombre</label>
                    <div class="col-sm-10">
                        <input value="<?php echo $productList["name"] ?>" name="name" onblur="validation()" required type="text" id="fnamePro" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-fomr-label">Precio</label>
                    <div class="col-sm-10">
                        <input value="<?php echo $productList["price"] ?>" onkeypress="return validarNumero(event)" name="price" required type="text" id="price" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="quantity" class="col-sm-2 col-fomr-label">Cantidad</label>
                    <div class="col-sm-10">
                        <input value="<?php echo $productList["quantity"] ?>" onkeypress="return validarNumero(event)" name="quantity" required type="text" id="quantity" class="form-control">
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-success " type="submit" value="Guardar cambios">Guardar</button>
                    <a href="product.php" class="btn btn-danger "  value="cancelar">Cancelar</a>
                </div>
            </form>
        <div class="mt-3" id="respuesta"></div>
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/Validaciones.js"></script>
    </body>
</html>
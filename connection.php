<?php

class Connection {
    function connect() {
        $userName = "root";
        $password = "";
        $host = "localhost";
        $database = "programacion3";
        $driver = "mysql";
        
        try {
            return new PDO(
                "$driver:host=$host;dbname=$database",$userName,$password
            );
        } catch (PDOException $e) {
            print_r("Err: ".$e->getMessage());
            $this->logger_error($e);
        }     
    }
      
    function logger_error($e) {
        $fecha = time();
        $file = "err".$fecha.".txt";
        $err = $e;

        $document = fopen($file ,'a');
        fwrite($document,$err);
    }

    public function createSoldProductsTable() {
        $bool1 = false;
        $createTableQuery = "CREATE TABLE IF NOT EXISTS sold_products (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        sell_id INT(6)UNSIGNED,
        NAME VARCHAR(120) NOT NULL,
        price FLOAT(20,2),
        date_sell  TIMESTAMP
        )";
        $connection = $this->connect();
        if (isset($connection)){
            $connection->exec($createTableQuery);
            $bool1 = true;
        }
        return $bool1;
    }

    public function createProducts(){
        $bool1 = false;
        $createTableQuery = "CREATE TABLE IF NOT EXISTS products (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(120) NOT NULL,
        price FLOAT(20,2),
        quantity  int(11)
        )";
        $connection = $this->connect();
        if (isset($connection)){
            $connection->exec($createTableQuery);
            $bool1 = true;
        }
        return $bool1;
    } 

    public function insert($name="undefined",  $price,$quantity) {
        $insertData ="insert into products (name,price,quantity) values ('$name','$price','$quantity') ";
        $connection = $this->connect();
        if (isset($connection)){
            $connection->exec($insertData);
        }
    }

    public function update($sql) {
        $updateData = $sql;;
        // $connection = $this->connect();
        // if (isset($connection)){
        //     $connection->exec($updateData);
        // }

        try {
            // $idConsulta = $idConsulta;
            $connection = $this->connect();
            $connection->exec("SET CHARACTER SET utf8");
            // $sql = "select * from products where id =?;";
            $resultado = $connection->prepare($updateData);
            $resultado->execute($sql);

            return $resultado;
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }   
    }

    public function consulta($idConsulta) {
        try {
            $idConsulta = $idConsulta;
            $connection = $this->connect();
            $connection->exec("SET CHARACTER SET utf8");
            $sql = "select * from products where id =?;";
            $resultado = $connection->prepare($sql);
            $resultado->execute(array($idConsulta));

            return $resultado;
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }        
    }

    public function llenarTabla() {
        $connection = $this->connect();
        $sentences = $connection->prepare("SELECT  * from products");
        $sentences->execute();
        $result = $sentences->fetchAll();

        return $result;
    }
}

?>
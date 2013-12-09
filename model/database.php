<?php

    $dsn = "mysql:host=localhost;dbname=dcv";
    $username = "root";
    $password = "";
    try{
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e){
        $errorMessage = $e->errorInfo;
        include_once "databaseError.php";
    }

?>
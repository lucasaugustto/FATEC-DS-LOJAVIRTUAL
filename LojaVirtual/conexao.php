<?php
session_start();

try{
    $connection = new PDO('mysql:host=localhost;port=3308;dbname=lojavirtual','root','root');    
}catch (Exception $error){
    echo "Ocorreu o seguinte erro: {$error->getMessage()}";
}

?>
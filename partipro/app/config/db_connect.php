<?php
    require_once 'db_config.php';
    
    try {
        $pdo = new PDO($dsn, $username, $password, $options);
    } catch (PDOException $e){
        //throw new \PDOException($e->getMessage(), (int)$e->getCode());
        echo "Error :  " .$e->getMessage();
    }

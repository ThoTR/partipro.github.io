<?php

    $hostname = 'localhost';
    $dbname = 'projet_participation';
    $username = 'root';
    $password = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$hostname;dbname=$dbname;charset=$charset";
    $options = [
            PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC, //fetch_assoc par défaut
            PDO::ATTR_EMULATE_PREPARES      => false, 
    ];

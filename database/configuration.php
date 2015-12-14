<?php
define (DB_USER, "iphoneappuser");
define (DB_PASSWORD, "Fr040791$");
define (DB_DATABASE, "shopn_database");
define (DB_HOST, "localhost");

  	$host = 'localhost'; //HOST NAME.
    $db_name = 'databasename'; //Database Name
    $db_username = 'root'; //Database Username
    $db_password = ''; //Database Password


  try
    {
        $pdo = new PDO('mysql:host='. $host .';dbname='.$db_name, $db_username, $db_password);
    }
    catch (PDOException $e)
    {
        exit('Error Connecting To DataBase');
    }
?>
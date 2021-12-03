<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'bakkerij_leiden';

try {
    $conn = new PDO("mysql:host=$DATABASE_HOST;dbname=$DATABASE_NAME", $DATABASE_USER, $DATABASE_PASS);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "TRUNCATE TABLE customers";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    echo "Connected succesfully";
    }
    catch(PDOException $e)
    {
    echo 'Connection failed: ' . $e->getMessage();
    }
    $conn = null;
    header('Location: orders.php');
    exit();
?>
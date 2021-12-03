<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'bakkerij_leiden';

try {
    $conn = new PDO("mysql:host=$DATABASE_HOST;dbname=$DATABASE_NAME", $DATABASE_USER, $DATABASE_PASS);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE shop SET quantity = '".$_POST['product1']."' WHERE id = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $sql2 = "UPDATE shop SET quantity = '".$_POST['product2']."' WHERE id = 2";
    $stmt = $conn->prepare($sql2);
    $stmt->execute();

    $sql3 = "UPDATE shop SET quantity = '".$_POST['product3']."' WHERE id = 3";
    $stmt = $conn->prepare($sql3);
    $stmt->execute();

    echo "Connected succesfully";
    }
    catch(PDOException $e)
    {
    echo 'Connection failed: ' . $e->getMessage();
    }
    $conn = null;
    header('Location: products.php');
    exit();
?>
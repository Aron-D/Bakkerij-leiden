<?php
session_start(); 
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'bakkerij_leiden';

try {
    $conn = new PDO("mysql:host=$DATABASE_HOST;dbname=$DATABASE_NAME", $DATABASE_USER, $DATABASE_PASS);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Insert query with contact information + purchase information
    $sql = "INSERT INTO customers (customer_name,customer_email, date, 
    product1, quantity1, product2, quantity2, product3, quantity3, totalprice) 
    VALUES ('".$_SESSION['name']."','".$_SESSION['email']."', '".$_SESSION['date']."', '".$_SESSION['product1']."', 
    '".$_SESSION['quantity1']."', '".$_SESSION['product2']."', '".$_SESSION['quantity2']."', '".$_SESSION['product3']."', 
    '".$_SESSION['quantity3']."', '".$_SESSION['totalprice']."')";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Update query (quantity 1)
    $sql1 = "UPDATE shop SET quantity = quantity - '".$_SESSION['quantity1']."' WHERE id = 1";
    $stmt = $conn->prepare($sql1);
    $stmt->execute();
    // Update query (quantity 2)
    $sql2 = "UPDATE shop SET quantity = quantity - '".$_SESSION['quantity2']."' WHERE id = 2";
    $stmt = $conn->prepare($sql2);
    $stmt->execute();

    // Update query (quantity 3)
    $sql3 = "UPDATE shop SET quantity = quantity - '".$_SESSION['quantity3']."' WHERE id = 3";
    $stmt = $conn->prepare($sql3);
    $stmt->execute();

    echo "Connected succesfully";
    }
    catch(PDOException $e)
    {
    echo 'Connection failed: ' . $e->getMessage();
    }
    $conn = null;
    session_destroy();
    header('Location: checkout.php');
    exit();
?>
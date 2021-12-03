<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit();
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'bakkerij_leiden';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT * FROM orders";
if($result = mysqli_query($con, $sql)){
  if(mysqli_num_rows($result) > -1){
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bestellingen - Bakkerij Leiden</title>
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="../css/styleDB.css" />  
  <script src="assets/js/main.js"></script>  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"/>
</head>
<body>

<!-- Navigation. -->
<div class="loggedin">
    <nav class="navtop">
      <div>
        <h1>Dashboard</h1>
         <a href="../admin/dashboard.php"><i class="fas fa-user-circle"></i>Home</a>
        <a href="../admin/logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>  
      </div>
  </div>
  <!-- Mobile view navigation -->

<!-- Container. -->
<div class="content">
  <h2>Bestellingen</h2>
  <!-- Order container. -->
  <div class="orders">
    <!-- Start table for order list. -->
    <table>
      <!-- Heading. -->
      <thead>
        <tr>
          <th>#</th>
          <th>Naam</th>
          <th>Email</th>
          <th>Product</th>
          <th>Aantal</th>
         
          <th>Datum</th>
          <th>Subtotaal</th>
        </tr>
      </thead>
      <?php 
        while($row = mysqli_fetch_array($result)) { $currency = "€"; 
      ?>
      <tbody>
        <tr>
          <td><?=$row['id']?></td>
          <td><?=$row['customer_name']?></td>
          <td><?=$row['customer_email']?></td>
          <td><?=$row['product1']?></td>
          <td><?=$row['quantity1']?></td>
        
          <td><?=$row['date']?></td>
          <td><?=$currency, $row['total_price']?></td>
        </tr>
      </tbody>
        <?php 
        } 
      ?>
    </table>
    <!-- End of order list table. -->
    <?php
    mysqli_free_result($result);
    } else{
      echo "No records matching your query were found.";
    }
    } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
    mysqli_close($con);
    ?>
  </div>
  <!-- Form with post method. Clears the data. -->
  <form action="reset.php" method="post">
    <input class="reset" type="submit" name="reset" value="Reset Data">
  </form>
</div>
<!-- End of container. -->

</body>
</html>
<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
header('Location: login.php');
exit();
}
?>
<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Panel - Bakkerij Leiden</title>
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="../css/styleDB.css" />
  <script src="assets/js/main.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" />
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
 
</header>
<!-- End of navigation. -->

<!-- Container. -->
<div class="content">
  <h2>Dashboard</h2>
  <div class="box">
    <!-- Product List. -->
    <div class="product">
      <p><a href="products.php"><i class="fas fa-edit"></i> Producten</a> - bekijk uw producten die in de database zijn opgeslagen.</p>
    </div>
  </div>
  <div class="box">
    <!-- Order list. -->
    <div class="order">
      <p><a href="orders.php"><i class="fas fa-edit"></i> Bestellingen</a> - laat zien wie een product heeft besteld.</p>
    </div>
  </div>
   
</body>
</html>
<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bedankt voor uw bestelling - Bakkerij Leiden</title>
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="assets/css/style.css" />  
  <script src="assets/js/main.js"></script> 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" />
</head>
<body>

<!-- Navigation. -->
<header class="nav">
  <!-- Navigation items. -->
  <div class="item">
    <h1><a href="index.php">Bakkerij Leiden</a></h1>
    <a class="main" href="login.php"><i class="fas fa-users"></i>Admin</a>
    <a class="main" href="index.php?page=cart"><i class="fas fa-shopping-cart"></i>Winkelwagen</a>
    <a class="sub" href="javascript:void(0);" onclick="dropdownmenu()"><i class="fa fa-bars"></i></a>
  </div>
  <!-- Mobile view navigation -->
  <div class="menu">
    <div id="links">
      <a href="login.php"><i class="fas fa-users"></i> Admin</a>
      <a href="index.php?page=cart"><i class="fas fa-shopping-cart"></i> Winkelwagen</a>
    </div>
  </div>
</header>
<!-- End of navigation. -->

<!-- Container. -->
<div class="container">
  <!-- Checkout class. -->
  <div class="checkout">
    <h1>Uw bestelling is geplaatst</h1>
    <p>Bedankt voor het bestellen bij ons, we nemen per e-mail contact met u op met uw bestelgegevens.</p>
    <!-- Image. -->
    <div class="checkout-image">
      <img src="">
      <img src="">
      <img src="">
      <img src="">
    </div>
    <!-- End of checkout image. -->
  </div>
  <!-- End of checkout. -->
</div>
<!-- End of container. -->

<!-- Copyright. -->
<div class="copyright">
  <?php echo "<p>All rights reserved " . date("Y") . " &copy; Bakkerij Leiden</p>";?>
</div>

</body>
</html>
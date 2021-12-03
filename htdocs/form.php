<?php include('includes/database.php');?>
<?php include('includes/head.php');?>

<style>

body {
    text-align: center;
}
form {
    display: inline-block;
    margin:10px;
}

#form-box {
  height: content;
  padding: 2em 3.5em;
  border-top: 50px solid #E8E8E8;
  border-left: 2px solid #E8E8E8;
  border-right: 2px solid #E8E8E8;
  border-bottom: 2px solid #E8E8E8;
  color:#fff;
}

#form-title {
  font-size: 1.6em;
  padding-bottom: 6px;
  margin-bottom: 25px;
  border-bottom: 1.5px solid #E8E8E8;
  color:#fff;
}

.form-header {
  font-size: 16px;
  margin-bottom: 2px;
  color:#fff;
}

.form-input {
  width: 100%;
  height: 30px;
  font-size: 16px;
  padding-left: 6px;
}

.form-input:not(:last-child) {
  margin-bottom: 15px;
}

input[type=submit] {
    display: block;
    -webkit-appearance: button;
    font-size: 15px;
    width: 135px;
    height: 39px;
    bottom: 30px;
    left: 10px;
    font-size: 20px;
    margin-left: 254px;
    background-color: #32373a;
    text-transform: uppercase;
    color: #FFFFFF;
    border: none;
    border-radius: 3px;
}

/* Forces .form-input styles onto search type */
input[type=search] {
  -webkit-appearance: textfield;
  box-sizing: content-box;
}

</style>


<body>

<!-- header -->
<header>

<!-- menu -->
<div class="container">
  <div class="row"></div>
    <div class="grid_12">
      <h1>
        <a href="index.php">
          <img src="images/logo.png" alt="Logo alt">
          <img src="images/stripes.png" class="stripes" alt="Logo alt">
          </a>
        </h1>
        <div id='cssmenu'>
        
          <ul>
            <li>
              <a href='index.php'>
                <i class="fas fa-home"></i> Home
              </a>
            </li>
            <li>
              <a href='winkelmand.php'>
                <i class="fas fa-shopping-cart"></i> Winkelmand
              </a>
              
            </li>
            <ul></ul>
          </div>
        </header>

<form action="./mollie/payments.php" method="post">
  <div id="form-title">Contact Formulier</div>
  <div class="form-header">Naam & Achternaam</div>
  <input class="form-input" type="text" name="customer_name" maxlength="50" placeholder="" required />
  <div class="form-header">E-mail</div>
  <input class="form-input" type="email" name="customer_email" maxlength="50" placeholder="" required />

  <!-- Input type hidden which sends the product ID. -->
    <input type="hidden" name="product1" value="<?php echo $_SESSION['product1'];?>">
    <input type="hidden" name="product2" value="<?php echo $_SESSION['product2'];?>">
    <input type="hidden" name="product3" value="<?php echo $_SESSION['product3'];?>">
    <!-- Input type hidden which sends the quantity of the product ID. -->
    <input type="hidden" name="quantity1" value="<?php echo $_SESSION['quantity1'];?>">
    <input type="hidden" name="quantity2" value="<?php echo $_SESSION['quantity2'];?>">
    <input type="hidden" name="quantity3" value="<?php echo $_SESSION['quantity3'];?>">
    
    <!-- Input type hidden which sends the current date. -->
    <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>" readonly="readonly">
    <!-- Input type hidden for totalprice. -->
    <input type="hidden" name="total_price" value="<?php echo $_SESSION['myTotal'];?>">
   <input class="button" type="submit" name="submit" value="Verder">
</form>

<?php include('includes/footer.php');?>


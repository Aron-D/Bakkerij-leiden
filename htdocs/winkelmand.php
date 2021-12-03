<?php include('includes/database.php');?>
<?php include('includes/head.php');?>
<style>
td {
    vertical-align: middle;
}

.message_box .box{
	margin: 10px 0px;
    border: 1px solid #ffffff;
    text-align: center;
    font-weight: bold;
    width: 30%;
    margin: auto;
}
.table td {
	border-bottom: #F0F0F0 1px solid;
    padding: 10px;
    height: 60px;
    font-family: OpenSans-Regular;
    font-size: 15px;
    color: #fff;
    line-height: 1.2;
    font-weight: unset;
    background: #36304a;
}

.cart .remove {
    background: none;
    border: none;
    color: #0067ab;
    cursor: pointer;
    font-size: 15px;
    padding: 10px;
}
.cart .remove:hover {
 text-decoration:underline;
 }
 
.cart {
    color: #fff;
    text-align: center;
    margin:20px;
}
.button {
    background-color: #32373a;
    border: none;
    color: white;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    font-weight: bold;
    text-transform: uppercase;
    display: inline-block;
    margin: 10px 2px;
    cursor: pointer;
    float: right;
}

</style>

<?php 
$status="";
//session_start();
// Remove the product from the shopping cart
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["desc"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:white;'>
        Product is verwijderd uit winkelmand!</div>";
        }
		if(empty($_SESSION["shopping_cart"]))
		    unset($_SESSION["shopping_cart"]);
		}		
	}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['desc'] === $_POST["desc"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
  }
}

// Create some session variables for later use
if (isset($_POST['checkout']) && isset($_SESSION['shopping_cart']) && !empty($_SESSION['shopping_cart'])) {
  // First checks if product 1 contains anything, if not we give it a value
  if ($_POST['product1']=="") $_POST['product1'] = "-";
  // Checks if quantity 1 contains a value, if not we will give it an empty value
  if ($_POST['quantity1']=="") $_POST['quantity1'] = "0";
  // Puts the post value in a session to use in form.php (product 1 + quantity 1)
  $_SESSION['product1'] = $_POST['product1'];
  $_SESSION['quantity1'] = $_POST['quantity1'];

  $_POST['product1'] = $_SESSION['product1'];
  $_POST['quantity1'] = $_SESSION['quantity1'];

  // First checks if product 2 contains anything, if not we give it a value
  if ($_POST['product2']=="") $_POST['product2'] = "-";
  // Checks if quantity 2 contains a value, if not we will give it an empty value
  if ($_POST['quantity2']=="") $_POST['quantity2'] = "0";
  // Puts the post value in a session to use in form.php (product 2 + quantity 2)
  $_SESSION['product2'] = $_POST['product2'];
  $_SESSION['quantity2'] = $_POST['quantity2'];

  $_POST['product2'] = $_SESSION['product2'];
  $_POST['quantity2'] = $_SESSION['quantity2'];

  // First checks if product 3 contains anything, if not we give it a value
  if ($_POST['product3']=="") $_POST['product3'] = "-";
  // Checks if quantity 3 contains a value, if not we will give it an empty value
  if ($_POST['quantity3']=="") $_POST['quantity3'] = "0";
  // Puts the post value in a session to use in form.php (product 3 + quantity 3)
  $_SESSION['product3'] = $_POST['product3'];
  $_SESSION['quantity3'] = $_POST['quantity3'];

  $_POST['product3'] = $_SESSION['product3'];
  $_POST['quantity3'] = $_SESSION['quantity3'];

  // Puts the totalprice value in a session to later use
  $_SESSION['total_price'] = $_POST['total_price'];
  

  header('Location: form.php');
  exit;
}

?>

<body>

<header>
<!-- menu -->
<div class="container">
  <div class="row">
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
        
        <div style="width:1170px; margin:auto;">

        <div class="cart">
            <?php if(isset($_SESSION["shopping_cart"])){ $total_price = 0.0; ?>
            <table class="table">
                <tbody>
                    <tr class="100-head"></div>
                        <td>ID</td>
                        <td>ITEM NAAM</td>
                        <td>AANTAL</td>
                        <td>PRIJS</td>
                        <td>AANTAL PRIJS</td>
                    </tr>
                    <?php foreach ($_SESSION["shopping_cart"] as $product){ ?>
                    <tr>
                        <td><img src="images/tas.jpg"<?php echo $product["image"]; ?>' width="75" height="75" />
                        </td>
                        <td>
                            <?php echo $product["name"]; ?>
                            <br />
                            <form method='post' action=''>
                                <input type='hidden' name='desc' value="<?php echo $product["desc"]; ?>" />
                                <input type='hidden' name='action' value="remove" />
                                <button type='submit' class='remove'>Verwijder Item</button>
                            </form>
                        </td>
                        <td>
                            <form method='post' action=''>
                                <input type='hidden' name='desc' value="<?php echo $product["desc"]; ?>" />
                                <input type='hidden' name='action' value="change" />
                                <select name='quantity' class='quantity' onchange="this.form.submit() " >
                                    <option <?php if($product[ "quantity"]==1) echo "selected";?> value="1">1</option>
                                    <option <?php if($product[ "quantity"]==2) echo "selected";?> value="2">2</option>
                                    <option <?php if($product[ "quantity"]==3) echo "selected";?> value="3">3</option>
                                    <option <?php if($product[ "quantity"]==4) echo "selected";?> value="4">4</option>
                                    <option <?php if($product[ "quantity"]==5) echo "selected";?> value="5">5</option>
                                </select>
                            </form>
                        </td>
                      <td>
                           <?php $price = $product["price"]; ?>
                            &euro;<?=number_format($price,2)?>
                        </td>
                        <td>
                            <?php $subtotal = $product["price"]*$product["quantity"]; ?>
                            &euro;<?=number_format($subtotal,2)?>
                        </td>
                        </tr>
                            <?php $total_price +=( $product["price"]*$product["quantity"]); } ?>
                        <tr>
                        <td colspan="5" align="right">
                            <b>TOTAAL: &euro;<?=number_format($total_price,2); $_SESSION['myTotal'] = number_format($total_price,2);?>
                        </td>
                    </tr>
                </tbody>
            </table>



            <a href="form.php" class="button" value="<?$total_price?>" name="checkout">Uitchecken</a>
            <a href="index.php" class="button">Verder winkelen</a>

            <div style="clear:both;"></div>
            
            <?php }else{ echo "<h2>Winkelmand is leeg!</h2>"; } ?>
          
            </div>

            <div class="message_box" style="margin:10px 0px;">
                <?php echo $status; ?>
            </div>

    </div>
</body>

</html>

<?php include('includes/footer.php');?>






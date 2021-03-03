<?php
session_start();
if (isset($_GET['name'])){
    $_SESSION['name'] = $_GET['name'];
    $bookname = $_SESSION['name'];
    echo "<div class='row mt-4'>
    <div class = 'col-md-12'>
    <h3 class = 'text-center'> Fill all the details{$bname}</h3>
    </div>
    </div>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body {font-family: "Times New Roman", Georgia, Serif;}
h1, h2, h3, h4, h5, h6 {
  font-family: "Playfair Display";
  letter-spacing: 5px;
}
</style>
</head>
<body>
    <div class="w3-top">
  <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
    <a href="#home" class="w3-bar-item w3-button">My Book Store</a>
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="#about" class="w3-bar-item w3-button">About</a>
      <a href="#store" class="w3-bar-item w3-button">Store</a>
      <a href="#checkout.php" class="w3-bar-item w3-button">Checkout</a>
    </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:500px" id="home">
  <img class="w3-image" src="img/img4.jpg" alt="a book" width="1600" height="800">
  <div class="w3-display-bottomleft w3-padding-large w3-opacity">
    <h1 class="w3-xxlarge">My Book store</h1>
  </div>
</header>
<div class='row mt-4'>
    <div class='col-md-12'>
    <h3 id="bookNameFromSession" class='text-center'></h3>
    </div>
    </div>  
    <div class="row m-4">
    <div class = "col-md-12">
    <form id="checkOutForm" action="checkout.php" method="post">
        <div class="form-group row">
        <div class="col-md-2">
        <label class="lead" for="firstname"><span class = "text-danger">*</span>First Name:</label>    
        </div>
            <div class="col-md-6">
            <input class="form-control" type="text" id="firstname" name="firstname" placeholder="Vandna"
                   value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname'];?>">
            </div>
        </div>
        <div class="form-group row">
        <div class="col-md-2">
        <label class="lead" for="lastname"><span class = "text-danger">*</span>Last Name:</label>    
        </div>
            <div class="col-md-6">
            <input class="form-control" type="text" id="lastname" name="lastname" placeholder="Sodhi"
                   value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname'];?>">
            </div>
        </div>
        <label class="lead font-weight-bold"><span class = "text-danger">*</span>Select Payment Method:</label><br>
        <input type="radio" id="debit" name="pmoption" value="debit"
               <?php if(isset($_POST['pmoption']) && $_POST['pmoption'] == "debit") echo "checked=\'checked\'"?>>
        <label class="lead" for="debit">Debit</label><br>
        <input type="radio" id="credit" name="pmoption" value="credit"
               <?php if(isset($_POST['pmoption']) && $_POST['pmoption'] == "credit") echo "checked=\'checked\'"?>>
        <label class="lead" for="credit">Credit</label><br>
        <input type="radio" id="cash" name="pmoption" value="cash"
               <?php if(isset($_POST['pmoption']) && $_POST['pmoption'] == "cash") echo "checked=\'checked\'"?>>
        <label class="lead" for="cash">Cash</label>
        <div class="row form-group offset-3 col-md-3">
        <input class="btn btn-outline-success form-control" type="submit" value="Place Order">
        </div>
    </form>    
    </div>
    </div>
</body>
</html>
<?php
require("mysqli_connect.php");
               if($_SERVER['REQUEST_METHOD'] == "POST"){
                   $bname = $_SESSION['name'];
                   $flag = true;
                   if(empty($_POST['firstname'])){
                       echo "<script>
                       document.getElementById('bookNameFromSession').innerHTML='Fill all the details to order{$bname}';
                       </script>
                       <div class = 'row col-md-12 ml-5'>
                       <p class='text-danger'>First name can not be empty</p>
                       </div>";
                       $flag = false;
                   }
                   if(empty($_POST['lastname'])){
                       echo "<script>
                       document.getElementById('bookNameFromSession').innerHTML='Fill all the details to order{$bname}';
                       </script>
                       <div class = 'row col-md-12 ml-5'>
                       <p class='text-danger'>Last name can not be empty</p>
                       </div>";
                       $flag = false;
                   }
                   if(!isset($_POST['pmoption'])){
                       echo "<script>
                       document.getElementById('bookNameFromSession').innerHTML='Fill all the details to order <strong><i>{$bname}</i></strong>';
                       </script>
                       <div class = 'row col-md-12 ml-5'>
                       <p class='text-danger'>Please select a payment option</p>
                       </div>";
                       $flag = false;
                   }
                   if ($flag == true){
                       $firstname = mysqli_real_escape_string($dbc, $_POST['firstname']);
                       $lastname = mysqli_real_escape_string($dbc, $_POST['lastname']);
                       $pmoption = mysqli_real_escape_string($dbc, $_POST['pmoption']);
                       echo "<script>
                       document.getElementById('bookNameFromSession').innerHTML='Fill all the details to order <strong><i>{$bname}</i></strong>';
                       document.getElementById('CheckOutForm').reset();
                       </script>
                       <div class = 'row col-md-12 ml-5'>
                       <p class='text-success'>Congratulations!! Your order has been placed seccessfully !!!</p>
                       </div>";
                   }
               }
?>


<?php
require("mysqli_connect.php");
?>

<!DOCTYPE html>
<html>
<title>its my project</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body {font-family: "Times New Roman", Georgia, Serif;}
h1, h2, h3, h4, h5, h6 {
  font-family: "Playfair Display";
  letter-spacing: 5px;
}
</style>
<body>

<!-- Navbar (sit on top) -->
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

<!-- Page content -->
<div class="w3-content" style="max-width:1100px">

  <!-- About Section -->
  <div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src="img/img2.jpeg" class="w3-round w3-image w3-opacity-min" alt="book" width="600" height="750">
    </div>

    <div class="w3-col m6 w3-padding-large">
      <h1 class="w3-center">About MyBookStore</h1><br>
      <h5 class="w3-center">Tradition since 1889</h5>
      <p class="w3-large">The Bookstore offers Textbooks both New & Used, Online materials, Tradebooks, Stationery, Gifts, and Apparel for all your on and off campus and alumni needs. We offer priority shipping to most of the world, and accommodate in-store pickups of online orders.<br>

Keep up to date with our promotional offers though-out the year by following us on Facebook, Twitter, and Instagram. There is a list of bokks that we offer.</p>
    </div>
  </div>
  
  <hr>
  
  <!-- Menu Section -->
  <div class="w3-row w3-padding-64" id="store">
    <div class="w3-col l6 w3-padding-large">
      <h1 class="w3-center">Our Book Listing</h1><br>
      <h4>Rich Dad Poor Dad</h4>
      <p class="w3-text-grey">A Famous self help book book on Financial education</p><br>
    
      <h4>How to talk to anyone</h4>
      <p class="w3-text-grey">Little 92 Proven Tricks to improve communication skills </p><br>
    
      <h4>Atomic Habits</h4>
      <p class="w3-text-grey">A self help book on the power of little habits </p><br>
    
      <h4>No More Mr.Nice guy</h4>
      <p class="w3-text-grey">A book that teaches important skills about behaviour</p><br>
    
      <h4>Art Of Living</h4>
      <p class="w3-text-grey">Simply Wonderful book that teaches importance of living</p>    
    </div>
    
    <div class="w3-col l6 w3-padding-large">
      <img src="img/img3.jpg" class="w3-round w3-image w3-opacity-min" alt="Menu" style="width:100%">
    </div>
  </div>

  <hr>

    <div class = "w3-container w3-padding-64" id="checkout">
    <div class="row m-3">
    <div class="col-md-12">
    <h3 class="text-center">Please select a book You Want to Buy </h3>
    </div>    
    </div>
        <div>
        <table class="table table-striped">
        <tr class="text-center">
        <th>Book id</th>
        <th>Name</th>
        <th>Quantity</th>
        </tr> 
            <?php
            $query = "SELECT * FROM bookinventory";
            $result = @mysqli_query($dbc, $query);
            
            while($row = mysqli_fetch_array($result)){
                echo "<tr class = 'text-center'>
                <td>{$row['id']}</td>
                <td><a style ='text-decoration: none; color: rgb(229, 40, 60)' href = 'checkout.php?name = {$row['name']}'>{$row['name']}</a></td>
                <td>{$row['quantity']}</td>
                </tr>";
            }
            ?>
        </table>
        </div>
    </div>
         
  <!-- Contact Section -->
 
  
<!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
  <p>All rights reserved Vandna Sodhi <br> <a href = "chkvandana346@gmail.com">chkvandana346@gmail.com<br>Reference: W3school</a></p>
</footer>

</body>
</html>

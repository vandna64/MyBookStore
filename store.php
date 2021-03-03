 <div class="w3-col l6 w3-padding-large">
      <img src="img/img3.jpg" class="w3-round w3-image w3-opacity-min" alt="Menu" style="width:100%">
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

<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $id = $_POST['id'];
              $name = $_POST['name'];
              $packing = $_POST['packing'];
              $supplier = $_POST['supplier'];
              $origin = $_POST['origin'];
              $price = $_POST['price']; 
               
        
              switch($_GET['action']){
                case 'add':  
                    $query = "INSERT INTO Product
                              VALUES ('$id','$name','$packing','$supplier','$origin','$price')";
                    $result = mysqli_query($conn, $query);
                    
                break;
              }
            ?>
              <script type="text/javascript">window.location = "product.php";</script>
          </div>

<?php
include'../includes/footer.php';
mysqli_close($conn);
?>
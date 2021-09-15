<?php
require_once('session.php');
$session = $_SESSION["Staff_ID"];
include'../includes/connection.php';
$sql = "SELECT Role_ID FROM Staff WHERE Staff_ID = '$session'";
$res = mysqli_query($conn, $sql);
$ro = mysqli_fetch_array($res);

if($ro[0] == 'AD01'){
    include'../includes/sidebar_Admin.php';
}elseif ($ro[0] == 'A01') {
    include'../includes/sidebar_Acc.php';
}elseif ($ro[0] == 'A02') {
    include'../includes/sidebar_Acc_Manager.php';
}elseif ($ro[0] == 'L01') {
    include'../includes/sidebar_Logistics.php';
}elseif ($ro[0] == 'L02') {
    include'../includes/sidebar_Logistics.php';
}elseif ($ro[0] == 'S01') {
    include'../includes/sidebar_Sale.php';
}elseif ($ro[0] == 'S02') {
    include'../includes/sidebar_Sale_Manager.php';
}

$Productid = $_GET["code"];  
$query = "SELECT p.Product_ID, Product_Name, Supplier, Selling_Price, COUNT(w.Stock) AS STOCK, w.Lot_Number, w.Production_Date, w.Expiration_Date 
                    FROM Product p 
                    join Warehouse w on p.Product_ID = w.Product_ID 
                    WHERE p.Product_ID ='$Productid' AND Stock > 0";
            $result = mysqli_query($conn, $query);
           While($row = mysqli_fetch_array($result)){ 
                $zz= $row['Product_ID'];
                $zzz= $row['Product_Name'];
                $i= $row['Supplier'];
                $a=$row['Selling_Price'];
                $b=$row['STOCK'];
                $c=$row['Lot_Number'];
                $e=$row['Production_Date'];
                $f=$row['Expiration_Date'];
           }
?>
  
          <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Product's Detail</h4>
            </div>
                  <a href="product_view.php?action=add" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back</a>
            <div class="card-body">
          <?php 
            
            
              
          ?>

                  <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Product ID<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $zz; ?><br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Product Name<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $zzz; ?> <br>
                        </h5>
                      </div>
                    </div>
                  <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Supplier<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $i; ?><br>
                        </h5>
                      </div>
                    </div>
                  <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Selling Price<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $a; ?><br>
                        </h5>
                      </div>
                    </div>
                  <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Quantity Stock<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $b; ?><br>
                        </h5>
                      </div>
                    </div>
                <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Lot Number<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $c; ?><br>
                        </h5>
                      </div>
                    </div>
                <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Production date<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $e; ?><br>
                        </h5>
                      </div>
                    </div>
                <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Expiration date<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $f; ?><br>
                        </h5>
                      </div>
                    </div>
                </div>
          </div></center>

          <div class="card shadow mb-4 col-xs-12 col-md-15 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Inventory</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>Product ID</th>
                     <th>Name</th>
                     <th>Supplier</th>
                     <th>Selling Price</th>
                     <th>Stock</th>
                     <th>Lot Number</th>
                     <th>Production date</th>
                     <th>Expiration date</th>
                   </tr>
               </thead>
          <tbody>

<?php                  
    $query = "SELECT p.Product_ID, Product_Name, Supplier, Selling_Price, w.Stock, w.Lot_Number, w.Production_Date, w.Expiration_Date 
                    FROM Product p 
                    join Warehouse w on p.Product_ID = w.Product_ID 
                    WHERE p.Product_ID ='$Productid' AND w.Stock > 0 ";
            $result = mysqli_query($conn, $query);
           While($row = mysqli_fetch_array($result)){ 
                
                echo '<tr>';
                echo '<td>'. $row['Product_ID'].'</td>';
                echo '<td>'. $row['Product_Name'].'</td>';
                echo '<td>'. $row['Supplier'].'</td>';
                echo '<td>'. $row['Selling_Price'].'</td>';
                echo '<td>'. $row['Stock'].'</td>';
                echo '<td>'. $row['Lot_Number'].'</td>';
                echo '<td>'. $row['Production_Date'].'</td>';
                echo '<td>'. $row['Expiration_Date'].'</td>';
                echo '</tr> ';
           }
?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>


<?php
include'../includes/footer.php';
mysqli_close($conn);
?>
<?php
include'../includes/connection.php';

              $id = $_POST['id'];
              $date = $_POST['date'];
              $cust = $_POST['custid'];
              $total = $_POST['total'];
        
              $qry = "INSERT INTO OrderMaster(OrderMaster_ID, OrderMaster_Date, Approval, Total_Amount, Customer_ID)
              VALUES ('$id','$date','approval','$total','$cust')";
              $result = mysqli_query($conn, $qry);
              
              for($a = 0;$a<count($_POST["detailid"]); $a++){
              $query = "INSERT INTO OrderDetail(OrderDetail_ID, Quantity, Delivery_Date, Amount, Product_ID, OrderMaster_ID)
              VALUES ('".$_POST["detailid"][$a]."','".$_POST["quantity"][$a]."','".$_POST["dedate"][$a]."','".$_POST["amount"][$a]."','".$_POST["product"][$a]."','$id')";
              $rs = mysqli_query($conn, $query);
//                  echo $_POST["detailid"][$a];
//                  echo $_POST["quantity"][$a];
//                  echo $_POST["dedate"][$a];
//                  echo $_POST["amount"][$a];
//                  echo $_POST["product"][$a];
//                  echo $id;
              }
        ?>
              <script type="text/javascript">
                  alert("Add new sale order successfully !");
                window.location = "order_approve.php";
              </script>
        <?php
  
 
mysqli_close($conn);

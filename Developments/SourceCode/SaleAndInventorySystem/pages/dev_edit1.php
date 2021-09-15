<?php
include'../includes/connection.php';

			$id = $_POST['id'];
                        
			$status = $_POST['status'];
                        $warehouse = $_POST['warehouse'];
            
		
            $query = "UPDATE OrderDetail SET Delivery_Status = '$status', Warehouse = '$warehouse' WHERE OrderDetail_ID = '$id'";
            $result = mysqli_query($conn, $query);

							
?>	
	<script type="text/javascript">
			alert("You've update delivery status Successfully.");
			window.location = "delivery.php";
		</script>
<?php

mysqli_close($conn);
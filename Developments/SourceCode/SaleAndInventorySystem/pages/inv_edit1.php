<?php
include('../includes/connection.php');
            $id = $_POST['id'];
            $a = $_POST['pending'];
            $b = $_POST['selling'];
            
		
            $query = "UPDATE Warehouse set Pending = '$a', Selling='$b' WHERE Warehouse_ID ='$id'";
            $result = mysqli_query($conn, $query);
?>	
	<script type="text/javascript">
			alert("You've Update Product inventory Successfully.");
			window.location = "inventory.php";
		</script>
<?php
mysqli_close($conn);
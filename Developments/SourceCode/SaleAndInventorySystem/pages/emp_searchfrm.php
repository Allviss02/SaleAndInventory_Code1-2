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
?>
<?php
  $id = $_GET['id'];
  $query = "SELECT Staff_ID, Staff_Name, Staff_Email, Staff_Phone, Department, Manager_ID, Password, r.Role_Name 
            FROM Staff s 
            JOIN Role r ON s.Role_ID = r.Role_ID
            WHERE Staff_ID = '$id'";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                        
                       $a = $row['Staff_ID'];
                       $b = $row['Staff_Name'];
                        $c = $row['Staff_Email'];
                        $d = $row['Staff_Phone'];
                        $e = $row['Department'];
                        $f = $row['Manager_ID'];
                        $g = $row['Password'];
                        $h = $row['Role_Name'];
                        }
?>
          <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Staff Account</h4>
            </div>
            <a href="employee.php" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <div class="card-body">
          

                
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Staff Name<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $b; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Email <br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $c; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Password <br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $g; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Role <br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $h; ?> <br>
                        </h5>
                      </div>
                    </div>
                    
                    </div>

          </div>
          </center>

<?php
include'../includes/footer.php';
mysqli_close($conn);
?>
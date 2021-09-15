<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    body {
  margin: 0;
  padding: 0;
  background-color: #17a2b8;
  height: 150vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 400px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
</style>
<script>
    function kiemtra(){
        var reMail = /^\w+[@]\w+[.]\w+([.]\w+)?$/;
              var sMail = dangky.email.value;
              if(!reMail.test(sMail)){
                  alert("Email is incorrect !"); 
                  dangky.email.value="";
                  dangky.email.focus();
                  return false;
              }
    }
</script>

<body>
    <div id="login">
        
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" name="dangky" method="post" onsubmit="return kiemtra();">
                            <h3 class="text-center text-info">Sale and Inventory system</h3>
                            <h5 class="text-center text-info"> Forgot Password </h5>
                            <hr>
                            <div class="form-group">
                                <label for="username" class="text-info">Staff ID:</label><br>
                                <input type="text" name="id" placeholder="HRxx" id="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Staff Email:</label><br>
                                <input type="email" name="email" placeholder="abc@gmail.com" id="username" class="form-control" required>
                            </div>
                            <hr>
                            <div class="form-group"> 
                                <input type="submit" name="submit" class="btn btn-primary btn-block" value="Submit" >
                            </div>
                           <div class="form-group"> 
                               <a href="login.php">Back to login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

include'../includes/connection.php';
if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $email = $_POST['email'];
    $sql = "SELECT Staff_Name,Staff_Email, Password FROM Staff WHERE Staff_ID = '$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
	$name = $row['Staff_Name'];
	$emailCheck=$row['Staff_Email'];
	$password=$row['Password'];
	if($email==$emailCheck) {
		$to = $email;
                $subject = "Your Password to login Sale and Inventory system";
                $txt = "Dear $name, Thanks for your using our Sale and Inventory system. Please note your password is : $password";
                $headers = "From: davidnhut2001@gmail.com";
                mail($to,$subject,$txt,$headers);
    ?>    <script type="text/javascript">
                alert("Your password is sending successfully. Please check your email !");
                window.location = "login.php";
                </script>
        <?php
	}
	else{
            ?>    <script type="text/javascript">
                alert("Your Staff ID or Email is incorrect ");
                
                </script>
        <?php
		
	}
}
mysqli_close($conn);
?>
</body>

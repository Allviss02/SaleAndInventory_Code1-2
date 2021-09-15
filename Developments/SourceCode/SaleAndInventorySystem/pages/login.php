

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sales And Inventory</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  
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
        var rePass = /^\w{5,}$/;
            var sPass = dangky.password.value;
              if(!rePass.test(sPass)){
                  alert("Password is atleast 5 characters !"); 
                  dangky.password.value="";
                  dangky.password.focus();
                  return false;
              }
    }
</script>
</head>

<body class="grey lighten-3">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row shadow">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-8">SIGN IN</h1>
                  </div>
                    <form class="user"  action="processlogin.php" method="post" name="dangky" onsubmit="return kiemtra();">
                    <div class="form-group">
                        <input class="form-control form-control-user" placeholder="Email: abc@gmail.com" name="email" type="email" 
                               value="<?php if(isset($_COOKIE["email_login"])) { echo $_COOKIE["email_login"]; } ?>" autofocus required>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-user" placeholder="Password" name="password" type="password" 
                               value="<?php if(isset($_COOKIE["pass_login"])) { echo $_COOKIE["pass_login"]; } ?>"required>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="remember"
                               <?php if(isset($_COOKIE["email_login"])) { ?> checked <?php } ?>>
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                        <button class="btn btn-primary btn-block" type="submit" name="btnlogin">Login</button>
                    <hr>
                   <div class="text-center">
                       <a  href="ResetPassword.php">Forgot password ?</a>
                  </div> 
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!--<script src="../vendor/js-cookie/js_cookie.js"></script>-->
  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

</body>
<footer style="text-align:center; color: blue">
    <h2>Welcome to Sales and Inventory System ! </h2> 
    <span> This is internal web application to manage sales and inventory activities in trade company </span>
    <h4>  License of GROUP 03 </h3>
</footer>
</html>










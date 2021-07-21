<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>temp
</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
 
</head>
<body style="font-size: 14px;background-color: #efeff6;">
<section style="width:400px;margin:200px;position:relative;left:180px;">
<div class="container">
<div class="row">
<div class="col-md-12">
	<div class="card">
		
	  <div class="card-header text-center ">
		   <a class="navbar-brand text-primary  font-weight-bold" >LOGIN</a>
		            
	  </div>
      <div class="card-body">
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <input class="form-control form-control" name="email" type="text" value="username" placeholder="Username" maxlength="50" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control" id="id" name="id" value="id" placeholder="id">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control" id="password" name="password" value="password" placeholder="Password">
                    </div>
                   
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label text-secondary">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
        </div>
		<div class="card-footer">
                
                    
                <div class="card-footer-item text-center  ">
                    <h6 class="footer-link text-secondary ">Forgot Password?</h6>
                </div>
				<div>Not a user ? <a href="">Register</a> </div>
		</div>
        </div>

   </div>
</div>
</div>

   
</section>
</body>
</html>


<?php
include("bankconnection.php");

if(isset($_POST['login']))
{
  $id=$_POST['id'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  echo $email;
  
  $result=mysqli_query($conn,"SELECT 'account_id','email','password' FROM users WHERE account_id='$id' AND email='$email' AND password='$password' ");
  $user_matched = mysqli_num_rows($result);

    if ($user_matched > 0) 
	{

        $_SESSION["email"] = $email;
		$_SESSION["id"]=$id;
        header("location: bank.php");
    }
	else
  {
    die("User email or password is not matched <br/><br/>".mysqli_query($conn,$id));
  }
}


?>

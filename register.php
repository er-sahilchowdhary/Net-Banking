<?php
	include("config.php");
	include("functions.php");

	if(isset($_POST['register']))
	{
		
		$user_name=$_POST['user_name'];
		$street=$_POST['street'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$zip=$_POST['zip'];
		$phone=$_POST['phone'];
        $email=$_POST['email'];
		$age=$_POST['age'];
		$gender=$_POST['gender'];
        $role=$_POST['role'];
		
		$user_image=$_FILES['user_image'];
		$user_new_name=clean_file_name($user_name);
		$file_url=file_upload($user_image,$user_new_name);
		$file_url="img/".$file_url;
		
        $password=$_POST['password'];
	 
		$user_select_result=mysqli_query($conn,"SELECT email,phone FROM users where email='$email' and phone='$phone'");

 
		if (mysqli_num_rows($user_select_result))
		{
			echo "data not inserted email or number already exist";
		}
		else
		{
			
			$user_result=mysqli_query($conn,"insert into users (user_name,street,city,state,zip,phone,email,age,gender,role,password,user_image) values('$user_name','$street','$city','$state','$zip','$phone','$email','$age','$gnder','$role','$password','$file_url')");

			//echo "insert into users (user_name,street,city,state,zip,phone,email,age,gender,role, password,user_image) values('$user_name','$street','$city','$state','$zip','$phone','$email','$age','$gnder','$role','$password','$file_url')";

			// Print auto-generated id
			
			$user_id = mysqli_insert_id($conn);
			$base_account_value=1000000000;
			$account_id=$base_account_value+$user_id;
			
	        
			if($role=='user')
			{
			$add_account_in_users = mysqli_query($conn,"UPDATE users SET account_id = '$account_id' WHERE user_id='$user_id'");
			$add_account = mysqli_query($conn,"insert into account (account_id,user_id,balance) values('$account_id','$user_id','0')");

			}
			else
			{ $add_account_in_users = mysqli_query($conn,"UPDATE users SET account_id = '0' WHERE user_id='$user_id';");
			}

			}	
	
            //echo "insert into account (account_id,user_id,type,description,balance,time_date) values('$account_id','$user_id','','','','')";

			if (isset($add_account_in_users))
			{
    
				//echo "lastid=".$user_id;
            
            header('location:login.php');
			}
			else
			{
				echo ("Not Registered Please try again".mysqli_error($conn));
			}
		
            
		
}
?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Registration</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block"><img class="img-fluid" src="img/bank.jpg " style="width:500px;"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-primary mb-4">Register</h1>
				
              </div>
			<form action="register.php" method="POST" enctype="multipart/form-data">
			<div class="row">
			<div class="col-md-6">
			 <div class="form-group">
				<label for="First name">Name</label>
				<input type="text" class="form-control" name="user_name"  id="firstname" placeholder="Enter User Name">
			  </div>
			   <div class="form-group">
				<label for="Street">Street</label>
				<input type="text" class="form-control" name="street" id="Street" placeholder="Enter Street">
			  </div>
			   <div class="form-group">
				<label for="City">City</label>
				<input type="text" class="form-control" name="city"  id="City" placeholder=" Enter City">
			  </div>
			   <div class="form-group">
				<label for="State">State</label>
				<input type="text" class="form-control" name="state"  id="State" placeholder="Enter State">
			  </div>
			   <div class="form-group">
				<label for="Zip">Pin code</label>
				<input type="text" class="form-control" name="zip"  id="Zip" placeholder="Enter Pin code">
			  </div>
			  <div class="form-group">
				<label for="Image">Image:</label>
					<input type="file" name="user_image">
					
				  </div>
			  </div>
			  
			  <div class="col-md-6">

			  <div class="form-group">
				<label for="Email">Email</label>
				<input type="email" class="form-control" name="email"  id="email" placeholder="Enter email">
			  </div>
			  <div class="form-group">
				<label for="Email">Age</label>
				<input type="number" class="form-control" name="age"  id="email" placeholder="Enter age">
			  </div>
			  <div class="form-group">
			   <label for="Gender">Gender</label>
				  <select name="gender" class="form-control">
					<option value="">Gender</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>

				</select>
				</div>
			   <div class="form-group">
				<label for="Phone no.">Mobile</label>
				<input type="number" class="form-control" name="phone" id=""placeholder="Enter Phone no.">
			  </div>
			  <div class="form-group">
				<label for="Password">Password</label>
				<input type="password" class="form-control" name="password" id=""placeholder="Enter password">
			  </div>
			  
			  <div class="form-group">
			   <label for="Role">Role</label>
				  <select name="role" class="form-control">
					<option value="">Role</option>
					<option value="admin">Admin</option>
					<option value="user">User</option>

				</select>
				</div>
				
				<br>
			  <div class="form-group">
			   <input type="submit" class="btn btn-primary btn-block" name="register" value="Register">
			  </div>
			  </div>
			  </div>
			  <br>
			  

			</form>
			
						 
             
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a><br>
				
              </div>
            </div>
          </div>
        </div>
		
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

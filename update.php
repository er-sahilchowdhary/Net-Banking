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
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block"><img src="img/web2.jpg " style="width:500px;"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-primary mb-4">UPDATE</h1>
				
              </div>
						  <form action="register.php" method="POST">
			 <div class="form-group">
				<label for="First name">First name :</label>
				<input type="firstname" class="form-control" name="firstname"  id="firstname" placeholder="Enter Firstname">
			  </div>
			  <div class="form-group">
				<label for="Last name">Last name :</label>
				<input type="lastname" class="form-control" name="lastname" id="lastname" placeholder="Enter Lastname">
			  </div>
			   <div class="form-group">
				<label for="Street">Street:</label>
				<input type="Street" class="form-control" name="street" id="Street" placeholder="Enter Street">
			  </div>
			   <div class="form-group">
				<label for="City">City:</label>
				<input type="City" class="form-control" name="city"  id="City" placeholder=" Enter City">
			  </div>
			   <div class="form-group">
				<label for="State">State:</label>
				<input type="State" class="form-control"name="state"  id="State" placeholder="Enter State">
			  </div>
			   <div class="form-group">
				<label for="Zip">Pin code:</label>
				<input type="Zip" class="form-control"name="zip"  id="Zip" placeholder="Enter Pin code">
			  </div>
			  <div class="form-group">
				<label for="Email">Email address:</label>
				<input type="email" class="form-control"name="email"  id="email" placeholder="Enter email">
			  </div>
			   <div class="form-group">
				<label for="Phone no.">Phone no.:</label>
				<input type="" class="form-control" name="phone" id=""placeholder="Enter Phone no.">
			  </div>
			  <div class="form-group">
				<label for="Password">Password:</label>
				<input type="" class="form-control" name="password" id=""placeholder="Enter password">
			  </div>
			  <div class="text-primary">SELECT ROLE</div>
			  <div class="form-check-inline">
			   
				  <label class="form-check-label" for="admin">
					<input type="radio" class="form-check-input" name="role" value="admin" >Admin
				  </label>
				</div>
				<div class="form-check-inline">
				  <label class="form-check-label" for="user">
					<input type="radio" class="form-check-input" name="role" value="user" >User
				  </label>
				</div>
				<br>
			  <div>
			   <input type="submit" class="btn btn-primary" name="register" value="Update User">
			  </div>
			  <br>
			  

			</form>
						  <hr>
             
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

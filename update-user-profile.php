<?php
session_start();
if(!isset($_SESSION['email'])&& $_SESSION['role']!='user')
{
	
	header("Location:login.php");

}
?>
<?php
include("config.php");
include("functions.php");

$user_id=$_GET['user_id'];
$result=mysqli_query($conn,"select * from users where user_id='$user_id'");
while($user_data=mysqli_fetch_array($result))
{
	$user_name=$user_data['user_name'];
	$user_image=$user_data['user_image'];
		
	
		
	$email=$user_data['email'];
	$age=$user_data['age'];
	$gender=$user_data['gender'];
	$street=$user_data['street'];
	$city=$user_data['city'];
	$state=$user_data['state'];
	$pincode=$user_data['zip'];
	$mobile=$user_data['phone'];
	$password=$user_data['password'];

}
?>
<?php
	if(isset($_POST['update']))
	{
		$user_name=$_POST['user_name'];
		$email=$_POST['email'];
		$age=$_POST['age'];
		$gender=$_POST['gender'];
		$street=$_POST['street'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$pincode=$_POST['zip'];
		$mobile=$_POST['phone'];
		$password=$_POST['password'];
		$update_user_image=$_FILES['user_image'];
		$update_user_image_file=$_FILES['user_image']['name'];
		$user_new_name=clean_file_name($user_name);
		
		if(!isset($update_user_image_file) || empty($update_user_image_file))
		{

			$update_result=mysqli_query($conn,"UPDATE users SET user_name = '$user_name',email = '$email',age = '$age',gender = '$gender',street = '$street',city = '$city',state = '$state',zip = '$pincode',phone = '$mobile',password = '$password' WHERE user_id='$user_id'");
			
		} 
		else {
			
			$file_url=file_upload($update_user_image,$user_new_name);
			$file_url="img/".$file_url;
			
			$update_result=mysqli_query($conn,"UPDATE users SET user_name = '$user_name',user_image = '$file_url',email = '$email',age = '$age',gender = '$gender',street = '$street',city = '$city',state = '$state',zip = '$pincode',phone = '$mobile',password = '$password' WHERE user_id='$user_id'");
		}
		
		
		
		
		
		
		
		header("location: user-bank-profile.php");
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

  <title>Bank</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="bank.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ONLINE BANKING </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="user-bank.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>User Panel</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

     

      <!-- Nav Item -  -->
      <li class="nav-item">
        <a class="nav-link" href="user-bank-profile.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>My Profile</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
	   <li class="nav-item">
        <a class="nav-link" href="user-bank-transaction.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Transactions</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="user-bank-wallet.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Wallet</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
	  

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
        

          <!-- Topbar Search -->
          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
           
            

          

             <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hi User</span>
			<img class="img-profile rounded-circle" src="img/user.png">              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
             
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-primary mb-4">Update</h1>
				
              </div>
			<form action="" method="POST" enctype="multipart/form-data">
			<div class="row">
			<div class="col-md-6">
			 <div class="form-group">
				<label for="First name">Name</label>
				<input type="text" class="form-control" name="user_name"  id="firstname" value="<?php echo $user_name; ?>">
			  </div>
			   <div class="form-group">
				<label for="Street">Street</label>
				<input type="text" class="form-control" name="street" id="Street" value="<?php echo $street; ?>">
			  </div>
			   <div class="form-group">
				<label for="City">City</label>
				<input type="text" class="form-control" name="city"  id="City" value="<?php echo $city; ?>">
			  </div>
			   <div class="form-group">
				<label for="State">State</label>
				<input type="text" class="form-control"name="state"  id="State" value="<?php echo $state; ?>">
			  </div>
			   <div class="form-group">
				<label for="Zip">Pin code</label>
				<input type="text" class="form-control"name="zip"  id="Zip" value="<?php echo $pincode; ?>">
			  </div>
			  <div class="form-group">
				<label for="Email">Email</label>
				<input type="email" class="form-control"name="email"  id="email" value="<?php echo $email; ?>">
			  </div>
			  <div class="form-group">
				<label for="Phone no.">Age</label>
				<input type="number" class="form-control" name="age" id="" value="<?php echo $age; ?>">
			  </div>
			  </div>
			  
			  <div class="col-md-6">

			  
			  <div class="form-group">
				<label for="Gender">Gender</label>
				<select name="gender" class="form-control">
				<option value="">Gender</option>
				<option name="Male" <?php if($gender=='Male'){echo "selected"; } ?> >Male</option>
				<option name="Female" <?php if($gender=='Female'){echo "selected"; } ?>>Female</option>
				
				</select>
			  </div>
			   <div class="form-group">
				<label for="Phone no.">Mobile</label>
				<input type="number" class="form-control" name="phone" id="" value="<?php echo $mobile; ?>">
			  </div>
			  <div class="form-group">
				<label for="Password">Password</label>
				<input type="password" class="form-control" name="password" id="" value="<?php echo $password; ?>">
			  </div>
			  
				<div class="form-group">
				<img src="<?php echo $user_image; ?>" style="width:200px"/>
				<label for="Image">Uploading new image replace old one</label>
					<input type="file" name="user_image">
					
				  </div>
				<br>
			  <div class="form-group">
			   <input type="submit" class="btn btn-primary btn-block" name="update" value="Update">
			  </div>
			  </div>
			  </div>
			  <br>
			  

			</form>
            </div>
          </div>
        </div>
		
      </div>
    </div>

      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
   <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
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

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>

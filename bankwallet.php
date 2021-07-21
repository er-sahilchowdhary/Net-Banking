<?php
session_start();
if(!isset($_SESSION["email"]))
{
	header("Location:login.php");

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
        <a class="nav-link" href="bank.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

     

      <!-- Nav Item -  -->
      <li class="nav-item">
        <a class="nav-link" href="admin/bankprofile.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>My Profile</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
	  
	  <li class="nav-item">
        <a class="nav-link" href="bankcustomer.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Customers</span></a>
      </li>
	   <li class="nav-item">
        <a class="nav-link" href="banktransaction.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Transactions</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="bankwallet.php">
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
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hi user</span>
                <img class="img-profile rounded-circle" src="">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
             
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
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
        <div class="container-fluid">
          
                                <div class="card" style="width:80%; margin:0 100px;">
								
								  <div class="card-header text-center ">
		                          <a class="navbar-brand text-primary  font-weight-bold" >Add Wallet</a>
		                         </div>
                                    
                                    <div class="card-body border-top">
                                    <form action="bankwallet.php" method="POST">
                                    <div class="form-group">
                                                <label for="inputLarge" class="col-form-label">Amount to add:</label>
                                                <input id="inputLarge" type="number" class="form-control form-control-lg" name="amount" required="">
                                    </div>
									
									<div class="form-group">
                                                <label for="inputLarge" class="col-form-label">Note:</label>
                                                <textarea id="inputLarge" type="text" class="form-control form-control-lg" name="note" required=""></textarea>
                                    </div>
									
									<div class="form-group" hidden="">
                                                <label for="inputLarge" class="col-form-label"></label>
                                                <input id="inputLarge" type="text" class="form-control form-control-lg" name="added_by" value="Admin">
                                    </div>
										
									 <div class="form-group mb-4" >
									<label for="Type">Type:</label>
									<select class="form-control" name="trans" id="type">
									  <option>Credit</option>
									  <option>Debit</option>
					
									</select>
                  </div>
                  <div class="form-group">
                                                
                                                <button type="submit" name="withdraw" id="inputLarge" class="btn btn-primary" style="width:100%;" required="">Withdraw</button>
                                    </div>
									
									<div class="form-group">
                                                
                                                <button type="submit" name="submit" id="inputLarge" class="btn btn-primary" style="width:100%;" required="">Add Wallet</button>
                                    </div>
									
								
                                        </form>
                                    </div>
                                </div>

        <!-- /.container-fluid -->

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
          <a class="btn btn-primary" href="login.php">Logout</a>
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
<?php
include("bankconnection.php");

if(isset($_POST['submit']))
{
	//echo"testing";
  $ammount=$_POST['amount'];
  $id=$_SESSION["id"];
  $trans=$_POST['trans'];

  $res=mysqli_query($conn,"SELECT balance FROM `account` WHERE account_id='$id' ");

 
  while($user_data = mysqli_fetch_array($res))
	{
	$amm = $user_data['balance'];
	//echo $amm;
	}
	$new_ammount=$amm+$ammount;
    $result=mysqli_query($conn,"update account set balance='$new_ammount' where account_id='$id' ");
    $trans= mysqli_query($conn,"insert into transactions (account_id,amount,total_balance,time_date) values('$id','$ammount','$new_ammount','')");
  if($result)
  {
    echo "Your Account has been credited with ".$ammount." now balance of your account is ".$new_ammount;
  }
  else
  {
    die("There is problem plaese try again".mysqli_error($conn));
  }
}


 if(isset($_POST['withdraw']))
 {
    $ammount=$_POST['amount'];
    $id=$_SESSION["id"];
    $res=mysqli_query($conn,"SELECT balance FROM `account` WHERE account_id='$id' ");
    while($user_data = mysqli_fetch_array($res))
	{
	$amm = $user_data['balance'];
	//echo $amm;
	}
	if($amm<$ammount)
	{
		echo "You have low balance";
	}
	else
	{
		$new_ammount=$amm-$ammount;
		echo $new_ammount."<br>";

	}
  $result=mysqli_query($conn,"update account set balance='$new_ammount' where account_id='$id' ");
  if($result)
  {
    echo "Your Account has been debited with ".$ammount." now balance of your account is ".$new_ammount;

    $trans= mysqli_query($conn,"insert into transactions (account_id,amount,total_balance,time_date) values('$id','$ammount','$new_ammount','')");
  }
  else
  {
    die("There is problem plaese try again".mysqli_error($conn));
  }

 }





?>

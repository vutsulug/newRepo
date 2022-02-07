<?php
//Initiate database connection
include_once('connection.php');
 //Start session
 session_start();
 
 //Store session
 $user_check = $_SESSION['login_user'];
 
 //SQL Query to fetch completed information
 $ses_sql = mysqli_query($conn,"SELECT email FROM users WHERE email = '$user_check'");
 $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
 $login_session = $row['email'];
 
//Check if the user has logged on if not then re-direct to login page
if(!isset($_SESSION['login_user'])) // || $_SESSION['login_user'] !== true
 {
	header('Location: login.php');
	exit;
 }

//extract user details from the database
//Initialize variables
$fname = $lname = $email = $password = $conPassword = $role = "";
$query = $conn->query("SELECT * FROM users WHERE email = '$login_session'");           
while($row = $query->fetch_array()) 
{
 if($row['email'] != "")
  {
    $fname = $row['fname'];
    $lname = $row['lname'];
    $email = $row['email'];
    $password  = $row['password'];
    $conPassowrd  = $row['confirmPassword'];
    $role = $row['role'];
  }
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $tempFname = test_input($_POST['updateName']);
  $tempLname = test_input($_POST['updateSurname']);
  $tempEmail = test_input($_POST['updateEmail']);
  $tempPassword = test_input($_POST['updatePassword']);
  $tempConPassword = test_input($_POST['updateConPassword']);

  if($fname != $tempFname){
    $updateQuery = "UPDATE users SET fname = '$tempFname' WHERE fname = '$fname'";
    mysqli_query($conn, $updateQuery);
    echo $tempFname;
  }

  if($lname != $tempLname){
    $updateQuery = "UPDATE users SET lname = '$tempLname' WHERE lname = '$lname'";
    mysqli_query($conn, $updateQuery);
  }

  $updateQuery = "UPDATE users SET role = 'admin' WHERE email LIKE 'admin%'";
  mysqli_query($conn, $updateQuery);

}

//check for incorrect user input
function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
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

  <title>User profile</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  <!-- My Custom styles for this template-->
  <link href="css/mystyle.css" rel="stylesheet">    
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
	<button class="btn btn-link btn-sm text-black order-1 order-sm-0">
  <a class="fas fa-home" href="admin-access.php"></a> Home
  </button>
	
    <button class="btn btn-link btn-sm text-blue order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#"><i class="fas fa-user fa-fw"></i> Profile
          </a>
          <a class="dropdown-item" href="logout.php"><i class="fas fa-fw fa-sign-out-alt"></i> Logout
          </a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link">
        <span><?php echo $user_check;?><span>
          <i class="fas fa-circle" style="color:green"></i>
          <span style="color:green">Online<span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="admin-access.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="login.php">Login</a>
          <a class="dropdown-item" href="register.php">Register</a>
          <a class="dropdown-item" href="forgot-password.php">Forgot Password</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Other Pages:</h6>
          <a class="dropdown-item" href="404.php">404 Page</a>
          <a class="dropdown-item" href="blank.php">Blank Page</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="All_appointments.php">
          <i class="fas fa-fw fa-clock"></i>
          <span class= "text">Appointments</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="patients.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Patients</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="doctor.php">
          <i class="fas fa-fw fa-first-aid"></i>
          <span>Doctors</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-hammer"></i>
          <span>Tools</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-tools"></i>
          <span>Settings</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>

        <!-- User Data -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            User Details
            <div class="" align ="right">
              <button class="btn btn-info btn-sam" name = "submit" type="submit"><i class="fas fa-download"></i> Download profile</button>
            </div>
          </div>
           
          <div class="card-body">
            <div class="table-responsive">
              <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
               <label for="name">Name</label>
               <input class="form-control" name = "updateName" value= "<?php echo $fname?>"><br>
               <label for="surname">Surname</label>
               <input class="form-control" name = "updateSurname" value= "<?php echo $lname?>"><br>
               <label for="email">Email Address</label>
               <input class="form-control" name = "updateEmail" value= "<?php echo $email?>"><br>
               <label for="password">Password</label>
               <input class="form-control" name = "updatePassword" value= "<?php echo $password?>"><br>
               <label for="conPassword">Password Confirmation</label>
               <input class="form-control" name = "updateConPassword" value= "<?php echo $conPassowrd?>"><br>
               <label for="password">Role</label>
               <input class="form-control" name = "updatePassword" value= "<?php echo $role?>"><br>
               <button class="btn btn-outline-success btn-sm" name = "submit" type="submit"><i class="fas fa-spinner fa-spin" align="center" ></i> Update Information</button>
              </form>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

        <p class="small text-center text-muted my-5">
          <em>More table examples coming soon...</em>
        </p>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>

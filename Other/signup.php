<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Create an account</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/css/custom.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap-social.css">
  <link rel="stylesheet" href="bootstrap/Own/pageStyling.css">
</head>

<body style = "background-color:black">
<?php
//define variables and set to empty values
$fname = $email= $username= $password= $cpassword= "";
//Error variables
$fnameErr = $emailErr= $usernameErr= $passwordErr= $cpasswordErr= $cpasswordMatch= "";
//database connection
$servername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="vutsulutech";

//create connection
$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

//
if($_SERVER["REQUEST_METHOD"] == "POST")
{	
	//Required fields
	if(empty($_POST["fname"]))
	{
		$fnameErr = "Name is required";
	}else{
		$fname = test_input($_POST["fname"]);
		//check if name contains only letters and white spaces
		if(!preg_match("/^[a-zA-Z]*$/",$fname))
		{
			$fnameErr = "Name can not contain numbers"; 
		}
	}
	
	//check if emails does exit
	//$result = mysqli_query("SELECT * FROM user_details WHERE email='$Email'");
	
	if(empty($_POST["email"]))
	{
		$emailErr = "Email already exist in our records.";
	}else{
		$email = test_input($_POST["email"]);
		//Email validation
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$emailErr = "Invalid email format";
		}
	}
	
	if(empty($_POST["username"]))
	{
		$usernameErr = "*";
	}else{
		$username = test_input($_POST["username"]);
	}
	
	if(empty($_POST["password"]))
	{
		$passwordErr = "*";
	}else{
		$password = test_input($_POST["password"]);
	}
	
	if(empty($_POST["cpassword"]))
	{
		$cpasswordErr = "*";
	}else{
		$cpassword = test_input($_POST["cpassword"]);
	}
	
	//compare password confirmation 
	if(test_input($_POST["password"]) != test_input($_POST["cpassword"]))
	{
		$cpasswordMatch = "Password do not match";
	}
}
function isValid($email)
{
	$pattern = "";
	if(eregi($pattern, $email))
	{
		return true;
	}else{
		return false;
	}
}

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
} 

//check connection
if(!$conn)
{
	die("Connection failed: ".mysqli_connect_error());
}
//insert data
$sqlQuery="INSERT INTO user_details(email,username,fname,password,confirmPassword)
VALUES('$email','$username','$fname','$password','$cpassword')";
if(mysqli_query($conn, $sqlQuery))
{
	//echo "New record";
}else{
	//echo "Error: ".$sql."<br>".mysqli_error($conn);
}

mysqli_close($conn);
?>

<!-- the navbar -->
  <nav class="navbar navbar-toggleable-md navbar-light bg-info">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
        </li>
     </ul>
    </div>
  </nav>
<!-- the user account -->
<div class="container">
    <h1 align="center">Create Account</h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<input type="text" name="fname" maxlength="30" placeholder="First name" required></br></br>
	<input type="text" name="username" maxlength="30" placeholder="Username" required></br></br>
	<input type="text" name="email" maxlength="30" placeholder="E-mail Address" required><span class="error" style="color:red"><?php echo $emailErr;?></span></br></br>
	<input type="password" id="psw" name="password" maxlength="15" placeholder="Password" required><span class="error" style="color:red"><?php echo $passwordErr;?></span></br></br>	
	<input type="password" name="cpassword" maxlength="15" placeholder="Confirm Password" required><span class="error" style="color:red"></span></br><br>
	<!--<a type = "submit" name="submit" class="btn btn-primary btn-lg" role="button" data-toggle="modal" data-target="#exampleModal">Register</a>-->
	<!--<button type = "submit" name="submit" class="btn btn-primary btn-lg" role="button" data-toggle="modal" data-target="#exampleModal">Register</button>-->
	<input type = "submit" name="submit" value="Register">
	<a href="login.php"> Login?</a>
	</form>
<!--Password format-->
<div id="message" align="left">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
	
  <!-- Pop up Modal-->
  <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Congratulations!</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
        </div>
      <div class="modal-body">
      Your account have been successfully created.
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-info" data-dismiss="modal">OK</button>
    </div>
   </div>
  </div>  
  </div>
</div>

<!--Currently added code-->
<style>
 h4{color:white;
 }
 footer p{color:whitesmoke;}
 
 background: -webkit-linear-gradient(0deg, #2380ff 0%, #2380ff 100%);
 
</style>
	 <div class="container-fluid " style="background-color:black; height:450px; h4{color:white; right:2000px;}">
	
	<footer>
            <div class="row row-nav" style = "padding-left:10px;padding-top:50px;">
                
				<div class="col-md-4 quickLinks">
				
					<h4>Quick Links</h4><hr>
					<ul class="list-unstyled list-inline list-social-icons">
                    <li>
                         <p><a href="index.php">Home</a></p>
                    </li>
                    <li>
                        <p><a href="login.php">Login</a></p>
                    </li>
                </ul>
				
				
				</div>
				
			<div class="col-md-4">
				<h4>Contact Us</h4><hr>
				<p><i class="fa fa-home fa-2x"></i> Pretoria :  376 Soshanguve Block H<br/></p>
				<p><i class="fa fa-phone"></i> 
                    Phone no: 081 482 4982 / 082 407 6843</p>
                <p><i class="fa fa-envelope-o"></i> 
                   Email:<a href=" mailto:vutsulug@gmail.com">vutsulug@gmail.com</a>
                </p>
			</div>
			<!--Social media icons-->
			<div class="col-md-4">
				<h4>Social Network</h4><hr>
				<ul class="list-unstyled list-inline list-social-icons">
                    <li>
                        <a href="https://www.facebook.com/nyiko.vutsulu.3?ref=bookmarks"><i class="fa fa-facebook-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="https://www.twitter.com/Gift.vutsulu.3?ref=bookmarks"><i class="fa fa-linkedin-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="https://www.twitter.com/Gift.vutsulu.3?ref=bookmarks"><i class="fa fa-twitter-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="https://www.twitter.com/Gift.vutsulu.3?ref=bookmarks"><i class="fa fa-google-plus-square fa-2x"></i></a>
                    </li>
                </ul>

			</div>	
        </footer>
	</div>
	
	</div>
<!--Scripts-->
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) { 
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) { 
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) { 
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="bootstrap/js/tether.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="bootstrap/js/ie10-viewport-bug-workaround.js"></script>
<script src="bootstrap/js/Bootstrap_tutorial.js"></script>
</body>

</html>
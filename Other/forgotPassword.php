<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Recover an account</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/css/custom.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap-social.css">
  <link rel="stylesheet" href="bootstrap/Own/pageStyling.css">
</head>

<body style = "background-color:black">
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
<!-- the jumbotron -->
<div class="jumbotron bg-warning">
    <h1 class="display-3" align="center">Recover Account</h1>
	<br>
	<form >
	<input type="text" name="email" size="30" placeholder="E-mail Address" required></br>
    <input type="submit" name="reset-password" value="Submit">
	</form>
  <!-- Pop up Modal-->
  <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Note!!!</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
        </div>
      <div class="modal-body">
      Reset password link has been sent to your email address.
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
    </div>
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
 
 background: -webkit-linear-gradient(0deg, #2380ff 0%, #52fdd9 100%);
 
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
                    <li>
                        <p><a href="signup.php">Sign Up</a></p>
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
			<div class="col-md-4">
				<h4>Social Network</h4><hr>
				<ul class="list-unstyled list-inline list-social-icons">
                    <li>
                        <a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a>
                    </li>
                </ul>

			</div>	
        </footer>
	</div>
	
	</div>
<!--Scripts-->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="bootstrap/js/tether.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="bootstrap/js/ie10-viewport-bug-workaround.js"></script>
<script src="bootstrap/js/Bootstrap_tutorial.js"></script>
</body>

</html>
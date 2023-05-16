<?php

include_once('database.php');
session_start();

if((!isset($_SESSION['senha_rls'])== true) || (!isset($_SESSION['email_rls'])== true)){
    session_destroy();
    header("Location: index.php");
} else {
$email = $_SESSION['email_rls'];
$id_rls = $_SESSION['id_rls_rls'];
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

<style>
	.imgSolutions{
            width: 80px;
            height: 80px;
        }
		#icon{
		position:absolute;
		top: 50%;
		right: 20px;
		transform: translateY(-50%);
		background: url('./img/eye.png');
		background-size: cover;
		width:20px;
		height:20px;
		cursor: pointer;
	}	
	#icon.hidden{
		background: url('./img/hidden.png');
		background-size: cover;
	}
	.button {
  display: inline-block;
  padding: .75rem 1.25rem;
  border-radius: 10rem;
  color: white;
  text-transform: uppercase;
  font-size: 1rem;
  transition: all .8s;
  position: relative;
  overflow: hidden;
  z-index: 1;
  background-color: rgb(7, 160, 254);

  &:hover {
    background-color: rgb(2, 74, 142);
	cursor:pointer;
    
  }
}
</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="validaEntrada.php" method="POST">
					<span class="login100-form-title p-b-26">
						Login Usuario
					</span>
					<span class="login100-form-title p-b-48">
					<img src="img/solutionsbi.png" alt="" class="imgSolutions">
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email" required placeholder="Email">
						<span class="focus-input100" ></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
					<div id="icon" onclick="showHidden()"></div>
						<input class="input100" type="password" name="senha" id="password" required placeholder="Senha">
						<span class="focus-input100" ></span>
					</div>

					<input class="btn btn-primary button" type="submit" name="login" value="Login">
					

					<br><br>
						<span class="txt1">
							Ainda não é cadastrado?
						</span>

						<a class="txt2" href="registro.php">
							Clique aqui
						</a>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="script.js"></script>
</body>
</html>
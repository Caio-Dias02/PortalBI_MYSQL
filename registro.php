<?php


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
</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="validaRegistro.php" method="POST" class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						Cadastro
					</span>
					<span class="login100-form-title p-b-48">
					<img src="img/solutionsbi.png" alt="" class="imgSolutions">
					</span>
                    <div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="nome">
						<span class="focus-input100" data-placeholder="Nome"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valido e-mail é : teste@gmail.com">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

                    <div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="cpf">
						<span class="focus-input100" data-placeholder="CPF"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="senha">
						<span class="focus-input100" data-placeholder="Senha"></span>
					</div>

					<div >
					<select name="permissao" class="" aria-label=".form-select-sm example">
						<option disabled selected>Permissão</option>
						<option  value="Admin">Admin</option>
						<option value="Usuario">Usuario</option>
					</select>
					</div> <br>

					
						<input type="submit" name="registrar" value="Registrar">
						<br><br>

						<span class="txt1">
							É cadastrado?
						</span>

						<a class="txt2" href="index.php">
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

</body>
</html>
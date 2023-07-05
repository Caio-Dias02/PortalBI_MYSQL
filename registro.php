<?php
include_once('database.php');
$sqlWorkspace = "SELECT * FROM empresas";
$result = $mysqli->query($sqlWorkspace);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="img/solutionsbi.png"/>
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
				<form action="validaRegistro.php" method="POST" class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						Cadastro
					</span>
					<span class="login100-form-title p-b-48">
					<img src="img/solutionsbi.png" alt="" class="imgSolutions">
					</span>
                    <div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="nome" placeholder="Nome" required>
						<span class="" data-placeholder="Nome"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valido e-mail é : teste@gmail.com">
						<input class="input100" type="email" name="email" placeholder="E-mail" required>
						<span class="focus-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="cpf" placeholder="CPF" required>
						<span class="focus-input100" ></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
					<div id="icon" onclick="showHidden()"></div>
						<input class="input100" type="password" name="senha" id="password" placeholder="Senha" required>
						<span class="focus-input100" ></span>
					</div>

					<div >
					<select name="permissao" class="" aria-label=".form-select-sm example" required>
						<option disabled selected>Permissão</option>
						<option value="1">Diretoria</option>
						<option value="2">Gerencia Buco</option>
						<option value="3">Gerencia Neural</option>
						<option value="4">Gerencia Serviços</option>
					</select>
					</div> <br>
					<div>
					<select name="empresas" class="" aria-label=".form-select-sm example" required>
						<option disabled selected>Empresas</option>
						<?php while ($rows = mysqli_fetch_assoc($result)){
						echo "<option value='$rows[id_empresa]'>".$rows['nome_empresa']."</option>";
							} ?>
					</select>
					</div> <br>
						<input class="button" type="submit" name="registrar" value="Registrar">
						<br><br>

						<span class="txt1">
							É cadastrado?
						</span>

						<a class="txt2" href="index.php">
							Clique aqui
						</a>
						<br><br>
						<a class="txt2" href="empresas.php">
							Cadastro de empresas
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
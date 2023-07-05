<?php 

include_once('database.php');
session_start();

if(isset($_POST['login']) && isset($_POST['email']) && isset($_POST['senha'])){

	$email = trim(strip_tags($_POST['email']));
	$senha = trim(strip_tags($_POST['senha']));
	
	//echo $email;
	//echo $senha;
	
	$sql = "SELECT id_user ,rls.id_rls as rls, nome_usuario, Users.email, Users.senha from Users left join rls on Users.id_rls = rls.id_rls WHERE Users.email = '$email'";

   // echo $sql;
	
	
   $result = $mysqli->query($sql);
	
	//print_r($sql);
	//print_r($stmt);
	
	// Exibe o resultado
	
	if($result) {
		$row = mysqli_fetch_assoc($result);
		if(password_verify($senha, $row['senha'])){
			$_SESSION['id_rls'] = $row['rls'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['senha'] = $row['senha'];
            $_SESSION['nome'] = $row['nome_usuario'];
			$_SESSION['id_user'] = $row['id_user'];
			echo $_SESSION['id_rls'];
			echo $_SESSION['email'];
			echo $_SESSION['senha'];
			
            
			header("Location: dashboard.php");
		} else {
			header("Location: rlsLogin.php");
           
		}
	}
	}
	
	else {
		header("Location: index.php");
        
	}
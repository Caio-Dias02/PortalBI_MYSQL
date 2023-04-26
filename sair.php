<?php

session_start();
unset($_SESSION['id_user'], $_SESSION['nome'], $_SESSION['email']);

header("Location: index.php");
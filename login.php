
<?php
session_start();  
include("banco.php");

if (empty($_POST['login']) || empty($_POST['senha']) ) {
	header("Location: loginconta.php");
	exit();
}

$login = mysqli_real_escape_string($mysqli, $_POST['login']);
$senha = mysqli_real_escape_string($mysqli, $_POST['senha']);
		
$query = "SELECT idCliente, login FROM cliente WHERE login = '{$login}' || email = '{$login}' AND senha = '{$senha}'";

$result = mysqli_query($mysqli, $query);
$row = mysqli_num_rows($result);

if ($row == 1) {
	$_SESSION['login'] = $login;
	header('Location: poscadastro.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: loginconta.php');
	exit();
}

?>
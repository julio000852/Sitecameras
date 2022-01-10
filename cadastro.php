<?php

include_once("banco.php");

if (empty($_POST['nome']) || empty($_POST['sobrenome']) || empty($_POST['login']) || empty($_POST['senha']) || empty($_POST['email']) ) {
	header('Location: cadastro.html');
	exit();
}

if(isset($_POST['Submit'])) {	
	$nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
	$sobrenome = mysqli_real_escape_string($mysqli, $_POST['sobrenome']);
	$login = mysqli_real_escape_string($mysqli, $_POST['login']);
	$senha = mysqli_real_escape_string($mysqli, $_POST['senha']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
		
	$result = mysqli_query($mysqli, "INSERT INTO cliente(nome,sobrenome,login,senha,email) VALUES('$nome','$sobrenome','$login','$senha','$email')");
			
}
?>

<html>
<head>
	<title>Add cadastro</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
</head>

<body style="background-image: url(./img/cxma.jpeg); background-size: cover;">


	<div id="longin-conteiner">
		<h1 style="color: green;">Cadastro realizado com sucesso</h1>
		<img width="100" height="100" src="./img/Sucesso.jpg">
		<a href="login.html">
		<div style="margin-left: 100px; margin-top: 50px; background-color: #00ff6a;" class="bt_cadastrar" id="cad">
        	<h3 style="margin-top: 5px;">Voltar ao login</h3>
        </div>
        </a>
	</div>

</body>
</html>
<?php
session_start();
include_once("banco.php");

/*if (empty($_POST['nome']) || empty($_POST['sobrenome']) || empty($_POST['login']) || empty($_POST['senha']) || empty($_POST['email']) ) {
	header('Location: cadastro.html');
	exit();
}*/

if(isset($_POST['Submit'])) {	
	$nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
	$sobrenome = mysqli_real_escape_string($mysqli, $_POST['sobrenome']);
	$login = mysqli_real_escape_string($mysqli, $_POST['login']);
	$senha = mysqli_real_escape_string($mysqli, $_POST['senha']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
		
	$result = mysqli_query($mysqli, "INSERT INTO cliente(nome,sobrenome,login,senha,email) VALUES('$nome','$sobrenome','$login','$senha','$email')");
	
	header('Location: loginconta.php');

	$_SESSION['cadastrado'] = '<div style="background-color: green; height: 50px; width: 250px; text-align: center; 							   align-items: center; border-radius: 10px;">
                       		   <h3 style="color: white; margin-top: 13px;">cadastrado com sucesso!</h3>
                        	   </div>';
}




?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Cadastro</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    

    <link rel='stylesheet' type='text/css' href='./css/main2.css'>
    <script src='js/main.js'></script>
    <!--Externo-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    
</head>
<body>
    <div class="main">
        <div class="img_direita" id="img_direita"></div>
        <div class="direita" id="direita">
            <div class="tela_cadastro">
                <div class="cadastro">
                    <h1>Cadastrar-se</h1>
                    <div class="linha linha_cad"></div>

                    <form class="campos_cadastro" action="cadastro.php" method="post" name="form1">

                    	<?php
                        if (isset($_SESSION['cadastrado'])):
                        ?>
                        <div style="background-color: green; height: 50px; width: 250px; text-align: center; align-items: center; border-radius: 10px;">
                        <h3 style="color: white; margin-top: 13px;">cadastrado com sucesso!</h3>
                        </div>
                        <?php
                        endif;
                        ?>
                      
                        <input class="nome" placeholder="Nome" type="text" name="nome" required>
                                             
                        <input class="snome" placeholder="Sobrenome" type="text" name="sobrenome" required>
                        
                        <input class="user" placeholder="Usuario" type="text" name="login" required>
                        
                        <input class="senha" placeholder="Senha" type="password" name="senha" required>
                    
                        <input class="telefone" placeholder="E-mail" type="email" name="email" required>
                                                
                        <input style="text-transform: uppercase;font-weight: bold;color: #fff;background:#007fff" class="user" type="submit" name="Submit" value="Cadastrar-se">
                        
                        <div style="justify-content: center; text-align: center;" class="telefone">
                            <p>Já tem uma conta?<a href="./loginconta.php">Login</a></p>
                            
                        </div>
                        
                    </form>

                </div>
            </div>
        </div>
        <div class="img_esquerda" id="img_esquerda"></div>
    </div>
</body>
</html>

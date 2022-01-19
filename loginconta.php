<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <script src='js/main.js'></script>
    <!--Externo-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    
</head>
<body>
    <div class="main">
        <div class="esquerda" id="esquerda">
            <div class="tela_login">
                <form class="login" action="login.php" method="post" name="form1">
                    <h1>Login</h1>
                    <div class="linha"></div>                   
                    <div class="campos">
                        
                        <?php
                        if (isset($_SESSION['nao_autenticado'])):
                        ?>
                        <div style="background-color: red; height: 50px; width: 250px; text-align: center; align-items: center; border-radius: 10px;">
                        <h3 style="color: white; margin-top: 13px;">Login ou Senha errados!</h3>
                        </div>
                        <?php
                        endif;
                        unset($_SESSION['nao_autenticado']);
                        ?>

                        <?php
                        if (isset($_SESSION['cadastrado'])){
                            echo $_SESSION['cadastrado'];
                            unset($_SESSION['cadastrado']);
                        }
                        ?>

                        <input type="text" name="login" placeholder="Digite o Login" required>
                        <input type="password" name="senha" placeholder="Senha" required>
                    </div>
                    <input style="text-transform: uppercase;font-weight: bold;" type="submit" name="Submit" value="Login" class="bt_login bt1">
                    <div class="bt_login bt1" id="cad">
                        <a style="text-decoration: none;" class="h3c" href="cadastro.php">
                        <h3>Cadastrar-se</h3>
                        </a>
                    </div>                   
                </form>
            </div>
        </div>
        <div class="img_direita" id="img_direita"></div>
        
    </div>
</body>
</html>
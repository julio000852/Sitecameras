<?php
ob_start();
include("banco.php");
include("verificarLogin.php");

if (isset($_POST['Submitnewsenha'])){
    $senha = mysqli_real_escape_string($mysqli, $_POST['senha']);
    $senhanew = mysqli_real_escape_string($mysqli, $_POST['senhanew']);

    if ($senha == $_SESSION['senha'] ) {

        $query_usuario = "SELECT idCliente, senha
                         FROM cliente 
                         WHERE login = '{$_SESSION['login']}' 
                         LIMIT 1";

        $result = mysqli_query($mysqli, $query_usuario);
        $row = mysqli_num_rows($result);

        if ($row == 1) {
            $res = mysqli_fetch_array($result);
            $query_up_usuario = "UPDATE cliente 
                                 SET senha = '{$senhanew}'
                                 WHERE idCliente = '{$res['idCliente']}'
                                 LIMIT 1";
            $result_up_usuario = $mysqli->prepare($query_up_usuario);

            if ($result_up_usuario->execute()) {
                $_SESSION['msgsucesso'] = '<div style="background-color: green; height: 70px; width: 250px; text-align: center; align-items: center; border-radius: 10px;">
                                                <h3 style="color: white; margin-top: 13px;">Senha atualizada com sucesso!</h3>
                                                </div>';
                header('Location: poscadastro.php');
            }else{
                echo '<div style="background-color: red; height: 50px; width: 250px; text-align: center; align-items: center; border-radius: 10px;">
                      <h3 style="color: white; margin-top: 13px;">Tente Novamente!</h3>
                      </div>';
                 }

        } else {
            echo '<div style="background-color: red; height: 50px; width: 250px; text-align: center; align-items: center; border-radius: 10px;">
                      <h3 style="color: white; margin-top: 13px;">Tente Novamente!</h3>
                      </div>';
        }
        } else {
            $_SESSION['erroSenha'] = '<div style="background-color: red; height: 50px; width: 250px; text-align: center;                                align-items: center; border-radius: 10px;">
                                       <h3 style="color: white; margin-top: 13px;">Senhas não conferem!</h3>
                                       </div>';
        }
    }
                  
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Atualizar Senha</title>
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
                <form class="login" action="alterarSenha.php" method="POST" name="form1">
                    <h1>Atualizar Senha</h1>
                    <div class="linha"></div>                
                    <div class="campos">
                        <?php
                        if (isset($_SESSION['erroSenha'])){
                            echo $_SESSION['erroSenha'];
                            unset($_SESSION['erroSenha']);
                        }
                        ?>

                        <?php
                        if (isset($_SESSION['msgsucesso'])){
                            echo $_SESSION['msgsucesso'];
                            unset($_SESSION['msgsucesso']);
                        }
                        ?>     
                        <input type="password" name="senha" placeholder="Digite a sua senha atual" value="" required>
                        <input type="password" name="senhanew" placeholder="Digite a nova senha" value="" required><br>
                        <input style="text-transform: uppercase;font-weight: bold;" type="Submit" name="Submitnewsenha" value="Atualizar" class="bt_login bt1">
                    </div>
                    

                </form>
            </div>
        </div>
        <div class="img_direita" id="img_direita"></div>
        
    </div>
</body>
</html>
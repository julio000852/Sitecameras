<?php
session_start();
ob_start();
include("banco.php");
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
                <form class="login" action="#" method="post" name="form1">
                    <h1>Atualizar Senha</h1>
                    <div class="linha"></div>                   
                    <div class="campos">
                        <?php  
                        $chave = filter_input(INPUT_GET, 'chave', FILTER_DEFAULT);
                        //var_dump($chave);
                        if (!empty($chave)) {
                            $query_usuario = "SELECT idCliente, senha
                                        FROM cliente 
                                        WHERE recuperaSenha = '{$chave}' 
                                        LIMIT 1";
                            $result = mysqli_query($mysqli, $query_usuario);
                            $row = mysqli_num_rows($result);

                            if ($row == 1) {
                                $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                                //var_dump($dados);
                                if(!empty($dados['Submitnewsenha'])){
                                    $res = mysqli_fetch_array($result);
                                    $reculperasenha = 'NULL';
                                    $query_up_usuario = "UPDATE cliente 
                                                        SET senha = '{$dados['senha']}',
                                                            recuperaSenha = '{$reculperasenha}'
                                                        WHERE idCliente = '{$res['idCliente']}'
                                                        LIMIT 1";
                                    $result_up_usuario = $mysqli->prepare($query_up_usuario);

                                    if ($result_up_usuario->execute()) {
                                        $_SESSION['msg'] = '<div style="background-color: green; height: 70px; width: 250px; text-align: center; align-items: center; border-radius: 10px;">
                                            <h3 style="color: white; margin-top: 13px;">Senha atualizada com sucesso!</h3>
                                            </div>';
                                            header("Location: loginconta.php");
                                    }else{
                                        echo '<div style="background-color: red; height: 50px; width: 250px; text-align: center; align-items: center; border-radius: 10px;">
                                       <h3 style="color: white; margin-top: 13px;">Tente Novamente!</h3>
                                       </div>';
                                        }

                                }
                            } else {
                                $_SESSION['msg_rec'] = '<div style="background-color: red; height: 70px; width: 250px; text-align: center; align-items: center; border-radius: 10px;">
                                    <h3 style="color: white; margin-top: 13px;">Link Inválido! Solicite um novo link!</h3>
                                    </div>';
                                header("Location: reculpera_senha.php");
                                }
                        } else {
                            $_SESSION['msg_rec'] = '<div style="background-color: red; height: 70px; width: 250px; text-align: center; align-items: center; border-radius: 10px;">
                                    <h3 style="color: white; margin-top: 13px;">Link Inválido! Solicite um novo link!</h3>
                                    </div>';
                                header("Location: reculpera_senha.php");
                        }
                        
                        ?>
                        <input type="password" name="senha" placeholder="Digite a nova senha" value="<?php if(isset($dados['senha'])){ echo $dados['senha']; } ?>" required><br>
                        Lembrou a senha? <a style="margin-top: 8px;" href="loginconta.php"> click aqui para fazer login</a>
                        <input style="text-transform: uppercase;font-weight: bold;" type="submit" name="Submitnewsenha" value="Atualizar" class="bt_login bt1">
                    </div>
                    

                </form>
            </div>
        </div>
        <div class="img_direita" id="img_direita"></div>
        
    </div>
</body>
</html>
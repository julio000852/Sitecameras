<?php
session_start();
ob_start();
include("banco.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'lib/vendor/autoload.php';
$mail = new PHPMailer(true);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Recuperar Senha</title>
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
                    <h1>Recuperar Senha</h1>
                    <div class="linha"></div>   

                    <?php  
                    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                    if(!empty($dados['reculperaSenha'])){
                        $query_usuario = "SELECT idCliente, nome, email
                                        FROM cliente
                                        WHERE email = '{$dados['email']}'
                                        LIMIT 1";
                        $result = mysqli_query($mysqli, $query_usuario);
                        $row = mysqli_num_rows($result);

                        if ($row == 1) {
                                $chaveRecSenha = password_hash(123456, PASSWORD_DEFAULT);
                                $res = mysqli_fetch_array($result);
                                $query_up_usuario = "UPDATE cliente 
                                                    SET recuperaSenha = '{$chaveRecSenha}'
                                                    WHERE idCliente = '{$res['idCliente']}'
                                                    LIMIT 1";
                                $result_up_usuario = $mysqli->prepare($query_up_usuario);

                                if ($result_up_usuario->execute()) {
                                    $link = "http://localhost/can/atualizar_senha.php?chave=$chaveRecSenha";
                                    try {
                                        //Server settings
                                        /*$mail->SMTPDebug = SMTP::DEBUG_SERVER;*/
                                        $mail->CharSet = 'UTF-8';
                                        $mail->isSMTP();
                                        $mail->Host       = 'smtp.mailtrap.io';
                                        $mail->SMTPAuth   = true;
                                        $mail->Username   = '19d55037ee0876';
                                        $mail->Password   = '3b760e2e16b8a0';
                                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                                        $mail->Port       = 2525;

                                        //Recipients
                                        $mail->setFrom('SiteCameras@can.com.br', 'SiteCameras');
                                        $mail->addAddress($dados['email'], $res['nome']);
                                        
                                        //Content
                                        $mail->isHTML(true);
                                        $mail->Subject = 'Recuperar Senha';
                                        $mail->Body    = 'Prezado(a) '. $res['nome'] .".Você solicitou a alteração de sua senha.<br><br>Para continuar o processo de reculperação de sua senha, click no link abaixo, ou cole o endereço em seu navegador: <br><br><a href='". $link ."'>". $link ."</a><br><br>Se você não solicitou essa alteração, nenhuma ação é necessária, sua senha será a mesma até a ativação desse código.<br><br>";
                                        $mail->AltBody = 'Prezado(a) '. $res['nome'] .".\n\nVocê solicitou a alteração de sua senha.\n\nPara continuar o processo de reculperação de sua senha, click no link abaixo, ou cole o endereço em seu navegador: \n\n". $link ."\n\nSe você não solicitou essa alteração, nenhuma ação é necessária, sua senha será a mesma até a ativação desse código.\n\n";

                                        $mail->send();

                                        $_SESSION['msg'] = '<div style="background-color: green; height: 70px; width: 250px; text-align: center; align-items: center; border-radius: 10px;">
                                            <h3 style="color: white; margin-top: 13px;">E-mail enviado com sucesso! acesse para atualizar sua senha!</h3>
                                            </div>';
                                            header("Location: loginconta.php");

                                        }catch (Exception $e) {
                                            echo "E-mail não enviado, ERRO. Mailer Error: {$mail->ErrorInfo}";
                                        }

                                }else{
                                    echo '<div style="background-color: red; height: 50px; width: 250px; text-align: center; align-items: center; border-radius: 10px;">
                                   <h3 style="color: white; margin-top: 13px;">Tente Novamente!</h3>
                                   </div>';
                                }
                        } else {
                               echo '<div style="background-color: red; height: 50px; width: 250px; text-align: center; align-items: center; border-radius: 10px;">
                                   <h3 style="color: white; margin-top: 13px;">Usuario não encontrado!</h3>
                                   </div>';
                                }
                        }
                    ?>      

                    <div class="campos">
                        <?php
                        if (isset($_SESSION['msg_rec'])){
                            echo $_SESSION['msg_rec'];
                            unset($_SESSION['msg_rec']);
                        }
                        ?>
                        <input type="email" name="email" placeholder="Digite o e-mail"
                         value="<?php if(isset($dados['email'])){ echo $dados['email']; } ?>" required><br>
                         Lembrou a senha? <a style="margin-top: 8px;" href="loginconta.php"> click aqui para fazer login</a>
                        <input style="text-transform: uppercase;font-weight: bold;" type="submit" name="reculperaSenha" value="Recuperar" class="bt_login bt1">
                    </div>
                </form>
            </div>
        </div>
        <div class="img_direita" id="img_direita"></div>
        
    </div>
</body>
</html>
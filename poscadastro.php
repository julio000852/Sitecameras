<?php
ob_start();
include ("banco.php");
include ("verificarLogin.php");

if(isset($_POST['imgPerfil']) && isset($_POST['userId']))  {
  $img = $_POST['imgPerfil'];
  $id  = $_POST['userId'];
  mysqli_query($mysqli, "UPDATE cliente SET fotoPerfil = '$img' WHERE idCliente = $id ");
  echo 'Sucesso!';
}else{

$result = mysqli_query($mysqli, "SELECT fotoPerfil, idCliente FROM cliente WHERE login = '{$_SESSION['login']}' LIMIT 1");
$res = mysqli_fetch_array($result);

?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Caxias - Ao Vivo</title>
    <link rel="stylesheet" href="./style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./bootstrap/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="./bootstrap/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.2.js"></script>

    <script type="text/javascript">
      jQuery(window).load(function($){
        atualizaRelogio();
      });
    </script>

  </head>

  <body onload="searchResults()">
    <header>
      <div class="nav">
        <a class="logo"href="#">
        <div>
        <img class="pv" src="img/cav.jpg" alt="" height="35">
        </div>
        </a>

        <div class="perfil">
            
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <div class = "image-circu ">
                <img  id="imgPerfil" src = "<?php echo $res['fotoPerfil']?>" width="40" height="40" />  
              </div>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <button style="border: none; background: white;" id="btnPerfil">
              <li class="dropdown-item">
              <input id="filePerfil" type="file" name="foto" accept="image/*"  style="display: none;">
                Alterar foto de perfil
              </li></button>
              <li><a class="dropdown-item" href="alterarSenha.php">Alterar senha</a></li>
              <li><a class="dropdown-item" href="logout.php">Sair</a></li>
            </ul>
          </div>    
      </div>
</div>
      <div class="dataehora">

      <div class="data">
      <div> Data:</div>
      <div id="data"></div>
      </div>

      <div class="hora">
      <div> Hora:</div>
      <div  id="hora"></div>   
      </div>

      <div class="clima">
      <div> Clima:</div>
      <div class="container-temp ">
        <div></div>
        </div></div>
  

  
        </div>
      </div>

      </div>
<hr/>
  <div class="tudo">
    <div class="camedesc">
      <div class="camera">
      <iframe width="640" height="360" src="https://rtsp.me/embed/Es948264/" frameborder="0" allowfullscreen></iframe>
      </div> 

      <div class="descri-video">
      <div>Caxias - Maranhao - Atual Internet - Setor de Desenvolvimento.</div>
      </div>
    </div>  
<hr/>  
    <div class="poc">
      <!--<div class="propaganda">
        
     <li><a href="#">Sua Marca aqui</a></li>
      </div>-->
      
      <div class="card">
        <div id="slider2">
            <figure>
                <a href="https://api.whatsapp.com/send?phone=5599988290047&text=Gostaria%20de%20ver%20o%20card%C3%A1pio!!%20">
                <img src="img/pizza.jpg" alt="">
                </a>

                <a href="https://api.whatsapp.com/send?phone=5599988290047&text=Quero%20divulgar%20minha%20loja!!">
                <img src="img/da.jpg" alt="">
                </a>

                <a href="https://www.atltelecom.com.br/">
                <img src="img/ai.png" alt="">
                </a>

                <a href="#">
                <img src="img/pizza.jpg" alt="">
                </a>

                <a href="#">
                <img src="img/da.jpg" alt="">
                </a>
  
            </figure>
        </div>
      </div>

      <a class="bt-qdmj" href="https://api.whatsapp.com/send?phone=5599988290047&text=Quero%20divulgar%20minha%20loja!!">
      <button class="bt">Quero divulgar minha loja aqui!!
      </button>
      </a>


      <div class="opc-cam">
      <div class="outras">
      <div>Outras Cameras em Caxias MA</div>
      </div>
<hr/>  
      <div class="thumb" id="thumb">
          <a href="#">
            <figure>
                <img src="img/pa.jpg" alt="">
                <div class="descri-video">Caxias - Maranhao - Parque Ambiental.</div>
            </figure>
          </a>
          <a href="#">
            <figure>
                <img src="img/pc.jpg" alt="">
                <div class="descri-video">Caxias - Maranhao - Praça da chapada.</div>
            </figure>
          </a>
          </div>
        </div>
    </div>  
  </div>
      <div class="rdp">
      
      <img class="logo-rdp"src="img/cav.jpg" alt="" height="35">
      <div>Contato: (99)9 9999-9999</div>
      <div>© 2021 - Desenvolvedores Atual</div>
      </div>
    </header>
  
     
    
    <script src="caovivo.js"></script>
  </body>
    <script>

 //IMAGE-Perfil// 
var btnPerfil = document.getElementById("btnPerfil");
var filePerfil = document.getElementById("filePerfil");
var fotoPerfil = document.getElementById("imgPerfil");
var meuUsuario = <?php echo $res['idCliente']; ?>

btnPerfil.addEventListener('click', () => {
  filePerfil.click();
});

filePerfil.addEventListener('change',() => {
  let reader = new FileReader();
    reader.onload = () =>{
    fotoPerfil.src = reader.result;
    $.post("poscadastro.php",{imgPerfil: reader.result,userId:meuUsuario},function(data, status){
      if(status != 'success'){
        console.log("Data: " + data + "\nStatus: " + status);
        alert("Ocorreu algo inesperado, por favor tente novamente, e caso percista, entre em contado com o administrador.");
      }else{
        alert("Sucesso ao alterar foto de perfil!");
      }
      
    });
  }
  reader.readAsDataURL(filePerfil.files[0]);
});
     

    function atualizaRelogio(){ 
      var momentoAtual = new Date();
      
      var vhora = momentoAtual.getHours();
      var vminuto = momentoAtual.getMinutes();
      var vsegundo = momentoAtual.getSeconds();
      
      var vdia = momentoAtual.getDate();
      var vmes = momentoAtual.getMonth() + 1;
      var vano = momentoAtual.getFullYear();
      
      if (vdia < 10){ vdia = "0" + vdia;}
      if (vmes < 10){ vmes = "0" + vmes;}
      if (vhora < 10){ vhora = "0" + vhora;}
      if (vminuto < 10){ vminuto = "0" + vminuto;}
      if (vsegundo < 10){ vsegundo = "0" + vsegundo;}

      dataFormat = vdia + " / " + vmes + " / " + vano;
      horaFormat = vhora + " : " + vminuto + " : " + vsegundo;

      document.getElementById("data").innerHTML = dataFormat;
      document.getElementById("hora").innerHTML = horaFormat;

      setTimeout("atualizaRelogio()",1000);
    }
  </script>
</html>

<?php 
}
?>
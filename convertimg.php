<?php 
include("banco.php");
$result = mysqli_query($mysqli, "SELECT fotoPerfil FROM cliente WHERE idCliente = 1");
$res = mysqli_fetch_array($result);

if (isset($_POST['sand'])){
	/*$imageBase641 = base64_encode(file_get_contents($img));*/
	$extensao=$_FILES['tmp_name'];
	var_dump($_FILES);
	echo $extensao;

}


$path = './img/perfil.jpg';

$imageBase64 = base64_encode(file_get_contents($path));



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>sdfsdf</title>
</head>
<body>

<img src="data:image/jpeg;base64, <?php echo $imageBase64 ?>">


<form action="convertimg.php" method="post" enctype="multipart/form-data">
	<input type="file" type="submit" name="pic">
	<input type="submit" name="sand">
</form>
</body>
</html>
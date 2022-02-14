<?php 
include("banco.php");
$result = mysqli_query($mysqli, "SELECT fotoPerfil FROM cliente WHERE idCliente = 1");
$res = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>sdfsdf</title>
</head>
<body>
<img src="<?php echo $res['fotoPerfil']?>">
</body>
</html>
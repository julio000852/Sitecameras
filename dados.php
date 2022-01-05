<?php
include_once("banco.php");
$result = mysqli_query($mysqli, "SELECT * FROM cliente ORDER BY idCliente DESC");
?>


<!DOCTYPE html>
<html>
<head>  
    <title>Homepage</title>
</head>

<body>
    <table width='80%' border=0>

    <tr bgcolor='#CCCCCC'>
        <td>id</td>
        <td>Nome</td>
        <td>Sobrenome</td>
        <td>login</td>
        <td>senha</td>
        <td>email</td>
    </tr>
    <?php 
    
    while($res = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$res['idCliente']."</td>";
        echo "<td>".$res['nome']."</td>";
        echo "<td>".$res['sobrenome']."</td>";
        echo "<td>".$res['login']."</td>";  
        echo "<td>".$res['senha']."</td>";
        echo "<td>".$res['email']."</td>";
        echo "</tr>";
    }
    ?>
    </table>
</body>
</html>
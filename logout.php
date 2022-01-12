<?php  
session_start();
session_destroy();
header('Location: loginconta.php');
exit();
?>
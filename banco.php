<?php

$databaseHost = 'localhost';
$databaseName = 'bancositecan';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName) or die('Não foi possivel conectar-se');

?>
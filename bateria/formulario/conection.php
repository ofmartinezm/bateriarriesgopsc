<?php
$dsn = 'mysql:host=localhost;dbname=riesgops_bateria'; //Data source Name
$username = 'riesgops_admin';
$password = 'Cangrej076';
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES utf8');

 $conn = new PDO($dsn, $username, $password,$options);
 ?>
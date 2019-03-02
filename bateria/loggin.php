<?php
session_start();
if(!empty($_SESSION['username'])) {
header('location:plan.php');
}
require 'conection.php';


              

/* $listado=$dataBase->consultaPreguntasForm(1); */


if(isset($_POST['login'])) {

$user = $_POST['numero_documento'];
$pass = $_POST['nit'];

if(empty($user) || empty($pass)) {
$message = 'All field are required';
} else {
$query = $conn->prepare("SELECT numero_documento, nit,expedicion FROM vusuarios WHERE 
numero_documento=? AND nit=? ");
$query->execute(array($user,$pass));
$row = $query->fetch(PDO::FETCH_BOTH);

if($query->rowCount() > 0) {
  $_SESSION['username'] = $user;
  header('location:plan.php');
} else {
  $message = "Usuario/Contraseña inválidos!!!!!";
}


}

}
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
if(isset($message)) {
echo $message;
}
?>
<form action="#" method="post">
Documento: <input type="text" name="numero_documento" placeholder="username"> 
 <br/><br/>
Nit: <input type="password" name="nit" placeholder="password">

<br/><br/>
<input type="submit" name="login" value="Login">

</form>

</html>
logout.php

<?php
session_start();
session_destroy();
header('location: loggin.php');
?>
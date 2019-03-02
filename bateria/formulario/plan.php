<?php
session_start();

if(isset($_SESSION['numero_documento'])) {
echo "Welcome <strong>".$_SESSION['expedicion']."</strong><br/>";
} else {
header('location: loggin.php');
}

?>
<a href="logout.php">Logout</a>
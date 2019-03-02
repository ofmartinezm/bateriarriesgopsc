<?php
session_start();

if(isset($_SESSION['numero_documento'])) {
echo "Welcome <strong>".$_SESSION['numero_documento']."</strong><br/>";
} else {
header('location: loggin.php');
}

?>
<a href="logout.php">Logout</a>
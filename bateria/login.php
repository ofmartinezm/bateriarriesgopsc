<?php  
 session_start();  
include("database.php");
 try  
 {   
     
    /* 
        $connect = new PDO("mysql:host=$hostBD; dbname=$dataBD", $userBD, $passBD);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   */
      $bateriaDetalle = new Database();
              

      
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["documento"]) || empty($_POST["anyoDto"])||empty($_POST["empresa"]) )  
           {  
                $message = '<label>Todos los campos son requeridos</label>';  
           }  
           else  
           {  
                /* $query = "SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password";   */
                $usuarios=$bateriaDetalle->consultaUsuario($usuario, $nit, $expedicion));

                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'usuario'     =>     $_POST["usuario"],  
                          'password'     =>     $_POST["password"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                     $_SESSION["usuario"] = $_POST["usuario"];  
                  
                     header("location:PanelControl.php");  
                }  
                else  
                {  
                     $message = '<label>Datos incorrectos</label>';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>  
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="favicon.ico">
<title>Descargar login con PHP PDO y MySQL - BaulPHP</title>

<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/sticky-footer-navbar.css" rel="stylesheet">
</head>

<body>
<header> 
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"> <a class="navbar-brand" href="#">BaulPHP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active"> <a class="nav-link" href="IniciarSesion.php">Inicio <span class="sr-only">(current)</span></a> </li>
      </ul>
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Busqueda</button>
      </form>
    </div>
  </nav>
</header>

<!-- Begin page content -->

<div class="container">
  <h3 class="mt-5">Descargar login con PHP PDO y MySQL</h3>
  <hr>
  <div class="row">
    <div class="col-12 col-md-6"> 
      <!-- Contenido -->
       
           <br />  
                <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
             
                <form method="post">  
                <div class="form-group">
    <label for="Usuario">Usuario</label>
    <input type="text" name="usuario" class="form-control" placeholder="Ingrese usuario" />  
				</div>
  
                     <div class="form-group">
    <label for="Contraseña">Contraseña</label>
     <input type="password" name="password" class="form-control" placeholder="Ingrese Contraseña" />  
				</div>
                      
                     <br />  
                     <input type="submit" name="login" class="btn btn-info" value="Iniciar Sesion" />  
                </form>  
            
      <!-- Fin Contenido --> 
    </div>
  </div>
  <!-- Fin row --> 
  
</div>
<!-- Fin container -->
<footer class="footer">
  <div class="container"> <span class="text-muted">
    <p>Códigos <a href="https://www.baulphp.com/" target="_blank">BaulPHP</a></p>
    </span> </div>
</footer>
<script src="assets/jquery-1.12.4-jquery.min.js"></script> 
<script src="assets/jquery.validate.min.js"></script> 
<script src="assets/ValidarRegistro.js"></script> 
<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script> 
<script src="assets/js/vendor/popper.min.js"></script> 
<script src="dist/js/bootstrap.min.js"></script>
</body>
</html>
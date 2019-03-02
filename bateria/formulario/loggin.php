<?php
session_start();
require 'utiles.php';




if(!empty($_SESSION['username'])) {
header('location:plan.php');
}
require 'conection.php';

if(isset($_POST['login'])) {
  
$user = $_POST['numero_documento'];
$pass = $_POST['nit'];
$consentimiento = $_POST['consentimiento'];
$expedicion = $_POST['expedicion'];



if(empty($user) || empty($pass)|| empty($expedicion)) {

$errors = 'Todos los campos son Obligatorios';
} else {

if ($consentimiento!='S') {
    $errors = 'Debe Aceptar el consentimiento informado para poder continuar!!!';
}else{
  
  
        $query = $conn->prepare("SELECT numero_documento, nit,expedicion, id_persona, tipo_formulario FROM vusuarios WHERE 
        numero_documento=? AND nit=? AND expedicion=?");
        $query->execute(array($user,$pass,$expedicion));
        $row = $query->fetch(PDO::FETCH_BOTH);

        if($query->rowCount() > 0) {
        
        $_SESSION['numero_documento'] = $user;
        $_SESSION['expedicion'] = $row[2];
        $_SESSION['id_persona'] = $row[3];
        $_SESSION['tipo_formulario'] = $row[4];
       
        $errors='';

        header('location: bateria_encabezado.php');

        } else {
        $errors = "Los datos ingresados no son válidos";
        }
    }

}

}
?>

<!DOCTYPE html>
<html>
<head>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/master.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body style="margin-bottom:1%;">
<?php

?>

<?php
echo encabezado();
?>


<div class="container" style="margin-top: 2%; margin-bottom: 2%;">
<h4 class="card-title text-center mb-4 mt-1">Bienvenido Bateria Riesgo Psicosocial</h4>
        <hr>
        <p class="text-success text-center">Ingrese La información Solicitada a continuación</p>
<div class="col col-md-3"></div>

<div class="col col-md-6">
      <form  action="#" method="post" style="padding: 5%;box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);">
              
              <div class="row" style="padding-bottom:20px;">
              <label for="numero_documento">Documento:</label>
              <input type="text" class="form-control" name="numero_documento" placeholder="Numero documento"> 
              </div>
          
              <div class="row" style="padding-bottom:20px;">
                  <label for="nit">Nit:</label>
                  <input type="text" class="form-control" name="nit" placeholder="NIT empresa"> 
              </div>

              <div class="row" style="padding-bottom:20px;">
                  <label for="expedicion">Año expedición documento:</label>
                  <input type="text" class="form-control" name="expedicion" placeholder="Año expedición documento de identidad"> 
              </div>




                <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="consentimiento" name="consentimiento"value="S">
                <label class="form-check-label" for="consentimiento">Aceptación Consentimiento Informado</label>
                
                </div>

                <div class="row" style="padding-bottom:20px;">
                <span class="form-control alert-info"><a href="Consentimiento Informado.pdf" target="_blank">Documento de Consentimiento asistido</a></span>
                </div>
              <div class="row" style="padding-bottom:20px;">
                <?php if (!empty($errors)) {  echo "<span class=' alert-danger form-control text-center' role='alert' >".$errors."</span>";  }  ?>
              </div> 

              <div class="row" style="padding-bottom:20px;">
              <div class="col col-md-4"></div>
              <div class="col col-md-4">
                  <input class="btn btn-success" type="submit" name="login" value="Ingresar">
              </div>
              <div class="col col-md-4"></div>
              </div>
              
              
      </form>
</div>
<div class="col col-md-3"></div>      
        
</div>
<!-- <div class="card">
    <article class="card-body">
        <h4 class="card-title text-center mb-4 mt-1">Bienvenido Bateria Riesgo Psicosocial</h4>
        <hr>
        <p class="text-success text-center">Ingrese La información Solicitada a continuación</p>
        <form>
        <div class="form-group">
        <div class="input-group">
            
            <label for="numero_documento">Documento:</label>
            <input type="text" class="form-control" name="numero_documento" placeholder="Numero documento"> 
        </div> 
        </div> 
        <div class="form-group">
        <div class="input-group">
            <label for="nit">Nit:</label>
                  <input type="text" class="form-control" name="nit" placeholder="NIT empresa"> 
        </div> 
        </div> 
        <div class="form-group">


        <input class="btn btn-info" type="submit" name="login" value="Cargar Formulario">
        </div> 
        
        </form>
    </article>
    </div> -->


    <?php
echo footer();
?>
    </body>

</html>


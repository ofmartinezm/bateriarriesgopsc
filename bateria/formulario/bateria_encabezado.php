<?php

session_start();

require 'utiles.php';



if(isset($_SESSION['id_persona'])) {
 
  $idUsuario = $_SESSION['id_persona'];
  
  require '../database.php';

  $bateriaDetalle = new Database();

 
  
  $idBateria=0;

  $validaBateria=$bateriaDetalle->bateriaID($idUsuario);
  
   
  while ($row=mysqli_fetch_object($validaBateria)){
    
    $idBateria=$row->id;
    $fechaRegistro=$row->fecha_registro;

    $_SESSION["id_bateria"]=$idBateria;
    
  }

  

  if($idBateria == 0) {
    

   $idBateria=$bateriaDetalle->crearEncabezado($idUsuario);
    
    $validaBateria=$bateriaDetalle->bateriaID($idUsuario);

    while ($row=mysqli_fetch_object($validaBateria)){
      
      $idBateria=$row->id;
      $fechaRegistro=$row->fecha_registro;
      
    }
    
    $_SESSION["id_bateria"]=$idBateria;

  }

  
  
 /*  $_SESSION['fechaRegistro'] = $fechaRegistro; */

  $listado=$bateriaDetalle->personas($idUsuario);


  while ($row=mysqli_fetch_object($listado)){
    
    $nombres1=$row->nombre1;
    $nombres2=$row->nombre2;
    $apellido1=$row->apellido1;
    $apellido2=$row->apellido2;
    $tipoDoc=$row->tipo_documento;
    $listaTipoDoc=$bateriaDetalle->cargaReferencias('tipo_documento');
    
    $numeroDoc=$row->numero_documento;
    $fechaNac=$row->fecha_nacimiento;
    $dirRes=$row->direccion_residencia;
    $telCel=$row->telefono_celular;
    $telfijo=$row->telefono_fijo;
    $tipForm=$row->tipo_formulario;
    }
    


} /* else {
  header('location: loggin.php');
  } */
  






  if(isset($_POST['actDatPer'])){
  
  if(isset($_POST['telefonofijo'])) {
    $telefonoFijo = 0;

  }

  
  $direccion = $_POST['direccion'];
  $telefonoFijo = $_POST['telefonofijo'];
  $telCel= $_POST['telefonocel'];


  if(empty($direccion) || empty($telCel)) {

    $message = 'La direccion y el numero de telefono celular son obligatorios';


    } else {
      

      $actualizaPersona=$bateriaDetalle->updateDatPer($idUsuario, $direccion, $telCel, $telefonoFijo);
      
      
      if($actualizaPersona){
        
        $listado=$bateriaDetalle->personas($idUsuario);

        while ($row=mysqli_fetch_object($listado)){
        $nombres1=$row->nombre1;
        $nombres2=$row->nombre2;
        $apellido1=$row->apellido1;
        $apellido2=$row->apellido2;
        $tipoDoc=$row->tipo_documento;
        $listaTipoDoc=$bateriaDetalle->cargaReferencias('tipo_documento');
        
        $numeroDoc=$row->numero_documento;
        $fechaNac=$row->fecha_nacimiento;
        $dirRes=$row->direccion_residencia;
        $telCel=$row->telefono_celular;
        $telfijo=$row->telefono_fijo;
        $tipForm=$row->tipo_formulario;




        }

        $_SESSION["nombre1"]=$nombres1;
        $_SESSION["nombre2"]=$nombres2;
        $_SESSION["apellido1"]=$apellido1;
        $_SESSION["apellido2"]=$apellido2;
        $_SESSION["fecha_nacimiento"]=$fechaNac;
        
        header('location:formulario1.php');
      }else {
        echo "<script> alert('Error actualizando Datos personales '); </script>";
      }
    }
  
  }


    

?>

<!DOCTYPE html>
<html >
<head>
<?php header('Content-Type: text/html; charset=UTF-8'); ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bateria de Riesgo Psicosocial</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<link rel="stylesheet" href="../css/master.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>





<!-- <script>
var end = new Date('12/17/2100 9:30 AM');

    var _second = 1000;
    var _minute = _second * 60;
    var _hour = _minute * 60;
    var _day = _hour * 24;
    var timer;

    function showRemaining() {
        var now = new Date();
        var distance = end - now;
        if (distance < 0) {

            clearInterval(timer);
            document.getElementById('countdown').innerHTML = 'EXPIRED!';

            return;
        }
        var days = Math.floor(distance / _day);
        var hours = Math.floor((distance % _day) / _hour);
        var minutes = Math.floor((distance % _hour) / _minute);
        var seconds = Math.floor((distance % _minute) / _second);

        /* document.getElementById('countdown').innerHTML = days + ' dias, ';
        document.getElementById('countdown').innerHTML += hours + ' horas, '; */
        document.getElementById('countdown').innerHTML += minutes + ' minutos y ';
        document.getElementById('countdown').innerHTML += seconds + ' segundos'; 
    }

    timer = setInterval(showRemaining, 1000);
</script> -->


</head>
<body>

<div class="container" style= "margin-top:1%;padding: 1%;box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);" >
    <img src="../img/riesgopsicosocial.jpg" class="img-fluid" style="max-width: 100%;">
  
</div>

  <!-- http://php.net/manual/es/pdo.lastinsertid.php -->

  <div class="container" style="margin-top:1%;padding: 5%;box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);">
  <div class="table-title">
                <div class="row"> 
                    <div ><h1 class='card-title text-center mb-4 mt-1'>DATOS PERSONALES</b></h1></div>
                </div>    
                  </div>   

  <form name="encabezado" action="#" method="post">
      
      <div class="form-row form-group" style="padding-top: 15px;">

      <div class="col col-md-6">
      <label for="nombres">Nombres</label>
      <input type="text" readonly class="form-control" id="nombres" value="<?php echo $nombres1." ".$nombres2." ".$apellido1." ".$apellido2;?>" disabled>
      </div>

      <div class="col col-md-3">
      <label  for="tipodoc">Tipo Documento</label>
      <!-- <input type="text" readonly class="form-control" id="tipodoc" value="</*?php echo $tipoDoc;?>" disabled> -->
      <?php
      echo('<select class="form-control name="tipodoc" id="tipodoc" disabled>');
                                
                                while ($row=mysqli_fetch_object($listaTipoDoc)){
                                    
                                    $codigo=$row->codigo;
                                    $descripcion=$row->descripcion;

                                    echo( '<option value="'.$codigo.'"' );

                                    if ($codigo === $tipoDoc) { 
                                      echo  'selected="selected"';
                                    } 
                                    
                                    echo (' >'.$descripcion.'</option>' );
                                }

      echo('</select>');

      ?>
      </div>
      <div class="col col-md-3">
      <label  for="numerodoc">Numero Documento</label>
      <input type="text"  class="form-control" id="numerodoc" value="<?php echo $numeroDoc;?>" disabled>
      </div>


    </div>

    <div class="form-row form-group" style="padding-top: 15px; padding-bottom: 30px;">

        <div class="col col-md-3" >
        <label for="fechanac">Fecha Nacimiento</label>
        <input type="date"  class="form-control" id="fechanac" value="<?php echo $fechaNac;?>" disabled>
        </div>
      
        <div class="col col-md-3">
        <label  for="direccion">Direccion</label>
        <input type="text"  class="form-control" name="direccion" id="direccion" value="<?php echo $dirRes;?>" >
        </div>
        <div class="col col-md-3">
        <label  for="telefonocel">Telefono Celular</label>
        <input type="text"  class="form-control"  name="telefonocel" id="telefonocel" value="<?php echo $telCel;?>" >
        </div>
        <div class="col col-md-3">
            <label  for="telefonofijo">Telefono Fijo</label>
            <input type="text"  class="form-control"  name="telefonofijo" id="telefonofijo" value="<?php echo $telfijo;?>" >
        </div>
     
    </div>
    <br>
    <div class="row"  style="margin-top: 15px;">
                    <h3 style='text-align:justify'>Por favor verifique que sus datos personales sean correctos</h3>
                    
                    <p style='text-align:justify'>Diligencie los datos que estan sin llenar para poder continuar con el proceso, si alguno de sus datos personales esta mal, por favor comuniqueselo a la persona encargada en la empresa de SGSTT, para hacer las correcciones respectivas</p>
                   
                    
    </div>
    <div class="row alert-success "  style="margin-top: 15px;">
    <div class="col col-md-8 " ><p >Recuerde que a partir de este momento dispone de 60 minutos para diligenciar todos los formularios.</p></div>
    <div class="col col-md-4" ><label  for="fechaRegistro">Fecha Inicio Registro</label>
            <input type="text"  class="form-control" id="fechaRegistro" value="<?php echo $fechaRegistro;?>" disabled ></p></div>
    </div>


        
            
       

      <div class="form-row  align-items-center" style="padding-top: 5px;">
        <div class="col col-md-4">
        
            
        </div>



        <div class="col col-md-4 " style="padding-top: 25px;">
        
          
          <input type="submit" name="actDatPer" class="btn btn-info add-new"   value="Ficha Datos Generales">
          
        </div>
        <div class="col col-md-4" ></div>
        <div id="countdown"></div>
       </div>
      
    </form>
    
  
  </div>



  <?php
echo footer();
?>  
         
</body>

</html>                            
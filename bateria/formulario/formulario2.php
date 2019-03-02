<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bateria de Riesgo Psicosocial</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



</head>



<body>


<?php
session_start();

require 'utiles.php';

echo encabezado();


require '../database.php';

$bateriaDetalle = new Database();

/* echo "<script> alert('Entra formulario1 idBateria session=".$_SESSION['nombre1'].$_SESSION['nombre2']
.$_SESSION['apellido1'].$_SESSION['apellido2'].$_SESSION['fecha_nacimiento']."' ); </script>"; */

$nombre1=$_SESSION['nombre1'];
$nombre2=$_SESSION['nombre2'];
$apellido1=$_SESSION['apellido1'];
$apellido2=$_SESSION['apellido2'];
$fecha_nacimiento=$_SESSION['fecha_nacimiento'];

$contadorBateria=0;


if(isset($_SESSION['id_bateria'])) {
   

$id_bateria=$_SESSION['id_bateria'];

$_SESSION['formulario']=6;

$formulario= $_SESSION['formulario'];

$detalleBateria=$bateriaDetalle->validaDetalle($id_bateria, $formulario);


while ($row=mysqli_fetch_object($detalleBateria)){
$contadorBateria=$row->detalle;

}


if ($contadorBateria < 1){
    $insertaBateriad= $bateriaDetalle->insertaDetalleB($id_bateria, $formulario);

}

$cargaBateriad =  $bateriaDetalle->cargaBateriad($id_bateria, $formulario);
}

if(isset($_POST['actForm1'])){

    $min_pregunta= $bateriaDetalle->minPreguntaForm($formulario);
    $row=mysqli_fetch_object($min_pregunta);
    $minPregunta=$row->preguntas;

    $max_preguntas= $bateriaDetalle->maxPreguntaForm($formulario);
    $row=mysqli_fetch_object($max_preguntas);
    $maxPreguntas=$row->preguntas;

    for ($i=$minPregunta; $i <= $maxPreguntas ; $i++) { 
        

        

        $respuesta=$_POST[$i];

       /*  echo "<script> alert('variables post id_bateria=".$id_bateria."pregunta=".$pregunta."  -- respuesta= ".$respuesta."' ); </script>"; */
        
        $updDetalle=$bateriaDetalle->actualizaDetalleB($id_bateria, $i, $respuesta);
        
        if(!$updDetalle){
            echo "<script> alert('No se pudo actualizar el formulario' ); </script>";
        }
    }
    
    header('location: formulario3.php');
        
    }
 



?>

<div class="container" style="margin-top:2%;padding: 5%;box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);">
       
<div class="table-wrapper">
            
        
        <div class="table-title">
                
            
            <div class="row">
                    <div ><h1 class='card-title text-center mb-4 mt-1'>CUESTIONARIO DE FACTORES PSICOSOCIALES EXTRALABORALES</b></h1></div>
            </div>    
                  
            <div class="row alert bg-primary" style="margin-bottom:20px;box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);">
                
                
                <p style='text-align:justify'>Este cuestionario de factores psicosociales busca con ocer su opinión sobre algunos
                    aspectos de su <strong><u>vida familiar y personal</u></strong>.</p>

                <p style='text-align:justify'>Le agradecemos que usted se sirva contestar a las siguientes preguntas de forma
                    absolutamente sincera. Las respuestas que usted de al cuestionario, no son ni buenas, ni
                    malas, lo importante es que reflejen su manera de pensar sobre las condiciones de su vida
                    familiar y personal.</p>
                <p style='text-align:justify'>Sus respuestas serán manejadas de forma absolutamente confidencial.
                    Es muy importante que usted responda a todas las preguntas y en cada una de ellas marque
                    una sola respuesta.</p>
                <p style='text-align:justify'>Por favor lea cuidadosamente cada pregunta y seleccione la opción que mejor se ajuste a 
                    su modo de pensar.</p>
            </div>

        </div>


        <form action="#" name='form1' method='post'>
        <div class="row">
    <div ><h4 class="card-title text-center mb-4 mt-1">Las siguientes preguntas están relacionadas con varias condiciones de la zona donde usted vive:</h4></div>
     </div>
        <table class="table table-striped table-hover">
        
        <thead class=""> 
            <tr>
                   <th class="text-center"style='width:10%;' >#</th>
                   <th class="text-center"style='width:60%;'>PREGUNTA</th>
                  <th class="text-center"style='width:30%;'>RESPUESTA</th>
            </tr>    
            </thead>
            
            
                <tbody>
                    
                    <?php 
                        
                        while ($row=mysqli_fetch_object($cargaBateriad)){
                           
                            $idPregunta=$row->id;
                            $idFormulario=$row->id_formulario;
                            $ordenPregunta=$row->orden;
                            $tipoReferencia=$row->tipo_referencia;
                            $descripcion=$row->descripcion;
                            $respuestaF=$row->respuesta;
                            $listaReferencia=$bateriaDetalle->cargaReferencias($tipoReferencia);
                            
                            if ($ordenPregunta == 13) {

                                echo (imprimeEntreFilas('Las siguientes preguntas están relacionadas con su vida fuera del trabajo:'));
                            }
                            
                    ?>
                        <tr >
                            <td style='width:10%;' ><?php echo $ordenPregunta;?></td>
                            <td style='width:60%;' ><?php echo ($descripcion);?></td>

                            <td style='width:30%;' >
                                <?php 
                                $varRespuesta='';
                                    if($descripcion =='Nombre 1'){
                                        $varRespuesta='value="'.$nombre1.'"  ';
                                    }elseif($descripcion =='Nombre 2'){
                                        $varRespuesta='value="'.$nombre2.'"  ';
                                    }elseif($descripcion =='Apellido 1'){
                                        $varRespuesta='value="'.$apellido1.'"  ';
                                    }elseif($descripcion =='Apellido 2'){
                                        $varRespuesta='value="'.$apellido2.'"  ';
                                    }elseif($descripcion =='Fecha de nacimiento'){
                                        $varRespuesta='value="'.$fecha_nacimiento.'" ';
                                    }else{
                                        $varRespuesta='value="'.$respuestaF.'" ';
                                    }
                                    
                                    if($tipoReferencia=='texto_libre' ){
                                        echo ('<input class="form-control" name="'.$idPregunta.'"  type="text"  required '.$varRespuesta.'>');
                                    }else if ($tipoReferencia=='fecha'){
                                        echo ('<input class="form-control" name="'.$idPregunta.'"  type="date" required '.$varRespuesta.' >');

                                    }else if ($tipoReferencia=='numero'){
                                        echo ('<input class="form-control" name="'.$idPregunta.'"  type="number" required '.$varRespuesta.'>');
                                    }
                                    else {
                                
                                    echo('<select class="form-control" name="'.$idPregunta.'"  required>');
                                    echo( '<option value="" ></option>' );
                                    while ($row=mysqli_fetch_object($listaReferencia)){
                                        $codigo=$row->codigo;
                                        $descripcion=$row->descripcion;
                                        $seleccionado='';
                                        
                                        if($codigo==$respuestaF){
                                            $seleccionado=' selected';

                                        }
                                        

                                        echo( '<option value="'.$codigo.'" '.$seleccionado.'>'.$descripcion.'</option>' );
                                    }
                                    echo('</select>');
                                }
                                ?>  
                            </td>
                        
                        
                        </tr>	
                    
                        
                        
                       
                        <?php
                        }
   ?>
                             
                </tbody>
             
                    
             
   </table>
   
    
   
   <div class="container">

   <input type="submit" name="actForm1" class="btn btn-success"   value="EVALUACIÓN DEL ESTRÉS">
    </div>
   </form>
           
</div>


</body>
</html>   
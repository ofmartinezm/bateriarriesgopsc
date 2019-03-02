<?php header('Content-Type: text/html; charset=UTF-8'); ?>
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
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div ><h1 style='text-align:center'>FICHA DE DATOSGENERALES</b></h1></div>
                </div>    
                    
                      
                
                <div class="row">
                    <h3 style='text-align:justify'>Las siguientes son algunas preguntas que se refieren a informacón general de usted 
                    o su ocupación.</h3>
                    <br>
                    <p style='text-align:justify'>Por favor seleccione la respuesta o si dado el caso digite el dato solcitado en la casilla correspondiente</p>
                </div>

            </div>

            <table class=" table table-wrapper table-sm table-bordered table-hover">
                <thead>
                    <tr>
                        <th style='width:10%;' >#</th>
                        <th style='width:45%;'>Pregunta</th>
                        <th style='width:45%;'>Respuesta</th>
                    </tr>
                </thead>
                
    
                <?php 
               
				include ('database.php');
                $bateriaDetalle = new Database();
              

                $listado=$bateriaDetalle->consultaPreguntasForm(1);
                
               

                /*arreglar acentos  
                https://xaviesteve.com/354/acentos-y-enes-aparecen-mal-a%C2%B1-en-php-con-mysql-utf-8-iso-8859-1/ */
                
                ?>

                <tbody>
                
                <?php 
                    
					while ($row=mysqli_fetch_object($listado)){
						$idPregunta=$row->id;
						$idFormulario=$row->id_formulario;
                        $ordenPregunta=$row->orden;
                        $tipoReferencia=$row->tipo_referencia;
                        $descripcion=$row->descripcion;
                        $listaReferencia=$bateriaDetalle->cargaReferencias($tipoReferencia);
						
				?>
					<tr>
                        <td style='width:10%;' ><?php echo $ordenPregunta;?></td>
                        <td style='width:45%;' ><?php echo ($descripcion);?></td>

                        <td style='width:45%;' >
                        <?php 
                            if($tipoReferencia=='texto_libre' ){
                                echo ('<input class="form-control" name="respuesta" type="text">');
                            }else if ($tipoReferencia=='fecha'){
                                echo ('<input class="form-control name="respuesta" type="date">');

                            }else if ($tipoReferencia=='numero'){
                                echo ('<input class="form-control name="respuesta" type="number">');
                            }
                            else {
                        
                            echo('<select class="form-control name="respuesta">');
                            
                            while ($row=mysqli_fetch_object($listaReferencia)){
                                $codigo=$row->codigo;
                                $descripcion=$row->descripcion;
                                echo( '<option value="'.$codigo.'">'.$descripcion.'</option>' );
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


                  
                          
                </tbody>
                
                </table>
            <div class="col-sm-4">
                        <a href="create.php" class="btn btn-info add-new"> <i class="fa fa-angle-double-right"></i> Siguiente Formulario <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
        </div>
    </div>     
</body>
</html>                            -
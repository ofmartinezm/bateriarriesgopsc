<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRUD con PHP usando Programación Orientada a Objetos</title>
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
                    <div class="col-sm-8"><h2>Listado de  <b>Clientes</b></h2></div>
                    <div class="col-sm-4">
                        <a href="create.php" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar cliente</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id Bateria</th>
                        <th>Id Pregunta</th>
                        <th>Orden Pregunta</th>
						<th>Numero Formulario</th>
                        <th>Respuesta</th>
                    </tr>
                </thead>
                
                <?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
                <?php 
                $this->pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
				include ('database.php');
				$bateriaDetalle = new Database();
                $listado=$bateriaDetalle->read();
                echo('<p>Cargo la BD sin problema!!!!</p>')
				?>

<?php 
                    $ordenPregunta=0;
					while ($row=mysqli_fetch_object($listado)){
						$idBateria=$row->id_bateria;
						/* $idPregunta=$row->id_pregunta." ".$row->apellidos; */
                        $idPregunta=$row->id_pregunta
                        $ordenPregunta=$ordenPregunta+1;
						$numeroFormulario='numero formulario';
						$respuesta=$row->respuesta;
				?>
                    
                  
                          
                </tbody>
            </table>
        </div>
    </div>     
</body>
</html>                            
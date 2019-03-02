<?php

	class Database{
		private $con;
		private $dbhost="localhost";
		private $dbuser="riesgops_admin";
		private $dbpass="Cangrej076";
		private $dbname="riesgops_bateria";
		function __construct(){
			$this->connect_db();
		}
		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			mysqli_set_charset($this->con,"utf8");
			
 			
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
			/* $options = array(PDO::MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES utf8'); */

		}
		
		public function sanitize($var){
			$return = mysqli_real_escape_string($this->con, $var);
			return $return;
		}
		public function create($nombres,$apellidos,$telefono,$direccion,$correo_electronico){
			$sql = "INSERT INTO clientes (nombres, apellidos, telefono, direccion, correo_electronico) VALUES ('$nombres', '$apellidos', '$telefono', '$direccion', '$correo_electronico')";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

		public function crearEncabezado($id){
			
			$sql = "INSERT INTO bateria_encabezado(id_persona) VALUES  ($id)";
			$res = mysqli_query($this->con, $sql);
					if($res){
						$lastId = mysqli_insert_id($this->con);
						return $lastId;
					}else{
						return 0;
					}
		}


		public function read(){
			$sql = "SELECT * FROM bateria_detalle ";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		public function bateriaID($id){
			$sql = "SELECT * FROM bateria_encabezado where id_persona=$id";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}


		public function updateDatPer($idPersona, $direccion, $telCel, $telFijo){
			$sql = "UPDATE personas SET 
				direccion_residencia='$direccion', 
				telefono_celular=$telCel,
				telefono_fijo=$telFijo
				WHERE id=$idPersona";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		public function personas($id){
			$sql = "SELECT * FROM personas where id=$id";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		public function consultaPreguntasForm($id){
			$sql = "SELECT * FROM VpreguntaForm where id_formulario=$id";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		public function cargaReferencias($estado){
			$sql = "SELECT codigo,descripcion FROM codigos_referencia WHERE tipo_referencia='$estado'";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		public function consultaUsuario($documento, $nit, $expedicion){
			$sql = "SELECT count(*) FROM vusuarios
			WHERE numero_documento=$documento
			 and EXPEDICION=$expedicion
			 and nit=$nit";
			 
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		
		public function validaDetalle($id_bateria, $id_formulario){
			$sql = "SELECT count(*) detalle FROM bateria_detalle WHERE id_bateria=$id_bateria and id_formulario=$id_formulario ";
			$res = mysqli_query($this->con, $sql);
			return $res;
			
		}
		
		
		public function cargaBateriad($id_bateria, $id_formulario){
			$sql = "SELECT b.id_bateria, b.respuesta, p.id ,p.descripcion,p.id_formulario ,p.orden ,p.tipo_referencia 
						,f.nombre_formulario , f.orden_formulario 
							from bateria_detalle b join preguntas p on b.id_pregunta=p.id 
							join formularios f on f.id = p.id_formulario 
							where b.id_bateria=$id_bateria and b.id_formulario=$id_formulario  order by f.orden_formulario , p.orden";

			$res = mysqli_query($this->con, $sql);
			return $res;

		}

		public function insertaDetalleB($id_bateria, $formulario){

			$sql="INSERT INTO bateria_detalle(id_bateria, id_pregunta, id_formulario) 
			select $id_bateria, id, $formulario from preguntas where id_formulario= $formulario order by orden";
			$res=mysqli_query($this->con, $sql);
			return $res;


		}

		public function actualizaDetalleB($id_bateria, $id_pregunta, $respuesta){
			$sql="UPDATE bateria_detalle SET respuesta='$respuesta'  
					WHERE id_bateria=$id_bateria 
						AND  id_pregunta=$id_pregunta";
			$res=mysqli_query($this->con, $sql);
			return $res;


		}

		public function maxPreguntaForm($id){
			$sql="SELECT MAX(ID) preguntas FROM preguntas
			WHERE id_formulario=$id";
			$res=mysqli_query($this->con, $sql);
			return $res;
		}

		public function minPreguntaForm($id){
			$sql="SELECT MIN(ID) preguntas FROM preguntas
			WHERE id_formulario=$id";
			$res=mysqli_query($this->con, $sql);
			return $res;
		}

		public function update($nombres,$apellidos,$telefono,$direccion,$correo_electronico, $id){
			$sql = "UPDATE clientes SET nombres='$nombres', apellidos='$apellidos', telefono='$telefono', direccion='$direccion', correo_electronico='$correo_electronico' WHERE id=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function delete($id){
			$sql = "DELETE FROM clientes WHERE id=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
	}
	
	

?>	


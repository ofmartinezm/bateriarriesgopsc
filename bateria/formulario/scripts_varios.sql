solución errores acentos y otros caracteres especiales
// Change character set to utf8
mysqli_set_charset($con,"utf8");
http://www.oscarperez.es/problemas-con-las-enes-acentos-y-demas-caracteres-cuando-usas-mysql-y-php/




Al crear la base de datos MySQL, asegúrate que los campos string y demás esten en utf8_spanish_ci y el cotejamiento de las tablas en utf_unicode_ci

  select b.id_bateria, b.respuesta, p.id ,p.descripcion,p.id_formulario 
  ,p.orden ,p.tipo_referencia ,f.nombre_formulario ,
  f.orden_formulario 
  from bateria_detalle b join preguntas p 
   on b.id_pregunta=p.id_pregunta
  
  preguntas p join formularios f 
  on p.id_formulario = f.id 
   join bateria_detalle b on b.id_pregunta=p.id_pregunta  order by
   f.orden_formulario,p.orden;

   select count(*) from bateria_detalle where id_bateria=1


   INSERT INTO bateria_detalle(id_bateria, id_pregunta) 
select 3 , id from preguntas where id_formulario=1 order by orden;


validaDetalle($id_bateria, $id_formulario);

cargaBateriad($id_bateria, $id_formulario);


select P.numero_documento AS numero_documento,P.id AS id_persona,year(P.fecha_exp_documento) AS EXPEDICION,E.nit AS nit, p.tipo_formulario AS tipo_formulario  from (riesgops_bateria.personas P join riesgops_bateria.empresas E on((P.codigo_empresa = E.nit))) where (P.tipo_formulario in ('A','B'))

<?php
function imprimeEntreFilas($texto){

    return ' </tr>	 </tbody> </table>
    <hr>
    <div class="row">
    <div ><h4 class="card-title text-center mb-4 mt-1"> '.$texto.'</h4></div>
     </div>
    <table class="table table-striped table-hover">
     <thead class="">
         <tr>
             <th class="text-center"style="width:10%;" >#</th>
             <th class="text-center"style="width:60%;">PREGUNTA</th>
             <th class="text-center"style="width:30%;">RESPUESTA</th>
         </tr>
         </thead>
      <tbody>';

};

   ?>
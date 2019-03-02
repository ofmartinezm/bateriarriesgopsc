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



function encabezado(){
return '<div class="container" style= "margin-top:1%;padding: 1%;box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);" >
    <img src="../img/riesgopsicosocial.jpg" class="img-fluid" style="max-width: 100%;">
  
</div>';
};


function footer (){
    return '
    <div class="footer">
     <div class="container">
    <div class="row ">
                <div class="col-lg-auto justify-content-center col-md-5"><a href="mailto:andrea.martinez@riesgopsicosocialcolombia.com.co"> Psc. <span>Andrea Martinez Masmela</span></a>          </div>    

                <div class="col-lg-auto justify-content-center col-md-3">Derechos reservados </div>    
                
                <div class="col-lg-auto justify-content-center col-md-4">

                       <a href="https://www.xiontech.co" target="_blank"> Powered by Xiontech Bogota/Colombia 2019</a>

                  </div>
            </div>
              </div>
    </div>
    ';

};

   ?>
<?php

 require_once("Include/DB.php");
 require_once("Include/Functions.php");
 VerificareLogare();
?>




<?php require_once("Include/header.php");?>


   <div class="col-sm-10">
   	<h1 class="text-center">Alerte coloana administrativa</h1>
   	 	<div><?php echo Message();?>

   	</div>

<div class="row paddB">
      	<div class="col-sm-3">

                 <a href="AlerteFMcolAdm.php">
			<span class="btn btn-info btn-block">Alerte fisa medicala</span>
			</a>
		</div>


    <div class="col-sm-3">

                 <a href="AlerteCIcolAdm.php">
      <span class="btn btn-info btn-block">Alerte carte identitate</span>
      </a>
    </div>



      	<div class="col-sm-3">

            <a href="AlerteAPcolAdm.php">
			<span class="btn btn-info btn-block">Alerte aviz psihologic</span>
			</a>

</div>




      	<div class="col-sm-3">
    <a href="AlerteAcolAdm.php">
			<span class="btn btn-info btn-block">Alerte atestat CE</span>
			</a>
</div>

</div>
<div class="row paddB">

  <div class="col-sm-3">
 <a href="AlerteADEcolAdm.php">
      <span class="btn btn-info btn-block">Alerte atestat DE</span>
      </a>
  
</div>

      	<div class="col-sm-3">
    <a href="AlertePcolAdm.php">
			<span class="btn btn-info btn-block">Alerte permis BE</span>
			</a>
</div>

      	<div class="col-sm-3">
    <a href="AlertePCEcolAdm.php">
			<span class="btn btn-info btn-block">Alerte permis CE</span>
			</a>
</div>
      	<div class="col-sm-3">
    <a href="AlertePDEcolAdm.php">
			<span class="btn btn-info btn-block">Alerte permis DE</span>
			</a>
</div>

  
 

</div>
</body>
</html>

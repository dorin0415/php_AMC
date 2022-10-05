<?php

 require_once("Include/DB.php");
 require_once("Include/Functions.php");
 VerificareLogare();
?>




<?php require_once("Include/header.php");?>


   <div class="col-sm-10">
   	<h1 class="text-center">Alerte coloana 2</h1>
   	 	<div><?php echo Message();?>

   	</div>

<div class="row paddB">
      	<div class="col-sm-2">

                 <a href="AlerteFMcol2.php">
			<span class="btn btn-info btn-block">Alerte fisa medicala</span>
			</a>
		</div>


    <div class="col-sm-3">

                 <a href="AlerteCIcol2.php">
      <span class="btn btn-info btn-block">Alerte carte identitate</span>
      </a>
    </div>



      	<div class="col-sm-3">

            <a href="AlerteAPcol2.php">
			<span class="btn btn-info btn-block">Alerte aviz psihologic</span>
			</a>

</div>




      	<div class="col-sm-2">
    <a href="AlerteAcol2.php">
			<span class="btn btn-info btn-block">Alerte atestat</span>
			</a>
</div>



      	<div class="col-sm-2">
    <a href="AlertePcol2.php">
			<span class="btn btn-info btn-block">Alerte permis</span>
			</a>
</div>


</div>
</body>
</html>
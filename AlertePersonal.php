<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
 VerificareLogare();
?>




<?php require_once("Include/header.php");?>


   <div class="col-sm-10">
   	<h1 class="text-center" style="padding-bottom: 40px;">Alerte</h1>
   	 	<div><?php echo Message();?>

   	</div>

<div class="row">
      	<div class="col-sm-6">

                 <a href="AlertePFM.php">
			<span class="btn btn-danger btn-block">Alerte fisa medicala</span>
			</a>
		</div>




      	<div class="col-sm-6">


            <a href="AlertePAP.php">
			<span class="btn btn-danger btn-block">Alerte aviz psihologic</span>
			</a>

</div>




</div>



</body>
</html>
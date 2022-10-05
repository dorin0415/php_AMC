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
      	<div class="col-sm-3">

                 <a href="AlerteITP.php">
			<span class="btn btn-danger btn-block">Alerte ITP</span>
			</a>
		</div>




      	<div class="col-sm-3">


            <a href="AlerteAS.php">
			<span class="btn btn-danger btn-block">Alerte asigurare RCA</span>
			</a>

</div>




      	<div class="col-sm-3">
    <a href="AlerteT.php">
			<span class="btn btn-danger btn-block">Alerte tahograf</span>
			</a>
</div>



      	<div class="col-sm-3">
    <a href="AlerteR.php">
			<span class="btn btn-danger btn-block">Alerte rovigneta</span>
			</a>
</div>
</div>
<div class="row paddB">
      <div class="col-sm-3">
    <a href="AlerteCC.php">
      <span class="btn btn-danger btn-block">Alerte copie conforma</span>
      </a>
</div>



      <div class="col-sm-3">
    <a href="AlerteROTR.php">
      <span class="btn btn-danger btn-block">Alerte ROTR</span>
      </a>
</div>

     <div class="col-sm-3">
    <a href="AlerteCasco.php">
      <span class="btn btn-danger btn-block">Alerte asigurare Casco</span>
      </a>
</div>


     <div class="col-sm-3">
    <a href="AlerteCL.php">
      <span class="btn btn-danger btn-block">Alerte clasificare</span>
      </a>
</div>



</div>

<div class="row paddB">
  <div class=" col-sm-offset-3 col-sm-3">
     <a href="AlerteAB.php">
      <span class="btn btn-danger btn-block">Alerte asigurare bagaje</span>
      </a>

      
  </div>
  <div class="col-sm-3">
     <a href="AlerteI.php">
      <span class="btn btn-danger btn-block">Alerte asigurare incendii</span>
      </a>
  </div>



</div>
</body>
</html>
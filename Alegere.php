<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
 VerificareLogare();
 if (!$_SESSION['username']) {
    $_SESSION["Message"]="Alegeti datele pe care doriti sa le accesati.";
 }
 else{
 $_SESSION["Message"]="Bine ati venit,".$_SESSION['username']."!Alegeti datele pe care doriti sa le accesati.Aveti rolul de ".$_SESSION['rol'].".";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Aplicatie circulatie</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  


</head>
<body>
  <div class="text-center">
    <?php echo Message();?>
  </div>




<?php 



?>



<div class="container-fluid ">

<div class="row">


   <div class="col-sm-4">

    <div>
      <a href="AdminSoferi.php">
      <span class="btn btn-lg btn-danger btn-block">Soferi</span>
      </a>
     
    </div>  
  

  </div>
  


   <div class="col-sm-4">
    
    
    <div>
      <a href="AdminVehicule.php">
      <span class="btn btn-lg btn-danger btn-block">Vehicule</span>
      </a>
     
    </div>  
  

  </div>

   <div class="col-sm-4">

    <div>
      <a href="AdminPersonal.php">
      <span class="btn btn-lg btn-danger btn-block">Personal</span>
      </a>
     
    </div>  
  

  </div>
  
  


</div>


</div>



</body>
</html>
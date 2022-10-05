<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
 VerificareLogare();
?>

<?php
if(isset($_POST["submit"])){

        $NrColoana= mysqli_escape_string($conn,$_POST['nr']);
        $Nume= mysqli_escape_string($conn,$_POST['nume']);

	      

 
     if(empty($NrColoana)){
     	$_SESSION["Message"]="Completati toate campurile!";
     	header("Location:AdminSoferi.php");
     	exit();
     }   

 elseif(($NrColoana<1)||($NrColoana>6)){
     	$_SESSION["Message"]="Numarul coloanei trebuie sa fie in intervalul 1-6!";
     	header("Location:AdminSoferi.php");
     	exit();
     }   

     else{
      $Edit=$_GET['Edit'];	
     $sql="UPDATE soferi set Nume='$Nume',NrColoana='$NrColoana' where IdSofer='$Edit'";

 
   $retval = mysqli_query(  $conn,$sql );

   if($retval){
   		  $_SESSION["Message"]="Datele soferului $Nume au fost modificate cu succes!";
		  header("Location:AdminSoferi.php");
		  exit();
	}



     }

}

?>

<?php require_once("Include/header.php");?>


   <div class="col-sm-10">
             <?php
    if (($_SESSION['rol']=='Editor Fise Medicale') || ($_SESSION['rol']=='Editor Date Soferi')){

?>
   	<h1 class="text-center">Editare numar coloana</h1>
   	<div><?php echo Message();?>

   	</div>


<?php

$SoferId=$_GET['Edit'];

$sql="SELECT * FROM soferi where IdSofer='$SoferId' order by IdSofer desc";

$query=mysqli_query($conn,$sql);
while($Data=mysqli_fetch_assoc($query)){
	$NrColEdit=$Data['NrColoana'];
	$NumeEdit=$Data['Nume'];
}

?>


	<form action="EditareNrColoana.php?Edit=<?php echo $SoferId?>" method="post" enctype="multipart/form-data">
				<fieldset>

					<div class="form-group">
					<label for="Nume">Nume:</label>
					<input value="<?php echo $NumeEdit;?>" class="form-control" type="text" name="nume" id="Nume" placeholder="Nume">
				    </div>


					<div class="form-group">
					<label for="nr">Numar Coloana:</label>
					<input value="<?php echo $NrColEdit;?>" class="form-control" type="text" name="nr" id="nr" placeholder="nr">
				</div>



	<input class="btn btn-success btn-block" type="submit" name="submit" value="Editati numarul coloanei" >
				</fieldset>

			</form>
      <?php }
else{
  ?>
        <h1 class="text-center">Editare numar coloana</h1>
<p class="warn">Nu aveti drepturi de editare.</p>
 
  <?php
}
?>

</div>
</body>
</html>

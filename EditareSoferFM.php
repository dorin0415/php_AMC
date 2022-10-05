<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
VerificareLogare();
?>

<?php

if(isset($_POST["submit"])){
	
 	
        $Nume = mysqli_escape_string($conn,$_POST['nume']);

      	
         $AnM = mysqli_escape_string($conn,$_POST['anM']);
         $LunaM = mysqli_escape_string($conn,$_POST['lunaM']);
         $ZiM = mysqli_escape_string($conn,$_POST['ziM']);





       $xM=checkdate($LunaM,$ZiM, $AnM);

       if(!$xM){
 			$_SESSION["Message"]="Ati introdus o data gresita pentru fisa medicala a soferului $Nume!";
     			  header('Location:AdminSoferi.php');
      die;
      		}

        else{
       	$DataM = $AnM."/".$LunaM."/".$ZiM;
        }

     if(empty($Nume)){
     	$_SESSION["Message"]="Completati toate campurile!";
     	header('Location:AdminSoferi.php');
      
     }   

     else{
     $Edit=$_GET['Edit'];   
     $sql="UPDATE soferi set Nume='$Nume',DataExpFisaMed='$DataM' where IdSofer='$Edit'";

   
   $retval = mysqli_query( $conn , $sql);

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
   if ($_SESSION['rol']=='Editor Fise Medicale'){

?>
   	<h1 class="text-center">Editare fisa medicala</h1>
   	<div><?php echo Message();?>

   	</div>


<?php

  $SoferId=$_GET['Edit'];


$sql="SELECT * FROM soferi where IdSofer='$SoferId'";

$query=mysqli_query($conn,$sql);
while($Data=mysqli_fetch_assoc($query)){
	$NumeEdit=$Data['Nume'];
}

?>


	<form action="EditareSoferFM.php?Edit=<?php echo $SoferId?>" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
					<label for="Nume">Nume Sofer:</label>
					<input value="<?php echo $NumeEdit;?>" class="form-control" type="text" name="nume" id="Nume" placeholder="Nume">
				</div>


			<div class="row">
          <div class="col-sm-12">
   			<div class="form-group">
					<label for="anM">An expirare fisa medicala:</label>
					<input class="form-control" type="text" name="anM" id="anM">
				</div>
					<div class="form-group">
					<label for="lunaM">Luna expirare fisa medicala:</label>
					<input class="form-control" type="text" name="lunaM" id="lunaM">
				</div>
				<div class="form-group">
					<label for="ziM">Zi expirare fisa medicala:</label>
					<input class="form-control" type="text" name="ziM" id="ziM">
        </div>
				</div>

      </div>

	<input class="btn btn-success btn-block" type="submit" name="submit" value="Editati datele fisei medicale">
				</fieldset>

			</form>
      <?php }
else{
  ?>
        <h1 class="text-center">Editare fisa medicala</h1>
<p class="warn">Nu aveti drepturi de editare.</p>
 
  <?php
}
?>

</div>
</body>
</html>

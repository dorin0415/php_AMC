<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
VerificareLogare();
?>

<?php

if(isset($_POST["submit"])){
	
 	
        $Nume = mysqli_escape_string($conn,$_POST['nume']);

      	
         $AnCI = mysqli_escape_string($conn,$_POST['anCI']);
         $LunaCI = mysqli_escape_string($conn,$_POST['lunaCI']);
         $ZiCI = mysqli_escape_string($conn,$_POST['ziCI']);





       $xCI=checkdate($LunaCI,$ZiCI, $AnCI);

       if(!$xCI){
 			$_SESSION["Message"]="Ati introdus o data gresita pentru cartea de identitate a soferului $Nume!";
     			  header('Location:AdminSoferi.php');
      die;
      		}

        else{
       	$DataCI = $AnCI."/".$LunaCI."/".$ZiCI;
        }

     if(empty($Nume)){
     	$_SESSION["Message"]="Completati toate campurile!";
     	header('Location:AdminSoferi.php');
      
     }   

     else{
     $Edit=$_GET['Edit'];   
     $sql="UPDATE soferi set Nume='$Nume',DataExpCI='$DataCI' where IdSofer='$Edit'";

 
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
    if ($_SESSION['rol']=='Editor Date Soferi'){

?>
   	<h1 class="text-center">Editare Carte Identitate</h1>
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


	<form action="EditareSoferCI.php?Edit=<?php echo $SoferId?>" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
					<label for="Nume">Nume Sofer:</label>
					<input value="<?php echo $NumeEdit;?>" class="form-control" type="text" name="nume" id="Nume" placeholder="Nume">
				</div>


			<div class="row">
          <div class="col-sm-12">
   			<div class="form-group">
					<label for="anCI">An expirare carte identitate:</label>
					<input class="form-control" type="text" name="anCI" id="anCI">
				</div>
					<div class="form-group">
					<label for="lunaCI">Luna expirare carte identitate:</label>
					<input class="form-control" type="text" name="lunaCI" id="lunaCI">
				</div>
				<div class="form-group">
					<label for="ziCI">Zi expirare carte identitate:</label>
					<input class="form-control" type="text" name="ziCI" id="ziCI">
        </div>
				</div>

      </div>

	<input class="btn btn-success btn-block" type="submit" name="submit" value="Editati datele cartii de identitate">
				</fieldset>

			</form>
            <?php }
else{
  ?>
        <h1 class="text-center">Editare carte identitate</h1>
<p class="warn">Nu aveti drepturi de editare.</p>
 
  <?php
}
?>

</div>
</body>
</html>

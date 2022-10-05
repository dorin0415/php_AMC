<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
 VerificareLogare();
?>

<?php
if(isset($_POST["submit"])){

        $Nume = mysqli_escape_string($conn,$_POST['nume']);



         $AnAP = mysqli_escape_string($conn,$_POST['anAP']);
         $LunaAP = mysqli_escape_string($conn,$_POST['lunaAP']);
         $ZiAP = mysqli_escape_string($conn,$_POST['ziAP']);



       $xM=checkdate($LunaM,$ZiM, $AnM);

       $xAP=checkdate($LunaAP,  $ZiAP, $AnAP);

       $xA=checkdate($LunaA,  $ZiA, $AnA);

       $xP=checkdate($LunaP,  $ZiP, $AnP);



       if(!$xAP){
      $_SESSION["Message"]="Ati introdus o data gresita pentru avizulul psihologic al soferului $Nume!";
         header("Location:AdminSoferi.php");
         exit();
    }

        else{
        $DataAP = $AnAP."/".$LunaAP."/".$ZiAP;
        }




     if(empty($Nume)){
     	$_SESSION["Message"]="Completati toate campurile!";
     	header("Location:AdminSoferi.php");
     	exit();
     }   

     else{
      $Edit=$_GET['Edit'];	
     $sql="UPDATE soferi set Nume='$Nume',DataExpAvizPsiho='$DataAP' where IdSofer='$Edit'";

   
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
  require_once("Include/header.php");

  
  ?>
   	<h1 class="text-center">Editare aviz psihologic</h1>
   	<div><?php echo Message();?>

   	</div>


<?php

$SoferId=$_GET['Edit'];

$sql="SELECT * FROM soferi where IdSofer='$SoferId' order by IdSofer desc";

$query=mysqli_query($conn,$sql);
while($Data=mysqli_fetch_assoc($query)){
	$NumeEdit=$Data['Nume'];
}

?>


	<form action="EditareSoferAP.php?Edit=<?php echo $SoferId?>" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
					<label for="Nume">Nume Sofer:</label>
					<input value="<?php echo $NumeEdit;?>" class="form-control" type="text" name="nume" id="Nume" placeholder="Nume">
				</div>


			<div class="row">
  
                 <div class="col-sm-12">
        <div class="form-group">
          <label for="anAP">An expirare aviz psihologic:</label>
          <input class="form-control" type="text" name="anAP" id="anAP">
        </div>
          <div class="form-group">
          <label for="lunaAP">Luna expirare aviz psihologic:</label>
          <input class="form-control" type="text" name="lunaAP" id="lunaAP">
        </div>
        <div class="form-group">
          <label for="ziAP">Zi expirare aviz psihologic:</label>
          <input class="form-control" type="text" name="ziAP" id="ziAP">
        </div>
        </div>

      </div>

	<input class="btn btn-success btn-block" type="submit" name="submit" value="Editati datele avizului psihologic">
				</fieldset>

			</form>
			      <?php }
else{
  ?>
        <h1 class="text-center">Editare aviz psihologic</h1>
<p class="warn">Nu aveti drepturi de editare.</p>
 
  <?php
}
?>

</div>
</body>
</html>

<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
 VerificareLogare();
?>

<?php
if(isset($_POST["submit"])){

        $Nume = mysqli_escape_string($conn,$_POST['nume']);

         $AnP = mysqli_escape_string($conn,$_POST['anP']);
         $LunaP = mysqli_escape_string($conn,$_POST['lunaP']);
         $ZiP = mysqli_escape_string($conn,$_POST['ziP']);


       $xM=checkdate($LunaM,$ZiM, $AnM);

       $xAP=checkdate($LunaAP,  $ZiAP, $AnAP);

       $xA=checkdate($LunaA,  $ZiA, $AnA);

       $xP=checkdate($LunaP,  $ZiP, $AnP);

          if(!$xP){
      $_SESSION["Message"]="Ati introdus o data gresita pentru permisul soferului $Nume!";
         header("Location:AdminSoferi.php");
         exit();
    }

        else{
        $DataP = $AnP."/".$LunaP."/".$ZiP;
        } 


     if(empty($Nume)){
     	$_SESSION["Message"]="Completati toate campurile!";
     	header("Location:AdminSoferi.php");
     	exit();
     }   

     else{
      $Edit=$_GET['Edit'];	
     $sql="UPDATE soferi set Nume='$Nume',DataExpPermisDE='$DataP' where IdSofer='$Edit'";

   
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
   	<h1 class="text-center">Editare permis</h1>
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


	<form action="EditareSoferPDE.php?Edit=<?php echo $SoferId?>" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
					<label for="Nume">Nume Sofer:</label>
					<input value="<?php echo $NumeEdit;?>" class="form-control" type="text" name="nume" id="Nume" placeholder="Nume">
				</div>


			<div class="row">
 
    <div class="col-sm-12">
        <div class="form-group">
          <label for="anP">An expirare permis:</label>
          <input class="form-control" type="text" name="anP" id="anP">
        </div>
          <div class="form-group">
          <label for="lunaP">Luna expirare permis:</label>
          <input class="form-control" type="text" name="lunaP" id="lunaP">
        </div>
        <div class="form-group">
          <label for="ziP">Zi expirare permis:</label>
          <input class="form-control" type="text" name="ziP" id="ziP">
        </div>
        </div>
      </div>

	<input class="btn btn-success btn-block" type="submit" name="submit" value="Editati datele permisului" >
				</fieldset>

			</form>
      <?php }
else{
  ?>
        <h1 class="text-center">Editare permis</h1>
<p class="warn">Nu aveti drepturi de editare.</p>
 
  <?php
}
?>

</div>
</body>
</html>

<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
VerificareLogare();
?>

<?php
if(isset($_POST["submit"])){

        $NrCirculatie = mysqli_escape_string($conn,$_POST['NrCirculatie']);
        $NrROTR = mysqli_escape_string($conn,$_POST['NrROTR']);

         $AnROTR = mysqli_escape_string($conn,$_POST['anROTR']);
         $LunaROTR = mysqli_escape_string($conn,$_POST['lunaROTR']);
         $ZiROTR = mysqli_escape_string($conn,$_POST['ziROTR']);

         $xROTR=checkdate($LunaROTR,  $ZiROTR, $AnROTR);




         if(!$xROTR){
         $_SESSION["Message"]="Ati introdus o data gresita pentru ROTR ul autovehiculului cu numarul de circulatie $NrCirculatie!";
         header("Location:AdminVehicule.php");
         exit();
    }

        else{
        $DataROTR = $AnROTR."/".$LunaROTR."/".$ZiROTR;
        }

      if(empty($NrCirculatie)||empty($NrROTR)){
     	$_SESSION["Message"]="Completati toate campurile!";
     	header("Location:AdminVehicule.php");
     	exit();
     }   

     else{
      $Edit=$_GET['Edit'];	
     $sql="UPDATE autovehicule set NrCirculatie='$NrCirculatie',DataExpROTR='$DataROTR',NrROTR='$NrROTR' where IdAutovehicul='$Edit'";

   
   $retval = mysqli_query($conn, $sql );

   if($retval){
   		  $_SESSION["Message"]="Datele autovehicului cu numarul de circulatie $NrCirculatie au fost modificate cu succes!";
		  header("Location:AdminVehicule.php");
		  exit();
	}



     }

}

?>

<?php require_once("Include/header.php");?>


   <div class="col-sm-10">
                              <?php
    if ($_SESSION['rol']=='Editor Date Autovehicule'){

?>
   	<h1 class="text-center">Editare ROTR</h1>
   	<div><?php echo Message();?>

   	</div>


<?php

$VehiculId=$_GET['Edit'];

$sql="SELECT * FROM autovehicule where IdAutovehicul='$VehiculId' order by IdAutovehicul desc";

$query=mysqli_query($conn,$sql);
while($Data=mysqli_fetch_assoc($query)){
	$NrCirculatieEdit=$Data['NrCirculatie'];
  $NrROTREdit=$Data['NrROTR'];
}

?>


	<form action="EditareVehiculROTR.php?Edit=<?php echo $VehiculId ;?>" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
					<label for="NrCirculatie">Numar circulatie:</label>
					<input value="<?php echo $NrCirculatieEdit;?>" class="form-control" type="text" name="NrCirculatie" id="NrCirculatie" placeholder="NrCirculatie">
				</div>
          <div class="form-group">
          <label for="NrROTR">Numar ROTR:</label>
          <input value="<?php echo $NrROTREdit;?>" class="form-control" type="text" name="NrROTR" id="NrROTR" placeholder="NrROTR">
        </div>


			<div class="row">

                 <div class="col-sm-12">
        <div class="form-group">
          <label for="anROTR">An expirare ROTR:</label>
          <input class="form-control" type="text" name="anROTR" id="anROTR">
        </div>
          <div class="form-group">
          <label for="lunaROTR">Luna expirare ROTR:</label>
          <input class="form-control" type="text" name="lunaROTR" id="lunaROTR">
        </div>
        <div class="form-group">
          <label for="ziROTR">Zi expirare ROTR:</label>
          <input class="form-control" type="text" name="ziROTR" id="ziROTR">
        </div>
        </div>

      </div>

	<input class="btn btn-success btn-block" type="submit" name="submit" value="Editati datele pentru ROTR" >
				</fieldset>

			</form>
          <?php }
else{
  ?>
        <h1 class="text-center">Editare ROTR</h1>
<p class="warn">Nu aveti drepturi de editare.</p>
 
  <?php
}
?> 
</div>
</body>
</html>

<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
VerificareLogare();
?>

<?php
if(isset($_POST["submit"])){

        $NrCirculatie = mysqli_escape_string($conn,$_POST['NrCirculatie']);
        $CapCil = mysqli_escape_string($conn,$_POST['CapCil']);
        $LocSauTona = mysqli_escape_string($conn,$_POST['LocSauTona']);
        $Putere = mysqli_escape_string($conn,$_POST['Putere']);
        $MMA = mysqli_escape_string($conn,$_POST['MMA']);
        $SerieSasiu = mysqli_escape_string($conn,$_POST['SerieSasiu']);
        $SerieCI = mysqli_escape_string($conn,$_POST['SerieCI']);
        $SerieTalon = mysqli_escape_string($conn,$_POST['SerieTalon']);

     if(empty($NrCirculatie)){
     	$_SESSION["Message"]="Completati campul NrCirculatie!";
     	header("Location:AdminVehicule.php");
     	exit();
     }   

     else{
      $Edit=$_GET['Edit'];	
     $sql="UPDATE autovehicule set NrCirculatie='$NrCirculatie',CapCil='$CapCil',LocSauTona='$LocSauTona',Putere='$Putere',MMA='$MMA',SerieSasiu=UPPER('$SerieSasiu'),SerieTalon=UPPER('$SerieTalon'),SerieCI=UPPER('$SerieCI') where IdAutovehicul='$Edit'";

  
   $retval = mysqli_query(  $conn,$sql );

   if($retval){
   		  $_SESSION["Message"]="Datele autovehicului cu numarul de circulatie $NrCirculatie au fost modificate cu succes!";
		  header("Location:AdminVehicule.php");
		  exit();
	}
else{
	  die('Invalid query: ' . mysqli_error());
}


     }

}

?>

<?php require_once("Include/header.php");?>

   <div class="col-sm-10">
                      <?php
    if ($_SESSION['rol']=='Editor Date Autovehicule'){

?>
   	<h1 class="text-center">Editare Date Autovehicul</h1>
   	<div><?php echo Message();?>

   	</div>


<?php

$VehiculId=$_GET['Edit'];

$sql="SELECT * FROM autovehicule where IdAutovehicul='$VehiculId' order by IdAutovehicul desc";

$query=mysqli_query($conn,$sql);
while($Data=mysqli_fetch_assoc($query)){
	$NrCirculatieEdit=$Data['NrCirculatie'];
  $CapCilEdit=$Data['CapCil'];
  $LocSauTonaEdit=$Data['LocSauTona'];
  $PutereEdit=$Data['Putere'];
  $MMAEdit=$Data['MMA'];
  $SerieTalonEdit=$Data['SerieTalon'];
  $SerieSasiuEdit=$Data['SerieSasiu'];
  $SerieCIEdit=$Data['SerieCI'];


}

?>


	<form action="EditareVehiculDate.php?Edit=<?php echo $VehiculId ;?>" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
					<label for="NrCirculatie">Numar circulatie:</label>
					<input value="<?php echo $NrCirculatieEdit;?>" class="form-control" type="text" name="NrCirculatie" id="NrCirculatie" placeholder="NrCirculatie">
				</div>
          <div class="form-group">
          <label for="CapCil">Capacitate Cilindrica:</label>
          <input value="<?php echo $CapCilEdit;?>" class="form-control" type="text" name="CapCil" id="CapCil" placeholder="CapCil">
        </div>
            <div class="form-group">
          <label for="LocSauTona">Loc Sau Tona:</label>
          <input value="<?php echo $LocSauTonaEdit;?>" class="form-control" type="text" name="LocSauTona" id="LocSauTona" placeholder="LocSauTona">
        </div>

    <div class="form-group">
          <label for="Putere">Putere:</label>
          <input value="<?php echo $PutereEdit;?>" class="form-control" type="text" name="Putere" id="Putere" placeholder="Putere">
        </div>

    <div class="form-group">
          <label for="MMA">Masa maxima autorizata:</label>
          <input value="<?php echo $MMAEdit;?>" class="form-control" type="text" name="MMA" id="MMA" placeholder="MMA">
        </div>

         <div class="form-group">
          <label for="SerieSasiu">SerieSasiu:</label>
          <input value="<?php echo $SerieSasiuEdit;?>" class="form-control" type="text" name="SerieSasiu" id="SerieSasiu">
        </div>
          <div class="form-group">
          <label for="SerieCI">SerieCI:</label>
          <input value="<?php echo $SerieCIEdit;?>" class="form-control" type="text" name="SerieCI" id="SerieCI">
        </div>
        <div class="form-group">
          <label for="SerieTalon">SerieTalon:</label>
          <input value="<?php echo $SerieTalonEdit;?>" class="form-control" type="text" name="SerieTalon" id="SerieTalon">
        </div>        


	<input class="btn btn-success btn-block" type="submit" name="submit" value="Editati datele" >
				</fieldset>
				<br>

			</form>
          <?php }
else{
  ?>
        <h1 class="text-center">Editare Date Autovehicul</h1>
<p class="warn">Nu aveti drepturi de editare.</p>
 
  <?php
}
?> 
</div>	
</body>
</html>

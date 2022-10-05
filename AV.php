<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
VerificareLogare();
?>


<?php 

if(isset($_POST['submit'])) {


        $Tip = mysqli_escape_string($conn,$_POST['Tip']);
        $MarcaTip = mysqli_escape_string($conn,$_POST['MarcaTip']);



         $NrCirculatie = mysqli_escape_string($conn,$_POST['NrCirculatie']);
         $SerieSasiu = mysqli_escape_string($conn,$_POST['SerieSasiu']);
         $SerieCI = mysqli_escape_string($conn,$_POST['SerieCI']);
         $SerieTalon = mysqli_escape_string($conn,$_POST['SerieTalon']);
         $CapCil = mysqli_escape_string($conn,$_POST['CapCil']);
         $LocSauTona = mysqli_escape_string($conn,$_POST['LocSauTona']);
         $Putere = mysqli_escape_string($conn,$_POST['Putere']);
         $MMA = mysqli_escape_string($conn,$_POST['MMA']);



        if(empty($NrCirculatie)||empty($Tip)||empty($MarcaTip)){
      $_SESSION["Message"]="Campurile 'Numar Ciculatie','Tip' sau 'Marca&Model' nu sunt completate!";
      header("Location:AV.php");
      exit();
     }   


     $sqlV="SELECT * FROM autovehicule where NrCirculatie='$NrCirculatie'";
     
     $query=mysqli_query($conn,$sqlV);
     if(mysqli_num_rows($query)>=1)
       {
        $_SESSION["Message"]="Acest vehicul exista deja in baza de date!";
       }

     else{
      $sql = "INSERT INTO autovehicule ".
         "(Tip,MarcaTip,NrCirculatie,SerieSasiu,SerieCI,SerieTalon,CapCil,LocSauTona,Putere,MMA) ".
         "VALUES"."('$Tip','$MarcaTip',UPPER('$NrCirculatie'),UPPER('$SerieSasiu'),UPPER('$SerieCI'),UPPER('$SerieTalon'),'$CapCil','$LocSauTona','$Putere','$MMA')";

    
      $retval = mysqli_query( $conn ,$sql);

      if($retval){
         $_SESSION["Message"]="Vehiculul a fost adaugat cu succes!";
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
   	<h1 class="text-center">Adaugare Vehicul</h1>
   	<div>
   		<?php echo Message();?>        	
   	</div>


   	<div>

			<form action="AV.php" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
					<label for="Tip">Tip:</label>
					<input class="form-control" type="text" name="Tip" id="Tip">
				</div>
          <div class="form-group">
          <label for="MarcaTip">Marca&Model:</label>
          <input class="form-control" type="text" name="MarcaTip" id="MarcaTip">
        </div>
        <div class="form-group">
          <label for="NrCirculatie">Numar Circulatie:</label>
          <input class="form-control" type="text" name="NrCirculatie" id="NrCirculatie">
        </div>
         
         <div class="form-group">
          <label for="SerieSasiu">SerieSasiu:</label>
          <input class="form-control" type="text" name="SerieSasiu" id="SerieSasiu">
        </div>
          <div class="form-group">
          <label for="SerieCI">SerieCI:</label>
          <input class="form-control" type="text" name="SerieCI" id="SerieCI">
        </div>
        <div class="form-group">
          <label for="SerieTalon">SerieTalon:</label>
          <input class="form-control" type="text" name="SerieTalon" id="SerieTalon">
        </div>       

        <div class="form-group">
          <label for="CapCil">Capacitate Cilindrica:</label>
          <input class="form-control" type="text" name="CapCil" id="CapCil">
        </div>
          <div class="form-group">
          <label for="LocSauTona">Loc sau Tona:</label>
          <input class="form-control" type="text" name="LocSauTona" id="LocSauTona">
        </div>
        <div class="form-group">
          <label for="Putere">Putere:</label>
          <input class="form-control" type="text" name="Putere" id="Putere">
        </div>

        <div class="form-group">
          <label for="MMA">Masa maxima autoriazata:</label>
          <input class="form-control" type="text" name="MMA" id="MMA">
        </div>

<input class="btn btn-success btn-block" type="submit" name="submit" value="Adaugati vehicul" >
				</fieldset>
				

			</form>

</div>	
<?php }
else{
  ?>
    <h1 class="text-center">Adaugare Vehicul</h1>
<p class="warn">Nu aveti dreptul de a adauga autovehicule.</p>
 
  <?php
}
?>
	</div>

</div>


</div>



</body>
</html>

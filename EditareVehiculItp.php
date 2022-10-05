<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
VerificareLogare();
?>

<?php
if(isset($_POST["submit"])){

        $NrCirculatie = mysqli_escape_string($conn,$_POST['NrCirculatie']);

         $AnItp = mysqli_escape_string($conn,$_POST['anItp']);
         $LunaItp = mysqli_escape_string($conn,$_POST['lunaItp']);
         $ZiItp = mysqli_escape_string($conn,$_POST['ziItp']);




       $xItp=checkdate($LunaItp,  $ZiItp, $AnItp);




         if(!$xItp){
         $_SESSION["Message"]="Ati introdus o data gresita pentru ITP ul autovehiculului cu numarul de circulatie $NrCirculatie!";
         header("Location:AdminVehicule.php");
         exit();
    }

        else{
        $DataItp = $AnItp."/".$LunaItp."/".$ZiItp;
        }


     if(empty($NrCirculatie)){
     	$_SESSION["Message"]="Completati toate campurile!";
     	header("Location:AdminVehicule.php");
     	exit();
     }   

     else{
      $Edit=$_GET['Edit'];	
     $sql="UPDATE autovehicule set NrCirculatie='$NrCirculatie',DataExpItp='$DataItp' where IdAutovehicul='$Edit'";

 
   $retval = mysqli_query( $conn, $sql );

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
    if (($_SESSION['rol']=='Editor ITP')||($_SESSION['rol']=='Editor Date Soferi')){

?>
   	<h1 class="text-center">Editare ITP</h1>
   	<div><?php echo Message();?>

   	</div>


<?php

$VehiculId=$_GET['Edit'];

$sql="SELECT * FROM autovehicule where IdAutovehicul='$VehiculId' order by IdAutovehicul desc";

$query=mysqli_query($conn,$sql);
while($Data=mysqli_fetch_assoc($query)){
	$NrCirculatieEdit=$Data['NrCirculatie'];
}

?>


	<form action="EditareVehiculItp.php?Edit=<?php echo $VehiculId ;?>" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
					<label for="NrCirculatie">Numar circulatie:</label>
					<input value="<?php echo $NrCirculatieEdit;?>" class="form-control" type="text" name="NrCirculatie" id="NrCirculatie" placeholder="NrCirculatie">
				</div>


			<div class="row">

                 <div class="col-sm-12">
        <div class="form-group">
          <label for="anItp">An expirare ITP:</label>
          <input class="form-control" type="text" name="anItp" id="anItp">
        </div>
          <div class="form-group">
          <label for="lunaItp">Luna expirare ITP:</label>
          <input class="form-control" type="text" name="lunaItp" id="lunaItp">
        </div>
        <div class="form-group">
          <label for="ziItp">Zi expirare ITP:</label>
          <input class="form-control" type="text" name="ziItp" id="ziItp">
        </div>
        </div>

      </div>

	<input class="btn btn-success btn-block" type="submit" name="submit" value="Editati datele pentru ITP">
				</fieldset>

			</form>
<?php }
else{
  ?>
        <h1 class="text-center">Editare ITP</h1>
<p class="warn">Nu aveti drepturi de editare.</p>
 
  <?php
}
?>            

</div>
</body>
</html>

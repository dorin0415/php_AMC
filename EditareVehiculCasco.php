<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
VerificareLogare();
?>

<?php
if(isset($_POST["submit"])){
 $Edit=$_GET['Edit'];
      	$NrCirculatie=mysqli_escape_string($conn,$_POST['NrCirculatie']);

         $AnCasco = mysqli_escape_string($conn,$_POST['anCasco']);
         $LunaCasco = mysqli_escape_string($conn,$_POST['lunaCasco']);
         $ZiCasco = mysqli_escape_string($conn,$_POST['ziCasco']);

         $xCasco=checkdate($LunaCasco,  $ZiCasco, $AnCasco);
	 
	 if($AnCasco==0000){
	 $_SESSION["Message"]="Ati sters data asigurarii CASCO a autovehiculului cu numarul de circulatie $NrCirculatie!";
	 $sql="UPDATE autovehicule set DataExpCasco=null where IdAutovehicul='$Edit'";
         mysqli_query( $conn , $sql);
         header("Location:AdminVehicule.php");
         exit();
	 
         }
	


         if(!$xCasco){
         $_SESSION["Message"]="Ati introdus o data gresita pentru Casco ul autovehiculului cu numarul de circulatie $NrCirculatie!";
         header("Location:AdminVehicule.php");
         exit();
    }

        else{
        $DataCasco = $AnCasco."/".$LunaCasco."/".$ZiCasco;
        }


     if(empty($NrCirculatie)){
     	$_SESSION["Message"]="Completati toate campurile!";
     	header("Location:AdminVehicule.php");
     	exit();
     }   

     else{
     	
     $sql="UPDATE autovehicule set NrCirculatie='$NrCirculatie',DataExpCasco='$DataCasco' where IdAutovehicul='$Edit'";

   
   $retval = mysqli_query(  $conn,$sql );

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
   	<h1 class="text-center">Editare Casco</h1>
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


	<form action="EditareVehiculCasco.php?Edit=<?php echo $VehiculId ;?>" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
					<label for="NrCirculatie">Numar circulatie:</label>
					<input value="<?php echo $NrCirculatieEdit;?>" class="form-control" type="text" name="NrCirculatie" id="NrCirculatie" placeholder="NrCirculatie">
				</div>


			<div class="row">
        
                 <div class="col-sm-12">
        <div class="form-group">
          <label for="anCasco">An expirare Casco:(Daca doriti sa stergeti data, scrieti mai jos '0000')</label>
          <input class="form-control" type="text" name="anCasco" id="anCasco">
        </div>
          <div class="form-group">
          <label for="lunaCasco">Luna expirare Casco:</label>
          <input class="form-control" type="text" name="lunaCasco" id="lunaCasco">
        </div>
        <div class="form-group">
          <label for="ziCasco">Zi expirare Casco:</label>
          <input class="form-control" type="text" name="ziCasco" id="ziCasco">
        </div>
        </div>

      </div>

	<input class="btn btn-success btn-block" type="submit" name="submit" value="Editati datele pentru casco" >
				</fieldset>

			</form>
			    <?php }
else{
  ?>
        <h1 class="text-center">Editare Casco</h1>
<p class="warn">Nu aveti drepturi de editare.</p>
 
  <?php
}
?>  
</div>

</body>
</html>

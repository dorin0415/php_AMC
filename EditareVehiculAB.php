<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
VerificareLogare();
?>

<?php
if(isset($_POST["submit"])){
$Edit=$_GET['Edit'];

      	$NrCirculatie=mysqli_escape_string($conn,$_POST['NrCirculatie']);
        $NrAB=mysqli_escape_string($conn,$_POST['NrAB']);

         $AnAB = mysqli_escape_string($conn,$_POST['anAB']);
         $LunaAB = mysqli_escape_string($conn,$_POST['lunaAB']);
         $ZiAB = mysqli_escape_string($conn,$_POST['ziAB']);


         $xAB=checkdate($LunaAB,  $ZiAB, $AnAB);

	 if($AnAB==0000){
	 $_SESSION["Message"]="Ati sters data asigurarii de bagaje a autovehiculului cu numarul de circulatie $NrCirculatie!";
	 $sql="UPDATE autovehicule set DataExpAB=null, NrAB=null where IdAutovehicul='$Edit'";
         mysqli_query( $conn , $sql);
         header("Location:AdminVehicule.php");
         exit();
	 
         }	


         if(!$xAB){
         $_SESSION["Message"]="Ati introdus o data gresita pentru asigurarea de bagaje a autovehiculului cu numarul de circulatie $NrCirculatie!";
         header("Location:AdminVehicule.php");
         exit();
    }

        else{
        $DataAB = $AnAB."/".$LunaAB."/".$ZiAB;
        }

   if(empty($NrCirculatie)){
     	$_SESSION["Message"]="Completati toate campurile!";
     	header("Location:AdminVehicule.php");
     	exit();
     }   

     else{
      	
     $sql="UPDATE autovehicule set NrCirculatie='$NrCirculatie',DataExpAB='$DataAB',NrAB='$NrAB' where IdAutovehicul='$Edit'";

  
   $retval = mysqli_query(  $conn ,$sql);

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
   	<h1 class="text-center">Editare Asigurare bagaje</h1>
   	<div><?php echo Message();?>

   	</div>


<?php

$VehiculId=$_GET['Edit'];

$sql="SELECT * FROM autovehicule where IdAutovehicul='$VehiculId' order by IdAutovehicul desc";

$query=mysqli_query($conn,$sql);
while($Data=mysqli_fetch_assoc($query)){
	$NrCirculatieEdit=$Data['NrCirculatie'];
	$NrABEdit=$Data['NrAB'];

}

?>


	<form action="EditareVehiculAB.php?Edit=<?php echo $VehiculId ;?>" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
					<label for="NrCirculatie">Numar circulatie:</label>
					<input value="<?php echo $NrCirculatieEdit;?>" class="form-control" type="text" name="NrCirculatie" id="NrCirculatie" placeholder="NrCirculatie">
				</div>

					<div class="form-group">
					<label for="NrAB">Numar asigurare bagaje:</label>
					<input value="<?php echo $NrABEdit;?>" class="form-control" type="text" name="NrAB" id="NrAB" placeholder="NrAB">
				</div>



			<div class="row">
        
                 <div class="col-sm-12">
        <div class="form-group">
          <label for="anAB">An expirare asigurare bagaje:(Daca doriti sa stergeti data, scrieti mai jos '0000')</label>
          <input class="form-control" type="text" name="anAB" id="anAB">
        </div>
          <div class="form-group">
          <label for="lunaAB">Luna expirare asigurare bagaje:</label>
          <input class="form-control" type="text" name="lunaAB" id="lunaAB">
        </div>
        <div class="form-group">
          <label for="ziAB">Zi expirare asigurare bagaje:</label>
          <input class="form-control" type="text" name="ziAB" id="ziAB">
        </div>
        </div>

      </div>


	<input class="btn btn-success btn-block" type="submit" name="submit" value="Editati datele pentru asigurarea de bagaje">
				</fieldset>


			</form>
<?php }
else{
  ?>
        <h1 class="text-center">Editare Asigurare bagaje</h1>
<p class="warn">Nu aveti drepturi de editare.</p>
 
  <?php
}
?>      

</div>	



</body>
</html>

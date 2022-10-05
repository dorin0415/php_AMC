<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
VerificareLogare();
?>

<?php
if(isset($_POST["submit"])){
 $Edit=$_GET['Edit'];
        $NrCirculatie = mysqli_escape_string($conn,$_POST['NrCirculatie']);

         $AnR = mysqli_escape_string($conn,$_POST['anR']);
         $LunaR = mysqli_escape_string($conn,$_POST['lunaR']);
         $ZiR = mysqli_escape_string($conn,$_POST['ziR']);

        $xR=checkdate($LunaR,  $ZiR, $AnR);

	if($AnR==0000){
	 $_SESSION["Message"]="Ati sters data rovignetei autovehiculului cu numarul de circulatie $NrCirculatie!";
	 $sql="UPDATE autovehicule set DataExpRov=null where IdAutovehicul='$Edit'";
         mysqli_query( $conn , $sql);
         header("Location:AdminVehicule.php");
         exit();
	 
         }	


         if(!$xR){
         $_SESSION["Message"]="Ati introdus o data gresita pentru rovigneta autovehiculului cu numarul de circulatie $NrCirculatie!";
         header("Location:AdminVehicule.php");
         exit();
    }

        else{
        $DataR = $AnR."/".$LunaR."/".$ZiR;
        }


     if(empty($NrCirculatie)){
     	$_SESSION["Message"]="Completati toate campurile!";
     	header("Location:AdminVehicule.php");
     	exit();
     }   

     else{
     	
     $sql="UPDATE autovehicule set NrCirculatie='$NrCirculatie',DataExpRov='$DataR' where IdAutovehicul='$Edit'";

   
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
   	<h1 class="text-center">Editare rovigneta</h1>
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


	<form action="EditareVehiculRov.php?Edit=<?php echo $VehiculId ;?>" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
					<label for="NrCirculatie">Numar circulatie:</label>
					<input value="<?php echo $NrCirculatieEdit;?>" class="form-control" type="text" name="NrCirculatie" id="NrCirculatie" placeholder="NrCirculatie">
				</div>


			<div class="row">

                 <div class="col-sm-12">
        <div class="form-group">
          <label for="anR">An expirare rovigneta:(Daca doriti sa stergeti data, scrieti mai jos '0000')</label>
          <input class="form-control" type="text" name="anR" id="anR">
        </div>
          <div class="form-group">
          <label for="lunaR">Luna expirare rovigneta:</label>
          <input class="form-control" type="text" name="lunaR" id="lunaR">
        </div>
        <div class="form-group">
          <label for="ziR">Zi expirare rovigneta:</label>
          <input class="form-control" type="text" name="ziR" id="ziR">
        </div>
        </div>

      </div>

	<input class="btn btn-success btn-block" type="submit" name="submit" value="Editati datele pentru rovigneta" >
				</fieldset>
			

			</form>
          <?php }
else{
  ?>
        <h1 class="text-center">Editare Rovigneta</h1>
<p class="warn">Nu aveti drepturi de editare.</p>
 
  <?php
}
?>
</div>
</body>
</html>

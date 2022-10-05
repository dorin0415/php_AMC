<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
VerificareLogare();
?>

<?php
if(isset($_POST["submit"])){
 $Edit=$_GET['Edit'];
        $NrAsigurare = mysqli_escape_string($conn,$_POST['NrAsigurare']);

      	$NrCirculatie = mysqli_escape_string($conn,$_POST['NrCirculatie']);

         $AnAs = mysqli_escape_string($conn,$_POST['anAs']);
         $LunaAs = mysqli_escape_string($conn,$_POST['lunaAs']);
         $ZiAs = mysqli_escape_string($conn,$_POST['ziAs']);


       $xAs=checkdate($LunaAs, $ZiAs, $AnAs);


	 if($AnAs==0000){
	 $_SESSION["Message"]="Ati sters data asigurarii autovehiculului cu numarul de circulatie $NrCirculatie!";
	 $sql="UPDATE autovehicule set DataExpAsig=null, NrAsigurare=null where IdAutovehicul='$Edit'";
         mysqli_query( $conn , $sql);
         header("Location:AdminVehicule.php");
         exit();
	 
         }	

         if(!$xAs){
         $_SESSION["Message"]="Ati introdus o data gresita pentru asigurarea autovehiculului cu numarul de circulatie $NrCirculatie!";
         header("Location:AdminVehicule.php");
         exit();
    }

        else{
        $DataAs = $AnAs."/".$LunaAs."/".$ZiAs;
        }

        if(empty($NrAsigurare)||empty($NrCirculatie)){
     	$_SESSION["Message"]="Completati toate campurile!";
     	header("Location:AdminVehicule.php");
     	exit();
     }   

     else{
     	
     $sql="UPDATE autovehicule set NrAsigurare='$NrAsigurare',DataExpAsig='$DataAs',NrCirculatie='$NrCirculatie' where IdAutovehicul='$Edit'";

  
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
   	<h1 class="text-center">Editare Asigurare</h1>
   	<div><?php echo Message();?>

   	</div>


<?php

$VehiculId=$_GET['Edit'];

$sql="SELECT * FROM autovehicule where IdAutovehicul='$VehiculId' order by IdAutovehicul desc";

$query=mysqli_query($conn,$sql);
while($Data=mysqli_fetch_assoc($query)){
	$NrAsigurareEdit=$Data['NrAsigurare'];
  $NrCirculatieEdit=$Data['NrCirculatie'];
}

?>


	<form action="EditareVehiculAs.php?Edit=<?php echo $VehiculId ;?>" method="post" enctype="multipart/form-data">
				<fieldset>

          <div class="form-group">
          <label for="NrCirculatie">Numar circulatie:</label>
          <input value="<?php echo $NrCirculatieEdit;?>" class="form-control" type="text" name="NrCirculatie" id="NrCirculatie" placeholder="NrCirculatie">
        </div>


					<div class="form-group">
					<label for="NrAsigurare">Numar asigurare:</label>
					<input value="<?php echo $NrAsigurareEdit;?>" class="form-control" type="text" name="NrAsigurare" id="NrAsigurare" placeholder="NrAsigurare">
				</div>


			<div class="row">

                 <div class="col-sm-12">
        <div class="form-group">
          <label for="anAs">An expirare asigurare:</label>
          <input class="form-control" type="text" name="anAs" id="anAs">
        </div>
          <div class="form-group">
          <label for="lunaAs">Luna expirare asigurare:</label>
          <input class="form-control" type="text" name="lunaAs" id="lunaAs">
        </div>
        <div class="form-group">
          <label for="ziAs">Zi expirare asigurare:</label>
          <input class="form-control" type="text" name="ziAs" id="ziAs">
        </div>
        </div>

      </div>
	<input class="btn btn-success btn-block" type="submit" name="submit" value="Editati datele pentru asigurare" >
				</fieldset>
		</form>
    <?php }
else{
  ?>
        <h1 class="text-center">Editare Asigurare</h1>
<p class="warn">Nu aveti drepturi de editare.</p>
 
  <?php
}
?>  

</div>
</body>
</html>

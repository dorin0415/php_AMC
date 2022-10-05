<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
VerificareLogare();
?>

<?php
 
if(isset($_POST["submit"])){
$Edit=$_GET['Edit'];
        $NrCirculatie = mysqli_escape_string($conn,$_POST['NrCirculatie']);
        $NrCopieConforma=mysqli_escape_string($conn,$_POST['NrCopieConforma']);

         $AnCC = mysqli_escape_string($conn,$_POST['anCC']);
         $LunaCC = mysqli_escape_string($conn,$_POST['lunaCC']);
         $ZiCC = mysqli_escape_string($conn,$_POST['ziCC']);
 
         $xCC=checkdate($LunaCC,  $ZiCC, $AnCC);

	if($AnCC==0000){
	 $_SESSION["Message"]="Ati sters data copiei conforme a  autovehiculului cu numarul de circulatie $NrCirculatie!";
	 $sql="UPDATE autovehicule set DataExpCC=null, NrCopieConforma=null where IdAutovehicul='$Edit'";
         mysqli_query( $conn , $sql);
         header("Location:AdminVehicule.php");
         exit();
	 
         }	


         if(!$xCC){
         $_SESSION["Message"]="Ati introdus o data gresita pentru Copia conforma a autovehiculului cu numarul de circulatie $NrCirculatie!";
         header("Location:AdminVehicule.php");
         exit();
    }

        else{
        $DataCC = $AnCC."/".$LunaCC."/".$ZiCC;
        }
    if(empty($NrCirculatie)||empty($NrCopieConforma)){
     	$_SESSION["Message"]="Completati toate campurile!";
     	header("Location:AdminVehicule.php");
     	exit();
     }   

     else{
     	
     $sql="UPDATE autovehicule set NrCirculatie='$NrCirculatie',DataExpCC='$DataCC',NrCopieConforma='$NrCopieConforma' where IdAutovehicul='$Edit'";

 
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
   	<h1 class="text-center">Editare Copie conforma</h1>
   	<div><?php echo Message();?>

   	</div>


<?php

$VehiculId=$_GET['Edit'];

$sql="SELECT * FROM autovehicule where IdAutovehicul='$VehiculId' order by IdAutovehicul desc";

$query=mysqli_query($conn,$sql);
while($Data=mysqli_fetch_assoc($query)){
	$NrCirculatieEdit=$Data['NrCirculatie'];
  $NrCopieConformaEdit=$Data['NrCopieConforma'];
}

?>


	<form action="EditareVehiculCC.php?Edit=<?php echo $VehiculId ;?>" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
					<label for="NrCirculatie">Numar circulatie:</label>
					<input value="<?php echo $NrCirculatieEdit;?>" class="form-control" type="text" name="NrCirculatie" id="NrCirculatie" placeholder="NrCirculatie">
				</div>

        <div class="form-group">
          <label for="NrCopieConforma">Numar copie conforma:</label>
          <input value="<?php echo $NrCopieConformaEdit;?>" class="form-control" type="text" name="NrCopieConforma" id="NrCopieConforma" placeholder="NrCopieConforma">
        </div>

			<div class="row">
        
                 <div class="col-sm-12">
        <div class="form-group">
          <label for="anCC">An expirare copie conforma:(Daca doriti sa stergeti data, scrieti mai jos '0000')</label>
          <input class="form-control" type="text" name="anCC" id="anCC">
        </div>
          <div class="form-group">
          <label for="lunaCC">Luna expirare copie conforma:</label>
          <input class="form-control" type="text" name="lunaCC" id="lunaCC">
        </div>
        <div class="form-group">
          <label for="ziCC">Zi expirare copie conforma:</label>
          <input class="form-control" type="text" name="ziCC" id="ziCC">
        </div>
        </div>

      </div>
	<input class="btn btn-success btn-block" type="submit" name="submit" value="Editati datele pentru Copia conforma" >
				</fieldset>

			</form>
			          <?php }
else{
  ?>
        <h1 class="text-center">Editare copie conforma</h1>
<p class="warn">Nu aveti drepturi de editare.</p>
 
  <?php
}
?>
</div>	
</body>
</html>

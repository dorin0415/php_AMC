<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
VerificareLogare();
?>

<?php

if(isset($_POST["submitP"])){
	
 	
        $Numea = mysqli_escape_string($conn,$_POST['numeA']);
       

      	
         $AnMa = mysqli_escape_string($conn,$_POST['anMa']);
         $LunaMa = mysqli_escape_string($conn,$_POST['lunaMa']);
         $ZiMa = mysqli_escape_string($conn,$_POST['ziMa']);





       $xMa=checkdate($LunaMa,$ZiMa, $AnMa);
   

       if(!$xMa){
 			$_SESSION["Message"]="Ati introdus o data gresita pentru fisa medicala a angajatului $Nume!";
     			  header('Location:AdminPersonal.php');
      die;
      		}

        else{
       	$DataMa = $AnMa."/".$LunaMa."/".$ZiMa;
        }


     if(empty($Numea)){
     	$_SESSION["Message"]="Completati toate campurile!";
     	header('Location:AdminPersonal.php');
      
     }   

     else{
     $Edit=$_GET['Edit'];   
     $sql="UPDATE personal set Nume='$Numea',DataExpFisaMed='$DataMa' where IdPersonal='$Edit'";

  
   $retval = mysqli_query(  $conn ,$sql);

   if($retval){
   		  $_SESSION["Message"]="Datele angajatului $Numea au fost modificate cu succes!";
		  header("Location:AdminPersonal.php");
		  exit();
	}



     }

}

?>

<?php require_once("Include/header.php");?>


   <div class="col-sm-10">
        <?php
    if ($_SESSION['rol']=='Editor Fise Medicale'){

?>
   	<h1 class="text-center">Editare fisa medicala</h1>
   	<div><?php echo Message();?>

   	</div>


<?php

  $PersonalId=$_GET['Edit'];


$sql="SELECT * FROM personal where IdPersonal='$PersonalId'";

$query=mysqli_query($conn,$sql);
while($Data=mysqli_fetch_assoc($query)){
	$NumeEdit=$Data['Nume'];

}

?>


	<form action="EditarePersonalFM.php?Edit=<?php echo $PersonalId?>" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
					<label for="Nume">Nume angajat:</label>
					<input value="<?php echo $NumeEdit;?>" class="form-control" type="text" name="numeA" id="Nume" placeholder="Nume">
				</div>

       

			<div class="row">
          <div class="col-sm-12">
   			<div class="form-group">
					<label for="anMa">An expirare fisa medicala:</label>
					<input class="form-control" type="text" name="anMa" id="anMa">
				</div>
					<div class="form-group">
					<label for="lunaMa">Luna expirare fisa medicala:</label>
					<input class="form-control" type="text" name="lunaMa" id="lunaMa">
				</div>
				<div class="form-group">
					<label for="ziMa">Zi expirare fisa medicala:</label>
					<input class="form-control" type="text" name="ziMa" id="ziMa">
        </div>
				</div>

      </div>

	<input class="btn btn-success btn-block" type="submit" name="submitP" value="Editati datele fisei medicale">
				</fieldset>

			</form>
<?php }
else{
  ?>
        <h1 class="text-center">Editare fisa medicala</h1>
<p class="warn">Nu aveti drepturi de editare.</p>
 
  <?php
}
?>
</div>
</body>
</html>

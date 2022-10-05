<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
VerificareLogare();
?>

<?php

if(isset($_POST["submitP"])){
	
 	
        $Numea = mysqli_escape_string($conn,$_POST['numeA']);
       

      	
         $AnAP = mysqli_escape_string($conn,$_POST['anAP']);
         $LunaAP = mysqli_escape_string($conn,$_POST['lunaAP']);
         $ZiAP = mysqli_escape_string($conn,$_POST['ziAP']);





       $xAP=checkdate($LunaAP,$ZiAP, $AnAP);
   

       if(!$xAP){
 			$_SESSION["Message"]="Ati introdus o data gresita pentru avizul psihologic al angajatului $Nume!";
     			  header('Location:AdminPersonal.php');
      die;
      		}

        else{
       	$DataAP= $AnAP."/".$LunaAP."/".$ZiAP;
        }


     if(empty($Numea)){
     	$_SESSION["Message"]="Completati toate campurile!";
     	header('Location:AdminPersonal.php');
      
     }   

     else{
     $Edit=$_GET['Edit'];   
     $sql="UPDATE personal set Nume='$Numea',DataExpAP='$DataAP' where IdPersonal='$Edit'";

  
   $retval = mysqli_query(  $conn,$sql );

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
   	<h1 class="text-center">Editare Aviz psihologic</h1>
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


	<form action="EditarePersonalAP.php?Edit=<?php echo $PersonalId?>" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
					<label for="Nume">Nume angajat:</label>
					<input value="<?php echo $NumeEdit;?>" class="form-control" type="text" name="numeA" id="Nume" placeholder="Nume">
				</div>

       

			<div class="row">
          <div class="col-sm-12">
   			<div class="form-group">
					<label for="anAP">An expirare aviz psihologic:</label>
					<input class="form-control" type="text" name="anAP" id="anAP">
				</div>
					<div class="form-group">
					<label for="lunaAP">Luna expirare aviz psihologic:</label>
					<input class="form-control" type="text" name="lunaAP" id="lunaAP">
				</div>
				<div class="form-group">
					<label for="ziAP">Zi expirare aviz psihologic::</label>
					<input class="form-control" type="text" name="ziAP" id="ziAP">
        </div>
				</div>

      </div>

	<input class="btn btn-success btn-block" type="submit" name="submitP" value="Editati datele avizului psihologic">
				</fieldset>

			</form>
<?php }
else{
  ?>
      <h1 class="text-center">Editare Aviz psihologic</h1>
<p class="warn">Nu aveti drepturi de editare.</p>
 
  <?php
}
?>
</div>
</body>
</html>

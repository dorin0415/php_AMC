<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
VerificareLogare();
?>


<?php 


if(isset($_POST['submit'])) {


        $Nume = mysqli_escape_string($conn,$_POST['nume']);
     	$NrColoana = mysqli_escape_string($conn,$_POST['nrCol']);

     if(empty($Nume)){
     	$_SESSION["Message"]="Completati campul nume!";
   			 header("Location:AdaugareSofer.php");
  			 exit();
     }  
   
 if(empty($NrColoana)||($NrColoana>6)||($NrColoana<1)){
      $_SESSION["Message"]="Campul coloana trebuie sa aiba o valoare in intervalul 1-6!";
         header("Location:AdaugareSofer.php");
         exit();
     }  

     $sqlV="SELECT * FROM soferi where nume='$Nume'";
     
     $query=mysqli_query($conn,$sqlV);
     if(mysqli_num_rows($query)>=1)
       {
        $_SESSION["Message"]="Acest sofer exista deja in baza de date!";
       }

     else{
      $sql = "INSERT INTO soferi ".
         "(Nume,NrColoana) ".
         "VALUES"."(UPPER('$Nume'),'$NrColoana')";

    
      $retval = mysqli_query(  $conn ,$sql);
      if($retval){
         $_SESSION["Message"]="Soferul a fost adaugat cu succes!";
		  header("Location:AdminSoferi.php");
          exit();
      }

} 

}

?>


<?php require_once("Include/header.php");?>



   <div class="col-sm-10">
       <?php
if ($_SESSION['rol']=='Editor Date Personal'){

?>
   	<h1 class="text-center">Adaugare Sofer</h1>
   	<div>
   		<?php echo Message();?>        	
   	</div>


   	<div>

			<form action="AdaugareSofer.php" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
					<label for="Nume">Nume Sofer:</label>
					<input class="form-control" type="text" name="nume" id="Nume">
				</div>

					<div class="form-group">
					<label for="nrCol">Coloana:</label>
					<input class="form-control" type="text" name="nrCol" id="nrCol">
				</div>
      
<input class="btn btn-success btn-block" type="submit" name="submit" value="Adaugati sofer" >
				</fieldset>

			</form>

</div>	
<?php }
else{
  ?>
    <h1 class="text-center">Adaugare Sofer</h1>
<p class="warn">Nu aveti dreptul de a adauga soferi.</p>
 
  <?php
}
?>

	</div>
	


</div>


</div>



</body>
</html>

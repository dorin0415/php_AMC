<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
VerificareLogare();
?>


<?php 

if(isset($_POST['submit'])) {


        $Nume = mysqli_escape_string($conn,$_POST['Nume']);
     	$Functie = mysqli_escape_string($conn,$_POST['Functie']);

     if(empty($Nume)){
     	$_SESSION["Message"]="Completati campul nume!";
   			 header("Location:AP.php");
  			 exit();
     }  
   
    if(empty($Functie)){
      $_SESSION["Message"]="Completati campul functie!";
         header("Location:AP.php");
         exit();
     }  


     $sqlV="SELECT * FROM personal where Nume='$Nume'";
    
     $query=mysqli_query($conn,$sqlV);
     if(mysqli_num_rows($query)>=1)
       {
        $_SESSION["Message"]="Acest angajat exista deja in baza de date!";
       }

     else{
      $sql = "INSERT INTO personal ".
         "(Nume,Functie) ".
         "VALUES"."(UPPER('$Nume'),UPPER('$Functie'))";

      
      $retval = mysqli_query( $conn,$sql );
      if($retval){
         $_SESSION["Message"]="Angajatul a fost adaugat cu succes!";
		  header("Location:AdminPersonal.php");
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
   	<h1 class="text-center">Adaugare Angajat</h1>
   	<div>
   		<?php echo Message();?>
   	</div>


   	<div>

			<form action="AP.php" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
					<label for="Nume">Nume Angajat:</label>
					<input class="form-control" type="text" name="Nume" id="Nume">
				</div>

					<div class="form-group">
					<label for="Functie">Functie:</label>
					<input class="form-control" type="text" name="Functie" id="Functie">
				</div>
      
<input class="btn btn-success btn-block" type="submit" name="submit" value="Adaugati angajat" >
				</fieldset>

			</form>

</div>	
<?php }
else{
  ?>
    <h1 class="text-center">Adaugare Angajat</h1>
<p class="warn">Nu aveti dreptul de a adauga angajati.</p>
 
  <?php
}
?>


	</div>
	


</div>


</div>



</body>
</html>

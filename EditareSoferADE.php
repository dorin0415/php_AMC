<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
VerificareLogare();
?>

<?php
if(isset($_POST["submit"])){

 	
        $Nume = mysqli_escape_string($conn,$_POST['nume']);

         $AnA = mysqli_escape_string($conn,$_POST['anA']);
         $LunaA = mysqli_escape_string($conn,$_POST['lunaA']);
         $ZiA = mysqli_escape_string($conn,$_POST['ziA']);

       $xA=checkdate($LunaA,  $ZiA, $AnA);




         if(!$xA){
      $_SESSION["Message"]="Ati introdus o data gresita pentru atestatul soferului $Nume!";
         header("Location:AdminSoferi.php");
         exit();
    }

        else{
        $DataA = $AnA."/".$LunaA."/".$ZiA;
        }


     if(empty($Nume)){
     	$_SESSION["Message"]="Completati toate campurile!";
     	header("Location:AdminSoferi.php");
     	exit();
     }   

     else{
      $Edit=$_GET['Edit'];	
     $sql="UPDATE soferi set Nume='$Nume',DataExpAtestatDE='$DataA' where IdSofer='$Edit'";

   
   $retval = mysqli_query(  $conn,$sql );

   if($retval){
   		  $_SESSION["Message"]="Datele soferului $Nume au fost modificate cu succes!";
		  header("Location:AdminSoferi.php");
		  exit();
	}



     }

}

?>

<?php require_once("Include/header.php");?>


   <div class="col-sm-10">
                 <?php
    if ($_SESSION['rol']=='Editor Date Soferi'){

?>
   	<h1 class="text-center">Editare atestat</h1>
   	<div><?php echo Message();?>

   	</div>


<?php

$SoferId=$_GET['Edit'];

$sql="SELECT * FROM soferi where IdSofer='$SoferId' order by IdSofer desc";

$query=mysqli_query($conn,$sql);
while($Data=mysqli_fetch_assoc($query)){
	$NumeEdit=$Data['Nume'];
}

?>


	<form action="EditareSoferADE.php?Edit=<?php echo $SoferId?>" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
					<label for="Nume">Nume Sofer:</label>
					<input value="<?php echo $NumeEdit;?>" class="form-control" type="text" name="nume" id="Nume" placeholder="Nume">
				</div>


			<div class="row">
        
                 <div class="col-sm-12">
        <div class="form-group">
          <label for="anA">An expirare atestat:</label>
          <input class="form-control" type="text" name="anA" id="anA">
        </div>
          <div class="form-group">
          <label for="lunaA">Luna expirare atestat:</label>
          <input class="form-control" type="text" name="lunaA" id="lunaA">
        </div>
        <div class="form-group">
          <label for="ziA">Zi expirare atestat:</label>
          <input class="form-control" type="text" name="ziA" id="ziA">
        </div>
        </div>

      </div>


	<input class="btn btn-success btn-block" type="submit" name="submit" value="Editati datele atestatului">
				</fieldset>
			</form>
      <?php }
else{
  ?>
        <h1 class="text-center">Editare atestat</h1>
<p class="warn">Nu aveti drepturi de editare.</p>
 
  <?php
}
?>

</div>	

</body>
</html>

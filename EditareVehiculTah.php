<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
VerificareLogare();
?>

<?php
if(isset($_POST["submit"])){
 $Edit=$_GET['Edit'];

      	$NrCirculatie=mysqli_escape_string($conn,$_POST['NrCirculatie']);

         $AnT = mysqli_escape_string($conn,$_POST['anT']);
         $LunaT = mysqli_escape_string($conn,$_POST['lunaT']);
         $ZiT = mysqli_escape_string($conn,$_POST['ziT']);

         $xT=checkdate($LunaT,  $ZiT, $AnT);

	 if($AnT==0000){
	 $_SESSION["Message"]="Ati sters data tahografului autovehiculului cu numarul de circulatie $NrCirculatie!";
	 $sql="UPDATE autovehicule set DataExpTah=null where IdAutovehicul='$Edit'";
         mysqli_query( $conn , $sql);
         header("Location:AdminVehicule.php");
         exit();
	 
         }	


         if(!$xT){
         $_SESSION["Message"]="Ati introdus o data gresita pentru tahograful autovehiculului cu numarul de circulatie $NrCirculatie!";
         header("Location:AdminVehicule.php");
         exit();
    }

        else{
        $DataT = $AnT."/".$LunaT."/".$ZiT;
        }


     if(empty($NrCirculatie)){
     	$_SESSION["Message"]="Completati toate campurile!";
     	header("Location:AdminVehicule.php");
     	exit();
     }   

     else{
     	
     $sql="UPDATE autovehicule set NrCirculatie='$NrCirculatie',DataExpTah='$DataT' where IdAutovehicul='$Edit'";

 
   $retval = mysqli_query( $conn , $sql);

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
   	<h1 class="text-center">Editare Tahograf</h1>
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


	<form action="EditareVehiculTah.php?Edit=<?php echo $VehiculId ;?>" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
					<label for="NrCirculatie">Numar circulatie:</label>
					<input value="<?php echo $NrCirculatieEdit;?>" class="form-control" type="text" name="NrCirculatie" id="NrCirculatie" placeholder="NrCirculatie">
				</div>


			<div class="row">

                 <div class="col-sm-12">
        <div class="form-group">
          <label for="anT">An expirare Tahograf:(Daca doriti sa stergeti data, scrieti mai jos '0000')</label>
          <input class="form-control" type="text" name="anT" id="anT">
        </div>
          <div class="form-group">
          <label for="lunaT">Luna expirare Tahograf:</label>
          <input class="form-control" type="text" name="lunaT" id="lunaT">
        </div>
        <div class="form-group">
          <label for="ziT">Zi expirare Tahograf:</label>
          <input class="form-control" type="text" name="ziT" id="ziT">
        </div>
        </div>

      </div>

	<input class="btn btn-success btn-block" type="submit" name="submit" value="Editati datele pentru tahograf">
				</fieldset>
</form>
<?php }
else{
  ?>
        <h1 class="text-center">Editare Tahograf</h1>
<p class="warn">Nu aveti drepturi de editare.</p>
 
  <?php
}
?>            

</div>
</body>
</html>

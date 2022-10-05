<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
VerificareLogare();
?>

<?php
if(isset($_POST["submit"])){
 $Edit=$_GET['Edit'];
      	$NrCirculatie=mysqli_escape_string($conn,$_POST['NrCirculatie']);
        $NrClasificare=mysqli_escape_string($conn,$_POST['NrClasificare']);

         $AnCL = mysqli_escape_string($conn,$_POST['anCL']);
         $LunaCL = mysqli_escape_string($conn,$_POST['lunaCL']);
         $ZiCL = mysqli_escape_string($conn,$_POST['ziCL']);

         $xCL=checkdate($LunaCL,  $ZiCL, $AnCL);


	 if($AnCL==0000){
	 $_SESSION["Message"]="Ati sters data clasificarii autovehiculului cu numarul de circulatie $NrCirculatie!";
	 $sql="UPDATE autovehicule set DataExpCL=null,NrClasificare=null where IdAutovehicul='$Edit'";
         mysqli_query( $conn , $sql);
         header("Location:AdminVehicule.php");
         exit();
	 
         }	


         if(!$xCL){
         $_SESSION["Message"]="Ati introdus o data gresita pentru Clasificarea autovehiculului cu numarul de circulatie $NrCirculatie!";
         header("Location:AdminVehicule.php");
         exit();
    }

        else{
        $DataCL = $AnCL."/".$LunaCL."/".$ZiCL;
        }

   if(empty($NrCirculatie)||empty($NrClasificare)){
     	$_SESSION["Message"]="Completati toate campurile!";
     	header("Location:AdminVehicule.php");
     	exit();
     }   

     else{
     	
     $sql="UPDATE autovehicule set NrCirculatie='$NrCirculatie',DataExpCL='$DataCL',NrClasificare='$NrClasificare' where IdAutovehicul='$Edit'";


   $retval = mysqli_query(  $conn,$sql );

   if($retval){
   		  $_SESSION["Message"]="Datele autovehicului cu numarul de circulatie $NrCirculatie au fost modificate cu succes!";
		  header("Location:AdminVehicule.php");
		  exit();
	}



     }

}
/*
alta logica de elimare a alertei_p1
if(isset($_POST["alerta"])){
  $NrCirculatie=mysqli_escape_string($conn,$_POST['NrCirculatie']);
  $Edit=$_GET['Edit'];  
     $sql="UPDATE autovehicule set eliminaAlerta=1 where IdAutovehicul='$Edit'";


   $retval = mysqli_query(  $conn,$sql );
   if($retval){
        $_SESSION["Message"]="Alerta Clasificarii vehiculului cu numarul de circulatie $NrCirculatie a fost eliminata!";
      header("Location:AdminVehicule.php");
      exit();
  }
}

if(isset($_POST["alerta1"])){
  $NrCirculatie=mysqli_escape_string($conn,$_POST['NrCirculatie']);
  $Edit=$_GET['Edit'];  
     $sql="UPDATE autovehicule set eliminaAlerta=0 where IdAutovehicul='$Edit'";
 $retval = mysqli_query(  $conn,$sql );

    if($retval){
         $_SESSION["Message"]="Alerta Clasificarii vehiculului cu numarul de circulatie $NrCirculatie este activa!";
      header("Location:AdminVehicule.php");
      exit();
  }
}
*/

?>

<?php require_once("Include/header.php");?>


   <div class="col-sm-10">
                          <?php
    if ($_SESSION['rol']=='Editor Date Autovehicule'){

?>
   	<h1 class="text-center">Editare clasificare</h1>
   	<div><?php echo Message();?>

   	</div>


<?php

$VehiculId=$_GET['Edit'];

$sql="SELECT * FROM autovehicule where IdAutovehicul='$VehiculId' order by IdAutovehicul desc";

$query=mysqli_query($conn,$sql);
while($Data=mysqli_fetch_assoc($query)){
	$NrCirculatieEdit=$Data['NrCirculatie'];
  $NrClasificareEdit=$Data['NrClasificare'];
}

?>


	<form action="EditareVehiculCL.php?Edit=<?php echo $VehiculId ;?>" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
					<label for="NrCirculatie">Numar circulatie:</label>
					<input value="<?php echo $NrCirculatieEdit;?>" class="form-control" type="text" name="NrCirculatie" id="NrCirculatie" placeholder="NrCirculatie">
				</div>

        <div class="form-group">
          <label for="NrClasificare">Numar clasificare:</label>
          <input value="<?php echo $NrClasificareEdit;?>" class="form-control" type="text" name="NrClasificare" id="NrClasificare" placeholder="NrClasificare">
        </div>


			<div class="row">

                 <div class="col-sm-12">
        <div class="form-group">
          <label for="anCL">An expirare CL:(Daca doriti sa stergeti data, scrieti mai jos '0000')</label>
          <input class="form-control" type="text" name="anCL" id="anCL">
        </div>
          <div class="form-group">
          <label for="lunaCL">Luna expirare CL:</label>
          <input class="form-control" type="text" name="lunaCL" id="lunaCL">
        </div>
        <div class="form-group">
          <label for="ziCL">Zi expirare CL:</label>
          <input class="form-control" type="text" name="ziCL" id="ziCL">
        </div>

        </div>

      </div>

	<input class="btn btn-success btn-block" type="submit" name="submit" value="Editati datele pentru Clasificare" >
 <!-- 
<br>
<br>
<br>
<div class="text-center">
  <input class="btn btn-danger" type="submit" name="alerta" value="Elimina Alerta" >

alta logica de eliminare a alertei_p2
<input class="btn btn-warning " type="submit" name="alerta1" value="Arata Alerta" >

-->
				</fieldset>
</div>
			</form>
          <?php }
else{
  ?>
        <h1 class="text-center">Editare clasificare</h1>
<p class="warn">Nu aveti drepturi de editare.</p>
 
  <?php
}
?> 
</div>
</body>
</html>

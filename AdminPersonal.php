<?php
require_once("Include/Functions.php");
require_once("Include/DB.php");
VerificareLogare();

?>


<?php require_once("Include/header.php");?>

<?php

$sqlNr='SELECT * FROM personal';



 $qrs = mysqli_query( $conn ,$sqlNr);
 $NrAngajati=mysqli_num_rows($qrs);

?>
   <div class="col-sm-10">
   	<h1 class="text-center">Administrare Personal <span style="color:red">(<?php echo $NrAngajati;?> angajati)</span></h1>
   	 	<div><?php echo Message();?>

   	</div>


<div class="table-responsive">
 	<table class="table table-striped table-hover">
 		<tr>
 			<th>Nr</th>
 			<th>Nume</th>
 			<th>Functie</th>
 			<th>Data expirare fisa medicala</th>
 			<th>Data expirare aviz psihologic</th>
 			<th>Stergere</th>	
 		</tr>


<?php


$now=time();



$sqlCount='SELECT * FROM personal';
$Nr=0; 
$personalPagina=10;



 $rs = mysqli_query( $conn ,$sqlCount);
 $NrP=mysqli_num_rows($rs);

 $S=ceil($NrP/$personalPagina);
 if(!isset($_GET["Pagina"])){
				$Pagina=1;
			}
			else{
				$Pagina=$_GET["Pagina"];
			}


$Start=($Pagina-1)*$personalPagina;

$sql="SELECT * FROM personal order by Nume limit $Start,$personalPagina";	

 $q = mysqli_query( $conn ,$sql);
	
while($Data=mysqli_fetch_assoc($q)){
	$Id=$Data["IdPersonal"];
	$Nume=$Data["Nume"];
	$DataFM=$Data["DataExpFisaMed"];
	$DataAP=$Data["DataExpAP"];
	$Functie=$Data["Functie"];


$Nr++;
?>

<tr>
	<td><?php echo $Nr;?></td>
			<td><a href="PersonalInfo.php?idPersonal=<?php echo $Id;?>"><?php echo $Nume;?></a></td>
			<td><?php echo $Functie;?></td>
				<td class="smTxt"><?php if (!$DataFM) {
				echo "N/A";
			}
			else{ 
				echo $DataFM;
			
				?>
			<a href="EditarePersonalFM.php?Edit=<?php echo $Id;?>">
			<span class="btn btn-warning">Editare</span>
		    </a>
		    <?php
		    	}
		    ?>
			</td>
			<td class="smTxt"><?php if (!$DataAP) {
				echo "N/A";
			}
			else{ 
				echo $DataAP;
			
				?>
			<a href="EditarePersonalAP.php?Edit=<?php echo $Id;?>">
			<span class="btn btn-warning">Editare</span>
		    </a>
		    <?php
		    	}
		    ?>
			</td>
			
		
			<td>
			<a href="StergerePersonal.php?Delete=<?php echo $Id;?>">
			<span class="btn btn-danger" onclick="return confirm('Confirmati stergerea anagajatului?')">Stergere</span>
			</a>
		</td>
		
	</tr>



<?php 
 }
?>
 	</table>
 	 </div>

<div class="text-center">
 	 	<nav>
			<ul class="pagination pagination-lg">

				<?php
				if(isset($Pagina)){
				if($Pagina>1) {
				?>
				<li><a href="AdminPersonal.php?Pagina=<?php echo $Pagina-1;?>">&laquo;</a></li>
<?php } } ?>
		<?php

		for($i=1;$i<= $S;$i++){
			if(isset($Pagina)){

			if($i==$Pagina){


		?>

			<li class="active"><a href="AdminPersonal.php?Pagina=<?php echo $i;?>"><?php echo $i;?></a></li>
<?php }
	else{
?>
			    <li><a href="AdminPersonal.php?Pagina=<?php echo $i;?>"><?php echo $i;?></a></li>
	<?php }
	 }
     }

	?>
	<?php

				if(isset($Pagina)){
				if($Pagina< $S) {
				?>
				<li><a href="AdminPersonal.php?Pagina=<?php echo $Pagina+1;?>">&raquo;</a></li>
<?php } } ?>

		</ul>

	</nav>

</div>


	</div>
	


</div>


</div>



</body>
</html>

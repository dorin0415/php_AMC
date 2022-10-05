<?php
require_once("Include/Functions.php");
require_once("Include/DB.php");
VerificareLogare();

?>


<?php require_once("Include/header.php");?>


<?php

$sqlNr='SELECT * FROM autovehicule';



 $qrs = mysqli_query( $conn,$sqlNr );
 $NrA=mysqli_num_rows($qrs);

?>

   <div class="col-sm-10">
   	<h1 class="text-center">Administrare Vehicule <span style="color:red">(<?php echo $NrA?> vehicule)</span></h1>
   	 	<div><?php echo Message();?>

   	</div>


<div class="table-responsive">
 	<table class="table table-striped table-hover">
 		<tr>
 			<th>Nr</th>
 			<th>NrCirculatie</th>
 			<th>Tip Autovehicul</th>
 			<th>Marca Autovehicul</th>
 	    	<th>Data expirare ITP</th>
 			<th>Data expirare asigurare RCA</th>
 			<th>Data expirare tahograf</th>
 			<th>Data expirare rovigneta</th>
 			<th>Data expirare copie conforma</th>
 			<th>Data expirare ROTR</th>
 			<th>Data expirare asigurare Casco</th>
 			<th>Data expirare Clasificare</th>
 			<th>Data expirare asigurare bagaje</th>
 			<th>Data expirare asigurare incendii</th>
 			<th>Stergere</th>	
 		</tr>


<?php


$now=time();



$sqlCount='SELECT * FROM autovehicule';
$Nr=0; 
$VehiculePagina=10;



 $rs = mysqli_query( $conn,$sqlCount );
 $NrVehicule=mysqli_num_rows($rs);

 $S=ceil($NrVehicule/$VehiculePagina);
 if(!isset($_GET["Pagina"])){
				$Pagina=1;
			}
			else{
				$Pagina=$_GET["Pagina"];
			}


$Start=($Pagina-1)*$VehiculePagina;

$sql="SELECT * FROM autovehicule order by SUBSTRING(NrCirculatie,-3,LENGTH(NrCirculatie)),IdAutovehicul limit $Start,$VehiculePagina";	
 $q = mysqli_query( $conn,$sql );
	
while($Data=mysqli_fetch_assoc($q)){
	$Id=$Data["IdAutovehicul"];
	$Tip=$Data["Tip"];
	$MarcaTip=$Data["MarcaTip"];
	$NrCirculatie=$Data["NrCirculatie"];
	$DataExpITP=$Data["DataExpItp"];
	$DataExpAs=$Data["DataExpAsig"];
	$DataExpTah=$Data["DataExpTah"];
	$DataExpRov=$Data["DataExpRov"];
	$DataExpCC=$Data["DataExpCC"];
	$DataExpROTR=$Data["DataExpROTR"];
	$DataExpCasco=$Data["DataExpCasco"];
	$DataExpCL=$Data["DataExpCL"];
	$DataExpAB=$Data["DataExpAB"];
	$DataExpI=$Data["DataExpI"];


$Nr++;
?>

<tr>
		<td><?php echo $Nr;?></td>
			<td><a href="VehiculInfo.php?idVehicul=<?php echo $Id;?>"><?php echo $NrCirculatie;?></a></td>
			<td><?php echo $Tip;?></td>
			<td><?php echo $MarcaTip;?></td>
			<td><?php if (!$DataExpITP) {
				echo "N/A";
			}
			else{ 
				echo $DataExpITP;
			
				?>
			<a href="EditareVehiculItp.php?Edit=<?php echo $Id;?>">
				<span class="btn btn-warning">Editare</span></a>	

<?php 

} 

?>

			
		    
			</td>
			<td><?php if (!$DataExpAs) {
				echo "N/A";
			}
			else{ 
				echo $DataExpAs;
		
				?>
			<a href="EditareVehiculAs.php?Edit=<?php echo $Id;?>">
			<span class="btn btn-warning">Editare</span> </a>

			<?php 
				}
			?>
		   	
			</td>
			<td><?php if (!$DataExpTah) {
				echo "N/A";
			}
			else{ 
				echo $DataExpTah;
			
				?>
			<a href="EditareVehiculTah.php?Edit=<?php echo $Id;?>">
			<span class="btn btn-warning">Editare</span> </a>
			<?php 
			}
			?>
		   	
			</td>
				<td><?php if (!$DataExpRov) {
				echo "N/A";
			}
			else{ 
				echo $DataExpRov;
			
				?>
			<a href="EditareVehiculRov.php?Edit=<?php echo $Id;?>">
			<span class="btn btn-warning">Editare</span></a>
			<?php 
			}
			?>
		    	
			</td>
				<td><?php if (!$DataExpCC) {
				echo "N/A";
			}
			else{ 
				echo $DataExpCC;
			
				?>
			<a href="EditareVehiculCC.php?Edit=<?php echo $Id;?>">
			<span class="btn btn-warning">Editare</span>
			 </a>
			<?php 
			}
			?>
		   	
			</td>
				<td><?php if (!$DataExpROTR) {
				echo "N/A";
			}
			else{ 
				echo $DataExpROTR;
			
				?>
			<a href="EditareVehiculROTR.php?Edit=<?php echo $Id;?>">
					<span class="btn btn-warning">Editare</span>
					 </a>
				<?php 
			}
				?>
		
		   	
			</td>
			<td><?php if (!$DataExpCasco) {
				echo "N/A";
			}
			else{ 
				echo $DataExpCasco;
			
				?>
			<a href="EditareVehiculCasco.php?Edit=<?php echo $Id;?>">
			<span class="btn btn-warning">Editare</span>
		    </a>	
		    <?php 
				}
		    ?>
			</td>
			<td><?php if (!$DataExpCL) {
				echo "N/A";
			}
			else{ 
				echo $DataExpCL;
			
				?>
			<a href="EditareVehiculCL.php?Edit=<?php echo $Id;?>">
			<span class="btn btn-warning">Editare</span>
		    </a>	
		    <?php 
				}
			?>
			</td>
			<td><?php if (!$DataExpAB) {
				echo "N/A";
			}
			else{ 
				echo $DataExpAB;
			
				?>
			<a href="EditareVehiculAB.php?Edit=<?php echo $Id;?>">
			<span class="btn btn-warning">Editare</span>
		    </a>	
			<?php 
				}
			?>
			</td>
			<td><?php if (!$DataExpI) {
				echo "N/A";
			}
			else{ 
				echo $DataExpI;
			
				?>
			<a href="EditareVehiculI.php?Edit=<?php echo $Id;?>">
			<span class="btn btn-warning">Editare</span>
		    </a>	
		    <?php
		    	}
		    ?>
			</td>
			<td style="padding-top: 25px;">
			<a href="StergereVehicul.php?Delete=<?php echo $Id;?>">
			<span class="btn btn-danger" onclick="return confirm('Confirmati stergerea autovehiculului?')">Stergere</span>
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
				<li><a href="AdminVehicule.php?Pagina=<?php echo $Pagina-1;?>">&laquo;</a></li>
<?php } } ?>
		<?php

		for($i=1;$i<= $S;$i++){
			if(isset($Pagina)){

			if($i==$Pagina){


		?>

			<li class="active"><a href="AdminVehicule.php?Pagina=<?php echo $i;?>"><?php echo $i;?></a></li>
<?php }
	else{
?>
			    <li><a href="AdminVehicule.php?Pagina=<?php echo $i;?>"><?php echo $i;?></a></li>
	<?php }
	 }
     }

	?>
	<?php

				if(isset($Pagina)){
				if($Pagina< $S) {
				?>
				<li><a href="AdminVehicule.php?Pagina=<?php echo $Pagina+1;?>">&raquo;</a></li>
<?php } } ?>

		</ul>

	</nav>

</div>


	</div>
	


</div>


</div>



</body>
</html>

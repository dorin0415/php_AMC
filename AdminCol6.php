<?php
require_once("Include/Functions.php");
require_once("Include/DB.php");
VerificareLogare();
?>


<?php require_once("Include/header.php");?>


<?php

$sqlNr='SELECT * FROM soferi where NrColoana=6';



 $qrs = mysqli_query( $conn ,$sqlNr);
 $NrS6=mysqli_num_rows($qrs);

?>

   <div class="col-sm-10">
   	<h1 class="text-center">Administrare Soferi coloana administrativ <span style="color:red">(<?php echo $NrS6?> soferi)</span></h1>
   	 	<div><?php echo Message();?>

   	</div>



<div class="table-responsive">
 	<table class="table table-striped table-hover">
 		<tr>
 			<th>Nr</th>
 			<th>Nume</th>
 			<th>Data expirare carte identitate</th>
 			<th>Data expirare fisa medicala</th>
 			<th>Data expirare aviz psihologic</th>
 			<th>Data expirare atestat CE</th>
 			<th>Data expirare atestat DE</th>
 			<th>Data expirare permis BE</th>
			<th>Data expirare permis CE</th>	
			<th>Data expirare permis DE</th>			
 			<th>Stergere</th>	
 		</tr>


<?php


$now=time();


$sqlCount='SELECT * FROM soferi where NrColoana=6';
$Nr=0; 
$SoferiPagina=10;



 $rs = mysqli_query( $conn ,$sqlCount);
 $NrSoferi=mysqli_num_rows($rs);

 $S=ceil($NrSoferi/$SoferiPagina);
 if(!isset($_GET["Pagina"])){
				$Pagina=1;
			}
			else{
				$Pagina=$_GET["Pagina"];
			}


$Start=($Pagina-1)*$SoferiPagina;





$sql="SELECT * FROM soferi where NrColoana=6 order by Nume limit $Start,$SoferiPagina ";	
$q = mysqli_query( $conn ,$sql);
if (mysqli_num_rows($q) > 0) {


while($Data=mysqli_fetch_assoc($q)){
	$Id=$Data["IdSofer"];
	$Nume=$Data["Nume"];
	$DataExpFM=$Data["DataExpFisaMed"];
	$DataExpAP=$Data["DataExpAvizPsiho"];
	$DataExpA=$Data["DataExpAtestat"];
	$DataExpADE=$Data["DataExpAtestatDE"];
	$DataExpP=$Data["DataExpPermis"];
	$DataExpPCE=$Data["DataExpPermisCE"];
	$DataExpPDE=$Data["DataExpPermisDE"];
	$DataExpCI=$Data["DataExpCI"];



$Nr++;
?>

<tr>
		<td><?php echo $Nr;?></td>
			<td><a href="SoferInfoAdm.php?idSofer=<?php echo $Id;?>"><?php echo $Nume;?></a></td>
		<td class="smTxt"><?php if (!$DataExpCI) {
				echo "N/A";
			}
			else{ 
				echo $DataExpCI;
			
				?>
			<a href="EditareSoferCI.php?Edit=<?php echo $Id;?>">
			<span class="btn btn-warning">Editare</span>
		    </a>
		    <?php 
		    	}
		    ?>
			</td>
			<td class="smTxt"><?php if (!$DataExpFM) {
				echo "N/A";
			}
			else{ 
				echo $DataExpFM;
			
				?>
			<a href="EditareSoferFM.php?Edit=<?php echo $Id;?>">
			<span class="btn btn-warning">Editare</span>
		    </a>
		    <?php 
		    	}
		    ?>
			</td>
			<td class="smTxt"><?php if (!$DataExpAP) {
				echo "N/A";
			}
			else{ 
				echo $DataExpAP;
			
				?>
			<a href="EditareSoferAP.php?Edit=<?php echo $Id;?>">
			<span class="btn btn-warning">Editare</span>
		    </a>
		    <?php
		    	}
		   	?>
			</td>
			<td class="smTxt"><?php if (!$DataExpA) {
				echo "N/A";
			}
			else{ 
				echo $DataExpA;
			
				?>
			<a href="EditareSoferA.php?Edit=<?php echo $Id;?>">
			<span class="btn btn-warning">Editare</span>
		    </a>	
		    <?php
		    	}
		    ?>
			</td>

				<td class="smTxt"><?php if (!$DataExpADE) {
				echo "N/A";
			}
			else{ 
				echo $DataExpADE;
			
				?>
			<a href="EditareSoferADE.php?Edit=<?php echo $Id;?>">
			<span class="btn btn-warning">Editare</span>
		    </a>	
		    <?php
		    	}
		    ?>
			</td>


			<td class="smTxt"><?php if (!$DataExpP) {
				echo "N/A";
			}
			else{ 
				echo $DataExpP;
			
				?>
			<a href="EditareSoferP.php?Edit=<?php echo $Id;?>">
			<span class="btn btn-warning">Editare</span>
		    </a>	
		    <?php
		    	}
		    ?>
			</td>
			<td class="smTxt"><?php if (!$DataExpPCE) {
				echo "N/A";
			}
			else{ 
				echo $DataExpPCE;
			
				?>
			<a href="EditareSoferPCE.php?Edit=<?php echo $Id;?>">
			<span class="btn btn-warning">Editare</span>
		    </a>	
		    <?php
		    	}
		    ?>
			</td>
			<td class="smTxt"><?php if (!$DataExpPDE) {
				echo "N/A";
			}
			else{ 
				echo $DataExpPDE;
			
				?>
			<a href="EditareSoferPDE.php?Edit=<?php echo $Id;?>">
			<span class="btn btn-warning">Editare</span>
		    </a>	
		    <?php
		    	}
		    ?>
			</td>
			<td>
			<a href="StergereSofer.php?Delete=<?php echo $Id;?>">
			<span class="btn btn-danger" onclick="return confirm('Confirmati stergerea soferului?')">Stergere</span>
			</a>
		</td>
		
	</tr>



<?php 
 }
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
				<li><a href="AdminCol6.php?Pagina=<?php echo $Pagina-1;?>">&laquo;</a></li>
<?php } } ?>
		<?php


		for($i=1;$i<= $S;$i++){
			if(isset($Pagina)){

			if($i==$Pagina){


		?>

			<li class="active"><a href="AdminCol6.php?Pagina=<?php echo $i;?>"><?php echo $i;?></a></li>
<?php }
	else{
?>
			    <li><a href="AdminCol6.php?Pagina=<?php echo $i;?>"><?php echo $i;?></a></li>
	<?php }
	 }
     }
	 
	?>
	<?php

				if(isset($Pagina)){
				if($Pagina< $S) {
				?>
				<li><a href="AdminCol6.php?Pagina=<?php echo $Pagina+1;?>">&raquo;</a></li>
<?php } } ?>

		</ul>

	</nav>

</div>

		
	</div>



</div>


</div>



</body>
</html>		
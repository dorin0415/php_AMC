<?php
require_once("Include/Functions.php");
require_once("Include/DB.php");
VerificareLogare();
?>


<?php require_once("Include/header.php");?>


   <div class="col-sm-10">
   	<h1 class="text-center">Administrare Soferi coloana 4</h1>
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
 			<th>Data expirare atestat</th>
 			<th>Data expirare permis</th>		
 			<th>Stergere</th>	
 		</tr>


<?php


$now=time();


$sqlCount='SELECT * FROM soferi where NrColoana=6';
$Nr=0; 
$SoferiPagina=10;

mysql_select_db('test');

 $rs = mysql_query( $sqlCount, $conn );
 $NrSoferi=mysql_num_rows($rs);

 $S=ceil($NrSoferi/$SoferiPagina);
 if(!isset($_GET["Pagina"])){
				$Pagina=1;
			}
			else{
				$Pagina=$_GET["Pagina"];
			}


$Start=($Pagina-1)*$SoferiPagina;





$sql="SELECT * FROM soferi where NrColoana=6 order by Nume limit $Start,$SoferiPagina ";	
$q = mysql_query( $sql, $conn );
if (mysql_num_rows($q) > 0) {


while($Data=mysql_fetch_assoc($q)){
	$Id=$Data["IdSofer"];
	$Nume=$Data["Nume"];
	$DataFM=$Data["DataExpFisaMed"];
	$DataAP=$Data["DataExpAvizPsiho"];
	$DataA=$Data["DataExpAtestat"];
	$DataP=$Data["DataExpPermis"];
	$DataCI=$Data["DataExpCI"];



$Nr++;
?>

<tr>
		<td><?php echo $Nr;?></td>
			<td><a href="SoferInfo.php?idSofer=<?php echo $Id;?>"><?php echo $Nume;?></a></td>
			<td><?php echo $DataCI;?>
			<a href="EditareSoferCI.php?Edit=<?php echo $Id;?>">
			<span class="btn btn-warning">Editare</span>
		    </a>
			</td>
			<td><?php echo $DataFM;?>
			<a href="EditareSoferFM.php?Edit=<?php echo $Id;?>">
			<span class="btn btn-warning">Editare</span>
		    </a>
			</td>
			<td><?php echo $DataAP;?>
			<a href="EditareSoferAP.php?Edit=<?php echo $Id;?>">
			<span class="btn btn-warning">Editare</span>
		    </a>
			</td>
			<td><?php echo $DataA;?>
			<a href="EditareSoferA.php?Edit=<?php echo $Id;?>">
			<span class="btn btn-warning">Editare</span>
		    </a>	
			</td>
			<td><?php echo $DataP;?>
			<a href="EditareSoferP.php?Edit=<?php echo $Id;?>">
			<span class="btn btn-warning">Editare</span>
		    </a>	
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
<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
?>


<?php require_once("Include/header.php");?>


<div class="col-sm-10">
<div class="row">
		<?php

			$IdFromURL=$_GET["idSofer"];
		$sql="SELECT * FROM soferi where IdSofer='$IdFromURL'";
		 
		$query=mysqli_query($conn,$sql);
		while($Data=mysqli_fetch_assoc($query)){
			$Id=$Data["IdSofer"];
			$Nume=$Data["Nume"];
			$DataM=$Data["DataExpFisaMed"];
			$DataAP=$Data["DataExpAvizPsiho"];
			$DataA=$Data["DataExpAtestat"];
			$DataADE=$Data["DataExpAtestatDE"];
			$DataP=$Data["DataExpPermis"];
			$DataCI=$Data["DataExpCI"];
			$NrColoana=$Data["NrColoana"];

		?>


<div class="col-sm-3">
		<div class="text-center paddB">
			
				<div class="identificare">
				<p>Nume:<span class="blue"><?php echo $Nume;?></span></p>
				<p>Coloana:<span class="blue">
						<?php if ($NrColoana==6) {

				 echo "Administrativa";?>
				 	<a href="EditareNrColoana.php?Edit=<?php echo $Id;?>">
					<span class="btn btn-warning">Editare</span>
		    		</a>	
<?php
				 }
				else{
					echo $NrColoana;?>

						<a href="EditareNrColoana.php?Edit=<?php echo $Id;?>">
					<span class="btn btn-warning">Editare</span>
		    		</a>	
					
					<?php
				}?>

				</span>
			</p>
				</div>
				<p>Data expirare carte identitate:<span class="red"><?php echo $DataCI;?></span>
					<a href="EditareSoferCI.php?Edit=<?php echo $Id;?>">
					<span class="btn btn-warning">Editare</span>
		    		</a>	
				</p>
		</div>




	</div>

<div class="col-sm-5">
		<div class="text-center paddB">
		
				<p>Data expirare fisa medicala:<span class="red"><?php echo $DataM;?></span>
					<a href="EditareSoferFM.php?Edit=<?php echo $Id;?>">
					<span class="btn btn-warning">Editare</span>
		    		</a>	
				</p>
				<p>Data expirare aviz psihologic:<span class="red"><?php echo $DataAP;?></span>
					<a href="EditareSoferAP.php?Edit=<?php echo $Id;?>">
					<span class="btn btn-warning">Editare</span>
		    		</a>
				</p>
				


		</div>

	</div>



	<div class="col-sm-4">
		<div class="text-center paddB">

				<p>Data expirare atestat:<span class="red"><?php echo $DataA;?></span>
					<a href="EditareSoferA.php?Edit=<?php echo $Id;?>">
					<span class="btn btn-warning">Editare</span>
		    		</a>
				</p>
				<p>Data expirare permis:<span class="red"><?php echo $DataP;?></span>
					<a href="EditareSoferP.php?Edit=<?php echo $Id;?>">
					<span class="btn btn-warning">Editare</span>
		    		</a>
				</p>

		</div>

	</div>
<div class="row">
	<div class=" text-center paddB">
	<a href="StergereSofer.php?Delete=<?php echo $Id;?>">
			<span class="btn btn-danger" onclick="return confirm('Confirmati stergerea soferului?')">Stergere</span>
			</a>
			</div>
</div>





<?php } ?>
</div>
</div>
</div>
</body>
</html>

<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
?>


<?php require_once("Include/header.php");?>


<div class="col-sm-10">
<div class="row">
		<?php

			$IdFromURL=$_GET["idPersonal"];
		$sql="SELECT * FROM personal where IdPersonal='$IdFromURL'";
		 
		$query=mysqli_query($conn,$sql);
		while($Data=mysqli_fetch_assoc($query)){
			$Id=$Data["IdPersonal"];
			$Nume=$Data["Nume"];
			$DataM=$Data["DataExpFisaMed"];
			$DataAP=$Data["DataExpAP"];
			$Functie=$Data["Functie"];

		?>


<div class="col-sm-6">
		<div class="text-center paddB">
			
				<div class="identificare">
				<p>Nume Sofer:<span class="blue"><?php echo $Nume;?></span></p>
				<p>Functie:<span class="blue"><?php echo $Functie;?></span></p>
				</div>
				
		</div>




	</div>

<div class="col-sm-6">
		<div class="text-center paddB">
		
				<p>Data expirare fisa medicala:<span class="red"><?php echo $DataM;?></span>
					<a href="EditarePersonalFM.php?Edit=<?php echo $Id;?>">
					<span class="btn btn-warning">Editare</span>
		    		</a>	
				</p>
				<p>Data expirare aviz psihologic:<span class="red"><?php echo $DataAP;?></span>
					<a href="EditarePersonalAP.php?Edit=<?php echo $Id;?>">
					<span class="btn btn-warning">Editare</span>
		    		</a>
				</p>

		</div>

	</div>




<div class="row">
	<div class=" text-center paddB">
	<a href="StergerePersonal.php?Delete=<?php echo $Id;?>">
			<span class="btn btn-danger" onclick="return confirm('Confirmati stergerea angajatului?')">Stergere</span>
			</a>
			</div>
</div>
<?php } ?>
</div>
</div>
</div>
</body>
</html>

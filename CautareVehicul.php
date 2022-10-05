<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
  VerificareLogare();
?>


<?php require_once("Include/header.php");?>



	<div class="col-sm-10">		
		  	<h1 class="text-center">Cautare Vehicul</h1>
		<?php

		$Search=0;
		$Nr=0;

		if(isset($_GET["SearchButton"])){
			
		$Search = $_GET["Search"];
		


	}
	if($Search){
		$sql="SELECT * FROM autovehicule where NrCirculatie like '%$Search%'";
	}
			else{
				echo "<p class='ErrCautare'>Introduceti numarul de circulatie al autovehiculului!</p>";
			$sql="SELECT * FROM autovehicule where NrCirculatie = '$Search'";	
			 	}

	   
		 $retval = mysqli_query(  $conn,$sql );
		
		 while($Data=mysqli_fetch_assoc($retval)){
			$VehiculId=$Data["IdAutovehicul"];
			$NrCirculatie=$Data['NrCirculatie'];
			$Nr++;	
	?>

	<a href="VehiculInfo.php?idVehicul=<?php echo $VehiculId;?>">
		<h3><?php echo $NrCirculatie;?></h3>
	</a>

		<?php } 

		if ($Nr<1 && $Search) {
			echo "<p class='ErrCautare'>Numarul de circulatie introdus nu exista in baza de date!</p>";

		}

		?>

	
		<form action="CautareVehicul.php">
		<div class="form-group paddB">
			<input type="text" class="form-control" name="Search">
		</div>
		<button class="btn btn-primary" name="SearchButton">Cautare vehicul</button>
</form>
</div>
	</div>

			</div>

</div>
</div>

</body>
</html>

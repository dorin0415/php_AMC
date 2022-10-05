<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
  VerificareLogare();
?>


<?php require_once("Include/header.php");?>


	<div class="col-sm-10">
		<h1 class="text-center">Cautare Sofer</h1>
		<?php

		$Search=0;
		$Nr=0;

		if(isset($_GET["Search1"])){

		$Search = $_GET["Search1"];

	}

	if($Search){
		$sql="SELECT * FROM soferi where nume like '%$Search%'";
	}
			else{
				echo "<p class='ErrCautare'>Introduceti numele soferului!</p>";
			$sql="SELECT * FROM soferi where nume  = '$Search'";
			 	}


		 
		 $retval = mysqli_query( $conn , $sql);
		
		 while($Data=mysqli_fetch_assoc($retval)){
			$SoferId=$Data["IdSofer"];
			$Nume=$Data['Nume'];
			$Nr++;	
	?>

	
							<a href="SoferInfo.php?idSofer=<?php echo $SoferId;?>">
							  <h3><?php echo $Nume;?></h3>
				                </a>



		<?php } 

		if ($Nr<1 && $Search) {
			echo "<p class='ErrCautare'>Numele introdus nu exista in baza de date!</p>";

		}

		?>


		<form action="CautareSofer.php">
		<div class="form-group paddB">
			<input type="text" class="form-control" name="Search1">
		</div>
		<button class="btn btn-primary" name="SearchButton1">Cautare sofer</button>
</form>
</div>
	
		</div>
	</div>
</div>
</div>
</body>
</html>

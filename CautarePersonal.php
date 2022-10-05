<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
  VerificareLogare();
?>


<?php require_once("Include/header.php");?>



	<div class="col-sm-10">
		<h1 class="text-center">Cautare angajat</h1>
		<?php

		$Search=0;
		$Nr=0;

		if(isset($_GET["Search1"])){

		$Search = $_GET["Search1"];

	}

	if($Search){
		$sql="SELECT * FROM personal where Nume like '%$Search%'";
	}
			else{
				echo "<p class='ErrCautare'>Introduceti numele angajatului!</p>";
			$sql="SELECT * FROM personal where Nume  = '$Search'";
			 	}


		
		 $retval = mysqli_query(  $conn,$sql );
		
		 while($Data=mysqli_fetch_assoc($retval)){
			$PersonalId=$Data["IdPersonal"];
			$Nume=$Data['Nume'];
			$Nr++;	
	?>

	
							<a href="PersonalInfo.php?idPersonal=<?php echo $PersonalId;?>">
							  <h3><?php echo $Nume;?></h3>
				                </a>



		<?php } 

		if ($Nr<1 && $Search) {
			echo "<p class='ErrCautare'>Numele introdus nu exista in baza de date!</p>";

		}

		?>


		<form action="CautarePersonal.php">
		<div class="form-group paddB">
			<input type="text" class="form-control" name="Search1">
		</div>
		<button class="btn btn-primary" name="SearchButton1">Cautare angajat</button>
</form>
</div>

		</div>
	</div>
</div>
</div>
</body>
</html>

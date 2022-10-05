  <?php require_once("Include/HeaderAlertePersonal.php");?>




      	<h3 class="subtitlu">Alerte aviz psihologic</h3>	

<?php
$sqlSelect='SELECT Nume,DataExpAP FROM personal order by DataExpAP desc';
 



 $rs = mysqli_query(  $conn ,$sqlSelect);
$now = time(); 
if (mysqli_num_rows($rs) > 0) {
    while($row = mysqli_fetch_assoc($rs)) {
      $DataAP=$row['DataExpAP'];
      if ($DataAP) {
      $Nume=$row['Nume'];
     $your_date = strtotime($DataAP);
      $datediff = $now - $your_date;
      $x=round($datediff / (60 * 60 * 24))-1;


      if($x!=1 && $x!=-1 && $x>=-30 && $x<=-2){

      	?>


   
     <p class="padd"><?php echo "Avizul psihologic al angajatului <span class='bold'>$Nume</span> expira pe data de <span class='bold'>$DataAP</span>.Se recomanda innoirea acesteia in cel mai scurt timp.";

       ?>
   </p>
   <?php  } 
  
      elseif($x==-1){
      	?>

      <p class="padd">	<?php
       echo "Avizul psihologic al angajatului <span class='bold'>$Nume</span> expira pe data de <span class='bold'>$DataAP</span>.Se recomanda innoirea acesteia in cel mai scurt timp.";  

       ?></p>
   <?php  }  

      elseif($x==1){ 
      	?>

     <p class="padd"><?php
       echo "Avizul psihologic al angajatului <span class='bold'>$Nume</span> a expirat pe data de <span class='bold'>$DataAP</span>.Se recomanda innoirea acesteia in cel mai scurt timp.";
       ?>
   </p>
   <?php  }

     elseif($x<-30){


    }

     elseif($x>1){
     	?>

        <p class="padd">	<?php
      echo "Avizul psihologic al angajatului <span class='bold'>$Nume</span> a expirat pe data de <span class='bold'>$DataAP</span>.Se recomanda innoirea acesteia in cel mai scurt timp."; 

      ?></p>
    <?php }
     else{

     	?>
   
     <p class="padd"><?php
      echo "Avizul psihologic al angajatului <span class='bold'>$Nume</span>  a expirat pe data de <span class='bold'>$DataAP</span> .Se recomanda innoirea acesteia in cel mai scurt timp.";  

       ?>
   </p>
 <?php    }
     

}

}
}




?>

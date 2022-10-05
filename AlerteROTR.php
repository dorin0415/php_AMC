        <?php require_once("Include/HeaderAlerteVehicule.php");?>


		<h3 class="subtitlu">Alerte ROTR</h3>
		<p class="padd">Alerte ascunse :)</p>	
		

<?php

/*

$sqlSelect='SELECT NrCirculatie,DataExpROTR FROM autovehicule order by DataExpROTR desc';
 



 $rs = mysqli_query(  $conn ,$sqlSelect);
$now = time(); 
if (mysqli_num_rows($rs) > 0) {

    while($row = mysqli_fetch_assoc($rs)) {
      $DataROTR=$row['DataExpROTR'];
      if ($DataROTR) {
      $NrCirculatie=$row['NrCirculatie'];
     $your_date = strtotime($DataROTR);
      $datediff = $now - $your_date;
      $x=round($datediff / (60 * 60 * 24))-1;


      if($x!=1 && $x!=-1 && $x>=-30 && $x<=-2){

      	?>

     <p class="padd"><?php echo "ROTR ul autovehiculului cu numarul de circulatie <span class='bold'>$NrCirculatie</span> expira pe data de <span class='bold'>$DataROTR</span>.Se recomanda innoirea acestuia in cel mai scurt timp.";
       ?>
   </p>
   <?php  } 
      elseif($x==-1){

      	?>

      <p class="padd">	<?php
       echo "ROTR ul autovehiculului cu numarul de circulatie <span class='bold'>$NrCirculatie</span> expira pe data de <span class='bold'>$DataROTR</span>.Se recomanda innoirea acestuia in cel mai scurt timp.";  
       ?></p>
   <?php  }  

      elseif($x==1){ 
      	?>

     <p class="padd"><?php
       echo "ROTR ul autovehiculului cu numarul de circulatie <span class='bold'>$NrCirculatie</span> a expirat pe data de <span class='bold'>$DataROTR</span>.Se recomanda innoirea acestuia in cel mai scurt timp.";  
       ?>
   </p>
   <?php  }

     elseif($x<-30){

    }

     elseif($x>1){
     	?>

        <p class="padd">	<?php
      echo "ROTR ul autovehiculului cu numarul de circulatie <span class='bold'>$NrCirculatie</span> a expirat pe data de <span class='bold'>$DataROTR</span>.Se recomanda innoirea acestuia in cel mai scurt timp."; 
      ?></p>
    <?php }
     else{

     	?>
    
     <p class="padd"><?php
      echo "ROTR ul autovehiculului cu numarul de circulatie <span class='bold'>$NrCirculatie</span> a expirat pe data de <span class='bold'>$DataROTR</span>.Se recomanda innoirea acestuia in cel mai scurt timp.";  
       ?>
   </p>
 <?php    }



}
}
}
*/


?>

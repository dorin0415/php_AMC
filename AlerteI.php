        <?php require_once("Include/HeaderAlerteVehicule.php");?>


      		<h3 class="subtitlu">Alerte Incendii</h3>	

<?php
$sqlSelect='SELECT NrCirculatie,DataExpI FROM autovehicule order by DataExpI desc';
 



 $rs = mysqli_query( $conn, $sqlSelect );
$now = time(); 
if (mysqli_num_rows($rs) > 0) {
    
    while($row = mysqli_fetch_assoc($rs)) {
      $DataI=$row['DataExpI'];
      if ($DataI) {
      $NrCirculatie=$row['NrCirculatie'];
     $your_date = strtotime($DataI);
      $datediff = $now - $your_date;
      $x=round($datediff / (60 * 60 * 24))-1;


      if($x!=1 && $x!=-1 && $x>=-30 && $x<=-2){

      	?>



     <p class="padd"><?php echo "Asigurarea pentru incendii a autovehiculului cu numarul de circulatie <span class='bold'>$NrCirculatie</span> expira pe data de <span class='bold'>$DataI</span>.Se recomanda innoirea acesteia in cel mai scurt timp.";
       ?>
   </p>
   <?php  } 
  
      elseif($x==-1){

      	?>

      <p class="padd"><?php
       echo "Asigurarea pentru incendii a autovehiculului cu numarul de circulatie <span class='bold'>$NrCirculatie</span> expira pe data de <span class='bold'>$DataI</span>.Se recomanda innoirea acesteia in cel mai scurt timp.";  
       ?></p>
   <?php  }  

      elseif($x==1){ 
      	?>

     <p class="padd"><?php
       echo "Asigurarea pentru incendii a autovehiculului cu numarul de circulatie <span class='bold'>$NrCirculatie</span> a expirat pe data de <span class='bold'>$DataI</span>.Se recomanda innoirea acesteia in cel mai scurt timp.";  
       ?>
   </p>
   <?php  }

     elseif($x<-30){

    }

     elseif($x>1){

     	?>

        <p class="padd">	<?php
      echo "Asigurarea pentru incendii a autovehiculului cu numarul de circulatie <span class='bold'>$NrCirculatie</span> a expirat pe data de <span class='bold'>$DataI</span>.Se recomanda innoirea acesteia in cel mai scurt timp."; 
      ?></p>
    <?php }
     else{


     	?>

     <p class="padd"><?php
      echo "Asigurarea pentru incendii a autovehiculului cu numarul de circulatie <span class='bold'>$NrCirculatie</span> a expirat pe data de <span class='bold'>$DataI</span>.Se recomanda innoirea acesteia in cel mai scurt timp.";  
       ?>
   </p>
 <?php    }

}
}
}



?>

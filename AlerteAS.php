        <?php require_once("Include/HeaderAlerteVehicule.php");?>


      		<h3 class="subtitlu">Alerte Asigurare RCA</h3>	

<?php
$sqlSelect='SELECT NrCirculatie,DataExpAsig FROM autovehicule order by DataExpAsig desc';
 



 $rs = mysqli_query($conn ,$sqlSelect);
$now = time(); 
if (mysqli_num_rows($rs) > 0) {
    
    while($row = mysqli_fetch_assoc($rs)) {
      $DataAs=$row['DataExpAsig'];
      $NrCirculatie=$row['NrCirculatie'];
      if($DataAs){
      $your_date = strtotime($DataAs);
      $datediff = $now - $your_date;
      $x=round($datediff / (60 * 60 * 24))-1;


      if($x!=1 && $x!=-1 && $x>=-30 && $x<=-2){
     
      	?>



     <p class="padd"><?php echo "Asigurarea RCA a autovehiculului cu numarul de circulatie <span class='bold'>$NrCirculatie</span> expira pe data de <span class='bold'>$DataAs</span>.Se recomanda innoirea acesteia in cel mai scurt timp.";
       ?>
   </p>
   <?php  } 

      elseif($x==-1){

      	?>

      <p class="padd">	<?php
       echo "Asigurarea RCA a autovehiculului cu numarul de circulatie <span class='bold'>$NrCirculatie</span> expira pe data de <span class='bold'>$DataAs</span>.Se recomanda innoirea acesteia in cel mai scurt timp.";  
       ?></p>
   <?php  }  

      elseif($x==1){ 
      	?>
    
     <p class="padd"><?php
       echo "Asigurarea RCA a autovehiculului cu numarul de circulatie <span class='bold'>$NrCirculatie</span> a expirat pe data de <span class='bold'>$DataAs</span>.Se recomanda innoirea acesteia in cel mai scurt timp.";  
       ?>
   </p>
   <?php  }
      
    
     elseif($x<-30){

    }

     elseif($x>1){

     	?>

        <p class="padd">	<?php
      echo "Asigurarea RCA a autovehiculului cu numarul de circulatie <span class='bold'>$NrCirculatie</span> a expirat pe data de <span class='bold'>$DataAs</span>.Se recomanda innoirea acesteia in cel mai scurt timp."; 
      ?></p>
    <?php }
     else{
      
     	?>

     <p class="padd"><?php
      echo "Asigurarea RCA a autovehiculului cu numarul de circulatie <span class='bold'>$NrCirculatie</span> a expirat pe data de <span class='bold'>$DataAs</span>.Se recomanda innoirea acesteia in cel mai scurt timp.";  
       ?>
   </p>
 <?php    }


}

}
}



?>

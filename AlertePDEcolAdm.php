      <?php require_once("Include/HeaderAlerteSoferi.php");?>	


  <h3 class="subtitlu">Alerte permis DE coloana administrativa</h3>	

<?php
$sqlSelect='SELECT Nume,DataExpPermisDE FROM soferi where NrColoana=6 order by DataExpPermisDE desc';
 



 $rs = mysqli_query(  $conn , $sqlSelect);
$now = time(); 
if (mysqli_num_rows($rs) > 0) {
    while($row = mysqli_fetch_assoc($rs)) {
      $DataP=$row['DataExpPermisDE'];
      $Nume=$row['Nume'];
      if ($DataP) {

     $your_date = strtotime($DataP);
      $datediff = $now - $your_date;
      $x=round($datediff / (60 * 60 * 24))-1;

      if($x!=1 && $x!=-1 && $x>=-30 && $x<=-2){

      	?>



     <p class="padd"><?php echo "Permisul soferului <span class='bold'>$Nume</span> expira pe data de <span class='bold'>$DataP</span>.Se recomanda innoirea acestuia in cel mai scurt timp.";
       ?>
   </p>
   <?php  } 

      elseif($x==-1){
      	?>

      <p class="padd">	<?php
       echo "Permisul soferului <span class='bold'>$Nume</span> expira pe data de <span class='bold'>$DataP</span>.Se recomanda innoirea acestuia in cel mai scurt timp.";  
       ?></p>
   <?php  }  

      elseif($x==1){ 
      	?>

     <p class="padd"><?php
       echo "Permisul soferului <span class='bold'>$Nume</span> a expirat pe data de <span class='bold'>$DataP</span>.Se recomanda innoirea acestuia in cel mai scurt timp.";  
       ?>
   </p>
   <?php  }

     elseif($x<-30){

    }

     elseif($x>1){
     	?>
 
        <p class="padd"><?php
      echo "Permisul soferului <span class='bold'>$Nume</span> a expirat pe data de <span class='bold'>$DataP</span>.Se recomanda innoirea acestuia in cel mai scurt timp."; 
      ?></p>
    <?php }
     else{

     	?>
 
     <p class="padd"><?php
      echo "Permisul soferului <span class='bold'>$Nume</span> a expirat pe data de <span class='bold'>$DataP</span>.Se recomanda innoirea acestuia in cel mai scurt timp.";  
       ?>
   </p>
 <?php    }

}

}

}







?>

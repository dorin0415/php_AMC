        <?php require_once("Include/HeaderAlerteSoferi.php");?>


      		<h3 class="subtitlu">Alerte atestat coloana 2</h3>	

<?php


   $sqlSelect='SELECT Nume,DataExpAtestat FROM soferi where NrColoana=2 order by DataExpAtestat desc';
 



 $rs = mysqli_query( $conn ,$sqlSelect);
$now = time(); 

if (mysqli_num_rows($rs) > 0) {
    while($row = mysqli_fetch_assoc($rs)) {
      $DataA=$row['DataExpAtestat'];
      $Nume=$row['Nume'];
      if ($DataA) {

     $your_date = strtotime($DataA);
      $datediff = $now - $your_date;
      $x=round($datediff / (60 * 60 * 24))-1;
    
      if($x!=1 && $x!=-1 && $x>=-30 && $x<=-2){

      	?>



     <p class="padd"><?php echo "Atestatul soferului <span class='bold'>$Nume</span> expira pe data de <span class='bold'>$DataA</span>.Se recomanda innoirea acestuia in cel mai scurt timp.";
       ?>
   </p>
   <?php  } 

      elseif($x==-1){
      
      	?>

      <p class="padd">	<?php
       echo "Atestatul soferului <span class='bold'>$Nume</span> expira pe data de <span class='bold'>$DataA</span>.Se recomanda innoirea acestuia in cel mai scurt timp.";  
       ?></p>
   <?php  }  

      elseif($x==1){ 
      
      	?>
    
     <p class="padd"><?php
       echo "Atestatul soferului <span class='bold'>$Nume</span> a expirat pe data de <span class='bold'>$DataA</span>.Se recomanda innoirea acestuia in cel mai scurt timp.";  
       ?>
   </p>
   <?php  }

     elseif($x<-30){

    }

     elseif($x>1){
    
     	?>

        <p class="padd">	<?php
      echo "Atestatul soferului <span class='bold'>$Nume</span> a expirat pe data de <span class='bold'>$DataA</span>.Se recomanda innoirea acestuia in cel mai scurt timp."; 
      ?></p>
    <?php }
     else{
     
     	?>
   
     <p class="padd"><?php
      echo "Atestatul soferului <span class='bold'>$Nume</span> a expirat pe data de <span class='bold'>$DataA</span>.Se recomanda innoirea acestuia in cel mai scurt timp.";  
       ?>
   </p>
 <?php 
   }


}
}
}




?>

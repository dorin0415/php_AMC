  <?php require_once("Include/HeaderAlerteSoferi.php");?>




      	<h3 class="subtitlu">Alerte Carte Identitate coloana administrativa</h3>	

<?php
$sqlSelect='SELECT Nume,DataExpCI FROM soferi where NrColoana=6 order by DataExpCI desc';
 



 $rs = mysqli_query(  $conn , $sqlSelect);
$now = time(); 
if (mysqli_num_rows($rs) > 0) {
    while($row = mysqli_fetch_assoc($rs)) {
      $DataCI=$row['DataExpCI'];
      if ($DataCI) {
      $Nume=$row['Nume'];
     $your_date = strtotime($DataCI);
      $datediff = $now - $your_date;
      $x=round($datediff / (60 * 60 * 24))-1;
    
      if($x!=1 && $x!=-1 && $x>=-30 && $x<=-2){
       
      	?>


   
     <p class="padd"><?php echo "Cartea de identitate a soferului <span class='bold'>$Nume</span> expira pe data de <span class='bold'>$DataCI</span>.Se recomanda innoirea acesteia in cel mai scurt timp.";

       ?>
   </p>
   <?php  } 
  
      elseif($x==-1){
       
      	?>

      <p class="padd">	<?php
       echo "Cartea de identitate a soferului <span class='bold'>$Nume</span> expira pe data de <span class='bold'>$DataCI</span>.Se recomanda innoirea acesteia in cel mai scurt timp.";  

       ?></p>
   <?php  }  

      elseif($x==1){ 
        
      	?>

     <p class="padd"><?php
       echo "Cartea de identitate a soferului <span class='bold'>$Nume</span> a expirat pe data de <span class='bold'>$DataCI</span>.Se recomanda innoirea acesteia in cel mai scurt timp.";
       ?>
   </p>
   <?php  }

     elseif($x<-30){


    }

     elseif($x>1){
    
     	?>

        <p class="padd">	<?php
      echo "Cartea de identitate a soferului <span class='bold'>$Nume</span> a expirat pe data de <span class='bold'>$DataCI</span>.Se recomanda innoirea acesteia in cel mai scurt timp."; 

      ?></p>
    <?php }
     else{
 
     	?>
   
     <p class="padd"><?php
      echo "Cartea de identitate a soferului <span class='bold'>$Nume a expirat pe data de <span class='bold'>$DataCI.Se recomanda innoirea acesteia in cel mai scurt timp.";  

       ?>
   </p>
 <?php    }
     

}

}
}




?>

  <?php require_once("Include/HeaderAlerteSoferi.php");?>




      	<h3 class="subtitlu">Alerte fisa medicala coloana 2</h3>	

<?php
$sqlSelect='SELECT Nume,DataExpFisaMed FROM soferi where NrColoana=2 order by DataExpFisaMed desc';
 

 

 $rs = mysqli_query(  $conn ,$sqlSelect);
$now = time(); 
if (mysqli_num_rows($rs) > 0) {
    while($row = mysqli_fetch_assoc($rs)) {
      $DataM=$row['DataExpFisaMed'];
      if ($DataM) {
      $Nume=$row['Nume'];
     $your_date = strtotime($DataM);
      $datediff = $now - $your_date;
      $x=round($datediff / (60 * 60 * 24))-1;


      if($x!=1 && $x!=-1 && $x>=-30 && $x<=-2){

      	?>


   
     <p class="padd"><?php echo "Fisa medicala a soferului <span class='bold'>$Nume</span> expira pe data de <span class='bold'>$DataM</span>.Se recomanda innoirea acesteia in cel mai scurt timp.";

       ?>
   </p>
   <?php  } 
  
      elseif($x==-1){
      	?>

      <p class="padd">	<?php
       echo "Fisa medicala a soferului <span class='bold'>$Nume</span> expira pe data de <span class='bold'>$DataM</span>.Se recomanda innoirea acesteia in cel mai scurt timp.";  

       ?></p>
   <?php  }  

      elseif($x==1){ 
      	?>

     <p class="padd"><?php
       echo "Fisa medicala a soferului <span class='bold'>$Nume</span> a expirat pe data de <span class='bold'>$DataM</span>.Se recomanda innoirea acesteia in cel mai scurt timp.";
       ?>
   </p>
   <?php  }

     elseif($x<-30){


    }

     elseif($x>1){
     	?>

        <p class="padd">	<?php
      echo "Fisa medicala a soferului <span class='bold'>$Nume</span> a expirat pe data de <span class='bold'>$DataM</span>.Se recomanda innoirea acesteia in cel mai scurt timp."; 

      ?></p>
    <?php }
     else{

     	?>
   
     <p class="padd"><?php
      echo "Fisa medicala a soferului <span class='bold'>$Nume</span>  a expirat pe data de <span class='bold'>$DataM</span> .Se recomanda innoirea acesteia in cel mai scurt timp.";  

       ?>
   </p>
 <?php    }
     

}

}
}




?>

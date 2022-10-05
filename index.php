<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
 
?>

<?php
if(isset($_POST["Submit"])){
$Username=mysqli_real_escape_string($conn,$_POST["Username"]);
$Parola=mysqli_real_escape_string($conn,$_POST["Parola"]);

 if(empty($Username)||empty($Parola)){
  $_SESSION["Message"]="Toate campurile sunt obligatorii";
    header("Location:index.php");
    exit();
}


else{
  $sql="SELECT * FROM utilizatori where User = '$Username' ";
   $query=mysqli_query($conn,$sql);


  $Data=mysqli_fetch_array($query);
  $ParolaV=password_verify($Parola, $Data["Parola"]);
  if ($ParolaV==false){
    $_SESSION["Message"]="Datele introduse nu sunt corecte";
  }
  else{
    $_SESSION['logat'] = true;
    $_SESSION['username'] = $Username;
    $_SESSION['rol'] = $Data['Rol'];
    header("Location:Alegere.php");
    exit();
  }

}

}






?>

<!DOCTYPE html>
<html>
<head>
  <title>Aplicatie circulatie</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

</head>
<body>
<div class="container-fluid center">

<div class="row">


   <div class="col-sm-12">
      <div><?php echo Message();?>

    <div>
      <form action="index.php" method="post">
        <fieldset>
          <div class="form-group">
          
          <label for="Username">Username:</label>
          <div class="input-group input-group-lg">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-envelope text-primary"></span>
              </span>
          <input class="form-control" type="text" name="Username" id="Username" placeholder="Username">
        </div>
        </div>
          <div class="form-group">
          <label for="Parola">Parola:</label>
          <div class="input-group input-group-lg">
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-lock text-primary"></span>
            </span>
          <input class="form-control" type="Password" name="Parola" id="Parola" placeholder="Parola">
        </div>
        </div>

        <input class="btn btn-info btn-block padd" type="submit" name="Submit" value="Login">
        </fieldset>

      </form>
      </div>  
</div>

</div>


</div>



</body>
</html>

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


<div class="container-fluid">

<div class="row">

	<div class="col-sm-2 gk ">

	<ul id="SideMenu" class="nav nav-pills nav-stacked">           
  
      <li><span class="username"><?php echo $_SESSION['username']; ?>-<?php echo $_SESSION['rol']; ?></span></li>
           <li class="dropdown">
          <a href="#" class="dropdown-toggle link" data-toggle="dropdown"><span class="glyphicon glyphicon-star"></span>  Personal</a>
          <ul class="dropdown-menu" style="width: 100%">
          	  <li><a href="AdminPersonal.php">
            <span class="glyphicon glyphicon-th"></span>    
            &nbsp;Administrare</a></li>
             <li><a href="AP.php">
            <span class="glyphicon glyphicon-plus"></span>    
            &nbsp;Adaugare angajat</a></li>
            <li><a href="AlertePersonal.php">
            <span class="glyphicon glyphicon-warning-sign"></span>    
            &nbsp;Alerte Personal</a></li>
            <li><a href="CautarePersonal.php">
            <span class="glyphicon glyphicon-search"></span>    
            &nbsp;Cautare angajat</a></li>
          </ul>
        </li>
           


           <li class="dropdown">
          <a href="#" class="dropdown-toggle link" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Soferi</a>
          <ul class="dropdown-menu" style="width: 100%">
          	  <li><a href="AdminSoferi.php">
            <span class="glyphicon glyphicon-th"></span>    
            &nbsp;Administrare</a></li>
             <li><a href="AdaugareSofer.php">
            <span class="glyphicon glyphicon-plus"></span>    
            &nbsp;Adaugare sofer</a></li>
            <li><a href="AlerteSoferi.php">
            <span class="glyphicon glyphicon-warning-sign"></span>    
            &nbsp;Alerte soferi</a></li>
            <li><a href="CautareSofer.php">
            <span class="glyphicon glyphicon-search"></span>    
            &nbsp;Cautare sofer</a></li>
          </ul>
        </li>

         <li class="dropdown">
          <a href="#" class="dropdown-toggle link " data-toggle="dropdown"><span class="glyphicon glyphicon-wrench"></span> Autovehicule</a>
          <ul class="dropdown-menu" style="width: 100%">
          	  <li><a href="AdminVehicule.php">
            <span class="glyphicon glyphicon-th"></span>    
            &nbsp;Administrare</a></li>
             <li><a href="AV.php">
            <span class="glyphicon glyphicon-plus"></span>    
            &nbsp;Adaugare autovehicul</a></li>
            <li><a href="AlerteVehicule.php">
            <span class="glyphicon glyphicon-warning-sign"></span>    
            &nbsp;Alerte autovehicule</a></li>
            <li><a href="CautareVehicul.php">
            <span class="glyphicon glyphicon-search"></span>    
            &nbsp;Cautare autovehicul</a></li>
          </ul>
        </li>

          <li><a href="Logout.php">
            <span class="glyphicon glyphicon-log-out"></span>    
            &nbsp;Logout</a></li>

		</ul>


	</div>
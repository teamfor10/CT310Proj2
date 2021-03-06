<?php 
session_name('IFY_02');
?>  

<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta name="description" content="IFY">
  <meta name="author" content="Kevin Magnus &amp; Asa Staven">
  <meta name="keywords" content="HTML,CSS,Web,Development,PHP,ingredients,ct310,fresh">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>Ingredients For You</title>
  <link rel='stylesheet' href='./assets/css/style.css' type='text/css' />
  <link href="https://fonts.googleapis.com/css?family=Marck+Script" rel="stylesheet">
</head>

<!-- Start of page Body -->
<body >
  <!-- Use the jumbotron for creating the header for the webpage -->
  <div class="jumbotron text-center">
    <div id="logo"><img src="./assets/images/logo.png" height="100px" width="auto"></div>
    <div id="title"><h1>Ingredients For You</h1></div>
  </div>

  <!-- Create the collapsing navigation bar -->
  <nav class="navbar navbar-inverse" >
    <div class="container-fluid" id="myNav">

      <div class="navbar-header">
	  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" href="./index.php">Home</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li ><a href="./about.php">About Us</a></li>
          <li ><a href="./showIngredients.php">Ingredients</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="./login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          <li><a href="./logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          
          <?php if(isset($_SESSION['userType']) && $_SESSION['userType'] == 'customer'){?>
          <li><a href="./shoppingCart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
          <?php } ?>

          <?php if(isset($_SESSION['userType']) && $_SESSION['userType'] == 'admin'){?>
          <li><a href="./addIngredients"><span class="glyphicon glyphicon-plus"></span> Add Ingredients</a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>


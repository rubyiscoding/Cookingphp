<?php 
  include'config/auth.php';

function head_template($pagetitle) {
echo <<< EOT
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <!-- bootstrap  -->
    <script src="scripts/jQuery/jquery-3.5.1.js"/>
    <script src="scripts/bootstrap/bootstrap.js"/>
    <script src="scripts/bootstrap/bootstrap.bundle.min.js"/>
  </script>

    <link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
   

     <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
      crossorigin="anonymous"
    />
    <!-- bootstrap  -->


   <!-- <link rel="stylesheet" href="css/styles.css">-->
    <title>$pagetitle</title>
</head>
EOT;
}

function navbar_templates() {
echo <<<EOT
   <nav class="navbar navbar-inverse ">
      <h1>
        <a href="index.php"><i class="fas fa-leaf"></i> Ruby is Cooking </a>
      </h1>
      <ul>
        <li><a href="viewRecipe.php">Recipes</a></li>
        <li><a href="register.php">Admin Register</a></li>
        <li><a href="login.php">Admin Login</a></li>
      </ul>
    </nav>
EOT;
}

function navbar_template() {
   echo('<nav class="navbar navbar-inverse ">
      <h1>
        <a href="index.php"><i class="fas fa-leaf"></i> Ruby is Cooking </a>
      </h1>
      <ul>
        <li><a href="viewRecipe.php">Recipes</a></li>');
        ShowLoggedInLinks();       
     echo('</ul>
    </nav>'); 

}





function ShowLoggedInLinks(){ 
  if (!isset($_SESSION['username'])) {    

    echo ('<li><a href="register.php">Admin Registers</a></li>
        <li><a href="login.php">Admin Login</a></li>');
   
  }else{    
    $loggedInUser=$_SESSION['username'];

    echo('<li><a href="dashboard.php"> Hello ');echo $loggedInUser; echo('</a></li>');
    echo('<li><a href="includes/handlers/logouthandler.php">Admin Logout</a></li>');
  }

}





?>
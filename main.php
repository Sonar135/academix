<?php
    include "header.php";
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/main.css?v=<?php echo time();?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="img_container">
        <div class="overlay">
            <div class="container">
                <div class="cent">
             <div class="welcome_cont">
                <h1>WELCOME TO</h1>
                <span></span>
                <h1> ACA-DEMIX</h1>
                <div class="circle">

                </div>
             </div>

             <h4>THE STUDENT'S GUIDE TO SELF STUDY</h4>

             <?php
             
             if(!isset($_SESSION["id"])){
                echo '  <a href="auth.php"> <button>REGISTER NOW</button></a> ';
              }
             ?>

         
                </div>
            </div>
        </div>

    </div>






</body>
</html>
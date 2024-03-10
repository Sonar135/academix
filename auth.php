<?php
    include "header.php";
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/auth.css?v=<?php echo time();?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="img_container">
        <div class="overlay">
            <div class="container">
                <div class="cent">
         

          
                </div>
            </div>
        </div>

    </div>



    <div class="container auth">
            <div class="cent signup">
                <div class="left" id="super">
                    <div class="overlay">

                    </div>
                </div>

           <form action="" method="post">  <div class="right">
                    <h1>SIGN UP</h1>
                    <div class="n_e">
                        <input type="text" placeholder="Full Name" name="name" id="sup_phone">
                    </div>

                    <div class="n_e">
                        <input type="text" placeholder="phone no" name="phone">
                        <input type="email" placeholder="Email" name="email">
                    </div>

   
                  

                    <div class="n_e">
                        <input type="password" placeholder="password" name="password">
                        <input type="password" placeholder="confirm password" name="conpass">
                    </div>

                    <button name="signup">sign up</button>
                    <h4 class="has_acc">I have an account</h4>
                </div></form>  
            </div>



            <div class="cent login">
                <div class="left stud" id="lock">
                    <div class="overlay">

                    </div>
                </div>

           <form action="" method="post">   <div class="right">
                    <h1>LOGIN</h1>

                  

                    <div class="ne_log">
                        <input type="email" placeholder="email" name="email">
                    </div>

                    <div class="ne_log">
                        <input type="password" placeholder="password" name="password">
                    </div>

                    <button name="login">Login</button>

                    <h4 class="no_acc">I dont have an account</h4>
                </div></form>  
            </div>
        </div>
    </div>
</body>
</html>
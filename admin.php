<?php
    include "header.php";
?>







<?php
 
    include 'functions.php';

    if(isset($_GET['error'])){
        if($_GET['error']=='emptyfield'){
            echo '  <div class="message" id="message">
            please fill all fields
        </div>';
        }
    }

    if(isset($_GET['error'])){
        if($_GET['error']=='pwd_not_match'){
            echo '  <div class="message" id="message">
            passwords do not match
        </div>';
        }
    }


    if(isset($_GET['error'])){
        if($_GET['error']=='school_exists'){
            echo '  <div class="message" id="message">
            school already exists
        </div>';
        }
    }

    if(isset($_GET['error'])){
        if($_GET['error']=='invalid_pass'){
            echo '  <div class="message" id="message">
          password too weak
        </div>';
        }
    }

    if(isset($_GET['error'])){
        if($_GET['error']=='email_in_use'){
            echo '  <div class="message" id="message">
            email already used by another account
        </div>';
        }
    }


    if(isset($_GET['error'])){
        if($_GET['error']=='matric_in_use'){
            echo '  <div class="message" id="message">
            account with matric number already exist
        </div>';
        }
    }


    

    if(isset($_GET['error'])){
        if($_GET['error']=='success'){
            echo '  <div class="message" id="message">
            account created
        </div>';
        }
    }

    if(isset($_GET['error'])){
        if($_GET['error']=='invalidemail'){
            echo '  <div class="message" id="message">
            please enter a valid email
        </div>';
        }
    }

    if(isset($_POST['signup'])){
        $email=$_POST['email'];
        $fname=$_POST['fname'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];
        $confirm=$_POST['conpass'];



     
        

    

        if(emptysignup($email, $fname,  $phone, $password, $confirm )!== false){
            
            
            header("location: admin.php?error=emptyfield");
            exit();
 
        }

        if(invalid_email($email)!== false){
            header("location: admin.php?error=invalidemail");
        //     echo '<div class="message" id="message">
        //     error: INVALID EMAIL
        // </div>';
        exit();
        }

        if (invalid_password($password)) {
            header("location: admin.php?error=invalid_pass");
            exit();
 
        }

        if(pwd_match($password, $confirm)!== false){
      
            header("location: admin.php?error=pwd_not_match");
            exit();
        }

        if(school_email_exists($conn, $email)!== false){
            header("location: admin.php?error=email_in_use");
      
            exit();
        }

        if(school_exists($conn, $fname)!== false){
            header("location: admin.php?error=school_exists");
      
            exit();
        }


     

        create_school($conn, $email, $fname,  $phone, $password );
    
        
    }
?>


<?php
    if(isset($_POST['login'])){
        $fname=$_POST['email'];
        $password=$_POST['password'];



        

    if(emptylogin($fname, $password)){
        header("location: admin.php?error=empty_login");
        exit();
    }

    login_school($conn, $fname, $password);
    }


    if(isset($_GET['error'])){
        if($_GET['error']=='wrongLogin'){
            echo '  <div class="message" id="message">
            institution name or password incorrect
        </div>';
        }
    }

    if(isset($_GET['error'])){
        if($_GET['error']=='empty_login'){
            echo '  <div class="message" id="message">
            enter institution name and password
        </div>';
        }
    }

    
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
                <div class="welcome_cont">
                <h1>SCHOOL ADMIN</h1>
                <span></span>
                <div class="circle">

                </div>
             </div>

          
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
                    <h1>REGISTER INSTITUTION</h1>
                    <div class="n_e">
                        <input type="text" placeholder="name of institution" name="fname" id="sup_phone">
                    </div>

                    <div class="n_e">
                        <input type="text" placeholder="phone no" name="phone">
                        <input type="email" placeholder="Institution's Email" name="email">
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
                        <input type="text" placeholder="institution" name="email">
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

    <?php
      include "footer.php";
    ?>
</body>
</html>
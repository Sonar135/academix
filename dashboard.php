<?php
    include "header.php";
?>



<?php

if(isset($_GET["inserted"])){
    echo '  <div class="message" id="message">
         library created
</div>';
}


    if(isset($_POST["submit"])){
        $title=$_POST["title"];
        $code=$_POST["code"];


        $check=mysqli_query($conn, "SELECT * from library where course_code='$code' and school='$user_name'");
        

        if($title== "" or $code== ""){
            echo '  <div class="message" id="message">
            please fill all fields
        </div>';

       
        }

      else  if(mysqli_num_rows($check)>0){
            echo '  <div class="message" id="message">
            course already exists
   </div>';
        }

      
        else{
            $insert=mysqli_query($conn, "INSERT into library (school, course_code, course_title)
            values('$user_name', '$code', '$title')");

            if($insert){
                header("location: dashboard.php?inserted#lock");
            }
        }

    }
?>




<?php
    $courses="";
    $get=mysqli_query($conn,"SELECT * from library where school = '$user_name'");


    while($row=mysqli_fetch_array($get)){
        $course_code=$row["course_code"];
        $course_title=$row["course_title"];


        $get_num=mysqli_query($conn, "SELECT * from resources where course='$course_code'");

        $num=mysqli_num_rows($get_num);

        $courses.='
        <div class="school_card">
        <div class="text">
            <div class="prof">
            <i class="fa-solid fa-book"></i>
            </div>
            <h1>'.$course_code.'</h1>
            <h4>'.$course_title.'</h4>
            <h4>Available Documents: '.$num.'</h4>
        </div>

        <div class="actions">
            <div class="ac_cont">
           <a href="admin_drive.php?course='.$course_code.'"> <i class="fa-regular fa-folder"></i></a>
            </div>
        </div>
    </div>
        ';
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/dashboard.css?v=<?php echo time();?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="edit_overlay">
   <div class="container edit">
        <div class="cent">
            <h1>ADD COURSE</h1>
            <div class="form_cont">
                <div class="exit">
                <i class="fa-solid fa-xmark"></i>
                </div>
            <form action="" method="post">  
               <input type="text" placeholder="course code" name="code">
               <input type="text" id="lol" placeholder="course title" name="title">
            </div>

            <button name="submit">CREATE</button></form>  
        </div>
   </div>
</div>


<div class="img_container">
        <div class="overlay">
            <div class="container">
                <div class="cent">
                <div class="welcome_cont">
                <h1>SCHOOL DASHBOARD</h1>
                <span></span>
                <div class="circle">

                </div>
             </div>

          
                </div>
            </div>
        </div>

    </div>

    <div class="container sec1" id="lock">
        <h1>LIBRARY</h1>
        <div class="cent">
    
       

          <?php echo $courses?>

            <div class="school_card">
                <div class="text">
                    <div class="prof">
                    <i class="fa-solid fa-book"></i>
                    </div>
                    <h1>?</h1>
                    <h4>?</h4>
                    <h4>Available Documents: ?</h4>
                </div>

                        <div class="add" id="toggle">
                        <i class="fa-solid fa-plus"></i>
                        </div>

            
            </div>
        </div>
    </div>

    <?php
        include "footer.php";
    ?>
</body>
</html>
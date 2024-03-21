<?php
    include "header.php";
?>



<?php
    if(isset($_GET["school"])){
        $school=$_GET["school"];
    }

    $courses="";

    $get=mysqli_query($conn, "SELECT * from library where school='$school'");

    while($row=mysqli_fetch_array($get)){
        $course_code=$row["course_code"];
        $course_title=$row["course_title"];

        $courses.='
        <div class="school_card">
        <div class="text">
            <div class="prof">
            <i class="fa-solid fa-book"></i>
            </div>
            <h1>'.$course_code.'</h1>
            <h4>'.$course_title.'</h4>
            <h4>Available Documents: 38</h4>
        </div>

        <div class="actions">
            <div class="ac_cont">
           <a href="admin_drive.php"> <i class="fa-regular fa-folder"></i></a>
            </div>
        </div>
    </div>
        ';
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/courses.css?v=<?php echo time();?>">
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
                <h1>Library</h1>
                <span></span>
                <div class="circle">

                </div>
             </div>


          
                </div>
            </div>
        </div>

    </div>

    <div class="container sec1">
        <h1>Available Courses</h1>
        <div class="cent">
    
            <?php echo $courses?>

        </div>
    </div>
</body>
</html>
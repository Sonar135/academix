<?php
    include "header.php";
?>

<?php
    $schools="";
    $get=mysqli_query($conn, "SELECT * from schools");

    while($row=mysqli_fetch_array($get)){
        $school_name=$row["Fname"];


        $schools.='   <div class="school_card">
        <div class="text">
            <div class="prof">
            <i class="fa-solid fa-school"></i>
            </div>
            <h1>'.$school_name.'</h1>

            <h4>Available Documents: 38</h4>
        </div>

        <div class="actions">
            <div class="ac_cont">
           <a href="courses.php?school='.$school_name.'"><i class="fa-solid fa-book"></i></a>
            </div>
        </div>
    </div>';
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/student.css?v=<?php echo time();?>">
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
                <h1>ACADEMIX</h1>
                <span></span>
                <div class="circle">

                </div>
             </div>
          
                </div>
            </div>
        </div>

    </div>
<div class="container sec1">
        <h1>Available Schools</h1>
        <div class="cent">
         
            <?php
                echo $schools;
            ?>
          
        </div>
    </div>
    <?php
      include "footer.php";
    ?>
</body>
</html>
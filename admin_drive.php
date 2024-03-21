<?php
    include "header.php";
?>






<?php
  if(isset($_GET["course"])){
    $course=$_GET["course"];
  }

    if(isset($_POST["submit"])){

      
        $targetDir = "uploads/";
        $targetFile = $targetDir. basename($_FILES["file"]["name"]);
        $fileType = strtolower (pathinfo($targetFile, PATHINFO_EXTENSION));
        $display_name=htmlentities($_POST["file_name"]);
        $file_name=$_FILES["file"]["name"];
        $file_size = $_FILES["file"]["size"];
        $fileSizeMB = $file_size / (1024 * 1024);



        if($display_name=="" or $file_name==""){
            echo '  <div class="message" id="message">
           please select file and name it
        </div>';
        }

        else{
            if($fileType=="jpg" or  $fileType=="png" or $fileType=="jpeg"){
                $type="image";
            }
    
            if($fileType=="pptx" or $fileType=="ppt"){
                $type="powerpoint";
            }
    
            if($fileType=="docx" or $fileType=="doc"){
                $type="word";
            }
    
          

            if($fileType=="pdf"){
                $type="pdf";
            }
    
          
            move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile);
    
            $query=mysqli_query($conn, "INSERT into resources (file, filetype, date_created, display_name, school, course, file_size) values('$file_name' ,  '$type', NOW(), '$display_name', '$user_name', '$course', ' $fileSizeMB'  )");

            if($query){
                header("location: admin_drive.php?course=$course");
            }
        }

    


    }
?>








<?php

  $resources="";
  $get=mysqli_query($conn,"SELECT * from resources where course='$course' and school='$user_name'");

  while($row=mysqli_fetch_array($get)){
    $display=$row["display_name"];
    $datetimeString = $row["date_created"];

    // Parse the datetime string
    $dateTime = new DateTime($datetimeString);
    
    // Format the datetime as just the date
    $date = $dateTime->format('Y-m-d');

    $size=round($row["file_size"], 2) ;

    $file_type=$row["filetype"];


    if($file_type=="image"){
      $icon='<i class="fa-solid fa-image"></i>';
  }

  if($file_type=="powerpoint"){
      $icon='<i class="fa-solid fa-file-powerpoint"></i>';
  }

  if($file_type=="word"){
      $icon='<i class="fa-solid fa-file-word"></i>';
  }



  if($file_type=="pdf"){
      $icon='<i class="fa-solid fa-file-pdf"></i>';
  }
  }


  $resources.='
  <tr>
 
  <td id="ico">  <div class="name_ico"><div class="ico_box">'.$icon.'</div></div>  <h3 id="name">'.$display.' </h3> </td>
  <td><h3>'.$date.'</h3></td>
  <td><h3>'.$size.'mb</h3></td>
  <td><div class="tb_ico"><i class="fa-solid fa-download"></i></div></td>
 
 </tr>
 
  ';

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/drive.css?v=<?php echo time();?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<div class="edit_overlay">
   <div class="container edit">
        <div class="cent">
            <h1>RESOURCE FORM</h1>
            <div class="form_cont">
                <div class="exit">
                <i class="fa-solid fa-xmark"></i>
                </div>
            <form action="" method="post" enctype="multipart/form-data">  
               <input type="text" placeholder="display name" name="file_name">
               <label for="file" class="label">file</label>
               <input type="file"  accept="application/pdf, .doc, .docx, .ppt, .pptx" id="file"  hidden  name="file">
            </div>

            <button name="submit">UPLOAD</button></form>  
        </div>
   </div>
</div>



<div class="img_container">
        <div class="overlay">
            <div class="container">
                <div class="cent">
         
                <div class="welcome_cont">
                <h1>Resources</h1>
                <span></span>
                <div class="circle">

                </div>
             </div>
          
                </div>
            </div>
        </div>

    </div>



    <div class="container sec1">
        <div class="cent">
            <div class="search_bar">
                <input type="text" placeholder="Search">

                

            </div>

            <section>

  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Name</th>
          <th>Date Created</th>
          <th>File Size</th>
          <th>Download</th>

        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody id="lock">



      <?php echo $resources?>



      </tbody>
    </table>
  </div>
</section>

    <button id="toggle">UPLOAD DOCUMENT</button>
        </div>
    </div>
</body>
</html>
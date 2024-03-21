<?php
    include "header.php";
?>




<?php
    if(isset($_GET["course"])){
      $course=$_GET["course"];
    }
  


    if(isset($_GET["school"])){
      $school=$_GET["school"];
    }
  
?>






<?php

  $resources="";
  $get=mysqli_query($conn,"SELECT * from resources where course='$course' and school='$school'");

  if(mysqli_num_rows($get)<1){
    $resources='<h1>Empty Drive!</h1>';
  }

  while($row=mysqli_fetch_array($get)){
    $display=$row["display_name"];
    $datetimeString = $row["date_created"];

    // Parse the datetime string
    $dateTime = new DateTime($datetimeString);
    
    // Format the datetime as just the date
    $date = $dateTime->format('Y-m-d');

    $size=round($row["file_size"], 2) ;
    $fil_dir=$row["file"];

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

  $resources.='
  <tr>
 
  <td id="ico">  <div class="name_ico"><div class="ico_box">'.$icon.'</div></div>  <h3 id="name">'.$display.' </h3> </td>
  <td><h3>'.$date.'</h3></td>
  <td><h3>'.$size.'mb</h3></td>
  <td> <a href="uploads/'.$fil_dir.'" target="_blank"<div class="tb_ico"><i class="fa-solid fa-download"></i></div></a></td>
 
 </tr>
 
  ';
  }




?>



<?php


  if(isset($_POST["search"])){
    $search=$_POST["query"];


    header("location: drive.php?course=$course&school=$school&search=$search#lock");



     
  }
?>





<?php
   $r="";
   if(isset($_GET["search"])){
      $search_data=$_GET["search"];





      $search_query=mysqli_query($conn,"SELECT * from resources where display_name like '%$search_data%' and school='$school' and course='$course'");



      if(mysqli_num_rows($search_query)<1){
        $r='<h1>Not Found In Drive!</h1>';
      }
  
  
  
  
      while($search_row=mysqli_fetch_array($search_query)){
        $display=$search_row["display_name"];
        $datetimeString = $search_row["date_created"];
    
        // Parse the datetime string
        $dateTime = new DateTime($datetimeString);
        
        // Format the datetime as just the date
        $date = $dateTime->format('Y-m-d');
    
        $size=round($search_row["file_size"], 2) ;
        $fil_dir=$search_row["file"];
    
        $file_type=$search_row["filetype"];
    
    
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
    
      $r.='
      <tr>
     
      <td id="ico">  <div class="name_ico"><div class="ico_box">'.$icon.'</div></div>  <h3 id="name">'.$display.' </h3> </td>
      <td><h3>'.$date.'</h3></td>
      <td><h3>'.$size.'mb</h3></td>
      <td> <a href="uploads/'.$fil_dir.'" target="_blank"<div class="tb_ico"><i class="fa-solid fa-download"></i></div></a></td>
     
     </tr>
     
      ';
      }



  }

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



    <div class="container sec1" id="lock">
        <div class="cent">
           <form action="" method="post"> <div class="search_bar">
                <input id="my_input" type="text" placeholder="Search in Drive" name="query">

                  <button id="my_btn" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
                

            </div></form>

            <section>
  <!--for demo wrap-->

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



      <?php 
      
   
      if(isset($_GET["search"])){
        echo $r;
      }
   
      else{
        echo $resources;
      }
       
      
    
      
      ?> 


      </tbody>
    </table>
  </div>
</section>
        </div>
    </div>
    <?php
      include "footer.php";
    ?>
</body>
</html>
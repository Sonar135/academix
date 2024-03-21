<?php

    include "connect.php";

    if(isset($_GET["id"])){
        $id=$_GET["id"];
    }

    if(isset($_GET["course"])){
        $course=$_GET["course"];
    }


    $delete=mysqli_query($conn, "DELETE from resources where id='$id'");

    if($delete){
        header("location: admin_drive.php?course=$course#lock");
    }
?>
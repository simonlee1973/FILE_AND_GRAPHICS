<?php
    include_once "function.php";
    $id=$_GET['id'];    
    $row=find('imgs'," id = '$id'");
    $imgName=$row['file'];
    unlink("./files/$imgName") ;
    del("imgs","id=$id");
    header("location:manage.php");
?>



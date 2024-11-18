<?php
    include_once "function.php";
    $id=$_GET['id'];    
    $row=find('imgs'," id = '$id'");
    dd($row);     
    $imgName=$row['filename'];
    unlink("./files/$imgName") ;
    del("imgs","id=$id");
    header("location:manage.php");
?>



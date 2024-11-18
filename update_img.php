<?php
    include_once"function.php";
    $id=$_POST['id'];
    $row=find('imgs',"id='$id'");
    $row['desc']=$_POST['desc'];
    $imgName=$_POST['imgName'];

    if(isset($_FILES['img'])){
        if($_FILES['img']['error']==0)
        {
            unlink("./files/".$row['filename']);
            $row['filename']=time().$_FILES['img']['name'];
            move_uploaded_file($_FILES['img']['tmp_name'],"./files/".$imgName);
            update('imgs',);
        }
        else{
            echo "上傳失敗，請檢查檔案格式或是大小是否符合規定";
        }        
        
    }
    echo $_FILES['img']['tmp_name']."<br>";
    echo "./files/".$imgName."<br>";
    
    header("location:manage.php");

?>




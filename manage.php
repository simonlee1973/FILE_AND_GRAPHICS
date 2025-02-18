<?php
/**
 * 1.建立資料庫及資料表來儲存檔案資訊
 * 2.建立上傳表單頁面
 * 3.取得檔案資訊並寫入資料表
 * 4.製作檔案管理功能頁面
 */


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>檔案管理功能</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table{
            width:700px;
            margin:20px auto;
            padding:20px;
        }
        td{
            padding:5px;
        }
        td img{
            width:120px;
        }
        a{
            display: inline-block;
            padding:5px 10px;
            border: 1px solid #ccc;
            margin:5px;
            border-radius: 8px;
        }
        a:hover{
            background-color:skyblue;
        }                
    </style>
</head>
<body>
<h1 class="header">檔案管理練習</h1>
<!----建立上傳檔案表單及相關的檔案資訊存入資料表機制----->
<?php

    include_once"function.php";
    //echo $_POST['name'];
    //echo "<br>";
    dd($_FILES);

    if(isset($_FILES['filename']))
    if($_FILES['filename']['error']==0)
    {

        $filename=time().$_FILES['filename']['name'];
        move_uploaded_file($_FILES['filename']['tmp_name'],"./files/".$filename);

        $desc=$_POST['desc'];
        insert("imgs","(filename,`desc`)","('$filename','$desc')");
        
    }
    else
    {
        echo "上傳失敗請檢查檔案格式和大小是否符合規格";
    }
    $dirpath="./files";
    $items=scandir($dirpath);
    //dd($items);
    $items=array_diff($items,array('.','..'));
     dd($items);

  

?>

<!----透過資料表來顯示檔案的資訊，並可對檔案執行更新或刪除的工作----->
<?php


    $rows=all('imgs');
    echo "<table>";
    foreach($rows as $file)
    {
        echo "<tr>";
        echo "<td><img src='files/{$file['filename']}'></td>";
        echo "<td>{$file['desc']}</td>";
        echo "<td><a href='del_img.php?id={$file['id']}'>刪除</a></td>";
        echo "<td><a href='show_img.php?id={$file['id']}'>";
        echo ($file['sh']==0)?"隱藏":"顯示";
        echo "</a></td>";        
        echo "<td><a href='re_upload.php?id={$file['id']}'>重新上傳</a></td>";
        echo "</tr>";

    }

    echo "</table>";    
?>





</body>
</html>
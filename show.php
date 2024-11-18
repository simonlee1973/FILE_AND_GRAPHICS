<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>相簿</title>
    <style>
        .album{
            display:flex;
            width: 800px;
            justify-content: space-evenly;
            align-items:center;
            margin:20px auto;
            flex-wrap:wrap;           

        }
        .item {
    width: 26%;
}

.item img {
    width: 100%;
    border: 5px solid;
}

    </style>

</head>
<body>
    <h1>相簿</h1>
    <div class="album">    
    <?php
     //to do
    include_once"function.php";
    $data=all("imgs");
    foreach($data as $file)
    {
        if($file['sh']==1)
        {
            echo "<div class='item'>";
            echo "<img src='./files/{$file['filename']}' alt=''>";
            echo "</div>";
        }
    }

    ?>
    </div>
</body>
</html>
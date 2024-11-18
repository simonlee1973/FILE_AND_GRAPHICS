<?php
define("DBNAME","file");

function dd($array){
    echo "<pre>";   
    print_r($array);
    echo "</pre>";
}

function pdo($dbname){
    $dsn="mysql:host=localhost;charset=utf8;dbname=$dbname";
    $pdo=new PDO($dsn,'root','');
    return $pdo;
}
function all($table)
{ 
    $pdo=pdo(DBNAME);  
    $all="select * from $table";
    $datas=$pdo->query($all)->fetchall(PDO::FETCH_ASSOC);
    return $datas;    
}
function insert($table,$value1,$value2)
{
    $pdo=pdo(DBNAME);
    $sql="insert into ".$table." ";
    $sql=$sql.$value1." values ".$value2;
    //echo "<h2>".$sql."</h2>";
    return $pdo->exec($sql);
}

function del($table ,$where){
    $sql="delete from $table where $where";
    //echo "<h2>".$sql."</h2>";
    $pdo=pdo(DBNAME); 
    return  $pdo->exec($sql);
    
}

function find($table,$where){
    $sql="select count(id) from $table where $where";
    //echo "<h2>".$sql."</h2>";
    $pdo=pdo(DBNAME);
    $row=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);    
    return $row;
}
function update($table,$set,$where)
{
    $sql="update $table set $set where $where";
    //echo "<h2>".$sql."</h2>";
    $pdo=pdo(DBNAME);
    return $pdo->exec($sql); 
}

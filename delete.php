<?php

if (isset($_GET['id']))
{
    $id=$_GET["id"];
    //extract($_GET);

    require 'DB.php';
    $sql="delete from tasks where task_id = $id";
    mysqli_query($conn, $sql);
}
header("location:display.php"); //redirect to display.php










?>
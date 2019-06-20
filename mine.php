<?php
if (isset($_POST["task"]))
{
    require 'DB.php';
    extract($_POST);
// echo "";
    $target_dir = "uploads/";
    $unik = rand(1000000,20000000);
    $unik2 =rand(5000000,10000000);
    $joined =$unik."_".$unik2;
    $ext = pathinfo(basename($_FILES["task"]["date_todo"]), 4);

    /* if ($ext !="png" or $ext !="jpg" or $ext !="jpeg" or $ext !="jfif")
    {
    echo "invalid file type";
    die();
    }*/

//echo $ext;
//die();

    $target_file = $target_dir .$joined .".".$ext;
    if (move_uploaded_file($_FILES["task"]["date_todo"], $target_file)) {
//save to db

        $sql="INSERT INTO `tasks`(`task_name`, `date_todo`, `status`) VALUES 
                                ('$task',$date,'$status')";
        mysqli_query($conn, $sql);
    }else{
//error msg

        $message= "failed to upload Task";
    }

}

?>

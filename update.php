<?php
//get id
//retrieve task
//display details
//update task

if (isset($_GET["id"]))
{
    $id = $_GET["id"];
    require 'DB.php';
    $sql ="select * from tasks where task_id = $id";
    $results =mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($results);
    extract($row);
}

if (isset($_POST["task_name"]))
{
    $task_name = $_REQUEST["task_name"];
    $date_todo = $_REQUEST["date_todo"];
    $status = $_REQUEST["status"];
    $id =$_REQUEST["id"];
    require 'DB.php';
    $sql ="update tasks set task_name='$task_name',date_todo='$date_todo',status='$status'  where task_id=$id";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
    header("location:display.php");
}
?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update task</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<?php
require_once 'navbar.php'

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">

            <div class="card">
                <div class="card-header">
                    Updating task <?php echo  $id; ?>
                </div>


                    <form action="update.php" method="post">

                        <input type="hidden" name="id" value="<?=$id?>">

                        <div class="form-group">
                            <label for="task_name">task_name</label>
                            <input value="<?=$task_name?>" type="text" class="form-control" name="task_name" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input value="<?=$date_todo?>" type="date" class="form-control" name="date_todo" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="incomplete">Incomplete</option>
                                <option value="complete">Complete</option>
                            </select>
                        </div>

                        <button class="btn btn-info btn-block">Update Task</button>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>






</body>
</html>
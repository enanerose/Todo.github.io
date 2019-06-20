<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Tasks</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<body>

<?php
require 'navbar.php'
?>

<div class="container">
    <table class="table" id="tasks">
        <thead>
        <tr>
            <th>ID</th>
            <th>Date Todo</th>
            <th>Task Name</th>
            <th>Status</th>
            <th>Delete</th>
            <th>Update</th>

        </tr>
        </thead>
        <tbody>

        <?php

        require 'DB.php';
        $sql ="select * from tasks order by task_id desc ";
        $results = mysqli_query($conn, $sql);
        while ($row =mysqli_fetch_assoc($results))
        {
            extract($row); //$task $date
            echo "<tr>
                    <td>$task_id</td>
                    <td>$date_todo</td>
                    <td>$task_name</td>
                    <td>$status</td>
                    <td> <a href='delete.php?id=$task_id' class='btn btn-danger'>Delete</a></td>
                    <td> <a href='update.php?id=$task_id' class='btn btn-info'>Update</a></td>
                 </tr>";
        }
        ?>




        </tbody>
    </table>
</div>

<script>

    $(document).ready(function() {
        $('#tasks').DataTable();
    } );
</script>

</body>
</html>
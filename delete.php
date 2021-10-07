<?php

// delete data from table
    include 'db_con.php';
    $id=$_GET['id'];

    $sql="DELETE FROM tbl_tasks WHERE id=$id";
    $result=mysqli_query($conn, $sql);

    if($result){
        header("location: ./index.php");
    }

?>
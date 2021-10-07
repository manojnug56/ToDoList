<?php
 
 // insert data  to data table
    $title=$_POST['title'];
    
    include 'db_con.php';
    $sql="INSERT INTO tbl_tasks(name)VALUES('$title')";
    
    $result=mysqli_query($conn, $sql);
    
    if($result)
    {
        header("location: ./index.php");
    }
    else
    {
        "Something went to wrong...!";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  <!-- Sweet allert CDN -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        
         <!-- Make table as scrolble -->
        <style>
            .tableFixHead 
            {
                overflow-y: auto;
                height:250px;
            }
            .tableFixHead thead th 
            {
                position: sticky;
                top: 0;
            } 
        </style>
    </head>

    <body>
         <!-- bootstrap card body -->
        <div class="card">

            <div class="card-header text-center">
              Concon Solutions (PVT) .Ltd
            </div>

            <div class="card-body w-50 m-auto" >
                <h5 class="card-title text-center">To Do List App</h5>
                <form action="data.php" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="title">Task</label>
                        <input class="form-control" type="text" name="title" id="title" placeholder="Type New Task Here" Required>
                    </div><br>
                    <button class="btn btn-outline-primary">Add Task</button>
                </form><br>

                <div class="tableFixHead">
                    <table class="table table-success table-striped" id="tblToDoList">
                        <thead>
                            <tr>
                            <th  name="id">No:</th>
                            <th>Task Name</th>
                            <th>Date</th>
                            <th>Action</th>
                            </tr>
                        </thead>

                         <!-- reetrrive data to table body -->
                        <tbody>
                            <?php
                                include 'db_con.php';

                                $sql="SELECT * FROM tbl_tasks";
                                $result=mysqli_query($conn, $sql);

                                if($result)
                                {
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $id = $row['id'];
                                        $TaskName = $row['name'];
                                        $date = $row['date'];

                                        ?>
                                        <tr>
                                            <td><?php echo $id ?></td>
                                            <td><?php echo $TaskName  ?></td>
                                            <td><?php echo $date  ?></td>

                                            <td>
                                            <a class="btn btn-danger btn-sm"  href="delete.php?id=<?php echo $id ?>">Delete</a>
                                            
                                            </td>
                                            
                                        </tr>

                                        <?php    
                                    }
                                }
                            ?>
    
                        </tbody>
                    </table>
                    
                </div><br>
                <button class="btn btn-outline-danger" onclick="RemoveAll()">
                        Clear All Task
                </button>     

                 <!-- Clear  function with sweet alert -->
                <script>
                    function RemoveAll() 
                    {
                        
                        $("#tblToDoList").remove();
                        swal("Good job!", "You cleared all the tasks!", "success");
                    }
                </script>
            </div>

            <div class="card-footer text-muted text-center">
            © 2021 MANOJ UDAGEDARA. ALL RIGHTS RESERVED.
            </div>

        </div>
    </body>
</html>
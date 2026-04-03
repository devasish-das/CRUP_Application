<?php include("header.php"); ?>
<?php include("dbcon.php"); ?>


<div class="box1">
    <h2>ALL STUDENTS</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD STUDENTS</button>

</div>
<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?PHP

        $sql = "SELECT * FROM `students`";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "Connection failed-->" . mysqli_error($conn);
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['firstName']; ?></td>
                    <td><?php echo $row['lastName']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
                    <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" >Delete</a></td>
                </tr>
        <?php
            }
        }
        ?>

    </tbody>
</table>

<?php
   
   if(isset($_GET['msg'])){
    echo "<h6 class='alert alert-danger'>".$_GET['msg']."</h6>";
   }

?>
<?php
   
   if(isset($_GET['insert_msg'])){
    echo "<h6 class='alert alert-success'>".$_GET['insert_msg']."</h6>";
   }

?>
<?php
   
   if(isset($_GET['update_msg'])){
    echo "<h6 class='alert alert-success'>".$_GET['update_msg']."</h6>";
   }

?>
<?php
   
   if(isset($_GET['delete_msg'])){
    echo "<h6 class='alert alert-danger'>".$_GET['delete_msg']."</h6>";
   }

?>



<!-- Modal -->
<form action="insert.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                    <div>
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" class="form-control">
                    </div>
                    <div>
                        <label for="lname">last Name</label>
                        <input type="text" name="lname" class="form-control">
                    </div>
                    <div>
                        <label for="age">Age</label>
                        <input type="text" name="age" class="form-control">
                    </div>

                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="add_student" value="ADD">
                </div>
                
            </div>
        </div>
    </div>
    
</form>
<?php include("footer.php"); ?>
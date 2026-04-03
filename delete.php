<?php include("dbCon.php"); ?>

<?php 

if(isset($_GET['id']))
    { 
        $id=$_GET['id'];

        $query= "delete from `students` where `id` = '$id'";
         $result = mysqli_query($conn, $query);

    if (!$result) {
        die("query failed: " . mysqli_error($connection));
    } else {
        header('location:index.php?delete_msg=You have deleted the record.');
    }
    }

?>
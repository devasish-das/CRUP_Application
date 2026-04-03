<?php include("header.php"); ?>
<?php include("dbcon.php"); ?>
<?php 
   if(isset($_GET["id"])){
    $id = $_GET["id"];
     $sql = "SELECT * FROM `students` WHERE `id`='$id'";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "Connection failed-->" . mysqli_error($conn);
        } else{
            $row=mysqli_fetch_assoc($result);
            
        }
    }

?>

<?php
   if(isset($_POST["update_student"])){
    if(isset($_GET["id"])){
        $idnew = $_GET["id"];
        }
    $fname= $_POST["fname"];
    $lname= $_POST["lname"];
    $age= $_POST["age"];

    $query = "UPDATE `students` SET `firstName`='$fname',`lastName`='$lname',`age`='$age'
     Where `id`='$idnew'";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "The data insertion has failed--->".mysqli_error($conn);
    ;
}else{
    header('location:index.php?update_msg= Your data was succesfully updated');
    exit();
}
 

   }

?>


<form action="update.php?id_new=<?php echo $id; ?>" method="post">

    <div class="modal-body">
        <div class="mt-3">
            <label for="fname">First Name</label>
            <input type="text" name="fname" class="form-control" value="<?php echo $row['firstName'];?>">
        </div>
        <div class="mt-3">
            <label for="lname">last Name</label>
            <input type="text" name="lname" class="form-control" value="<?php echo $row['lastName'];?>" >
        </div>
        <div class="mt-3">
            <label for="age">Age</label>
            <input type="text" name="age" class="form-control" value="<?php echo $row['age'];?>">
        </div>
        <div class="mt-3">
        <input type="submit" class="btn btn-success" name="update_student" value="UPDATE">

        </div>

</form>
 

<?php include("footer.php"); ?>
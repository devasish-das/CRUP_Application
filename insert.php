<?php include("dbcon.php"); ?>
<?php

  if(isset($_POST['add_student'])){
    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
    $age= $_POST['age'];

    if(empty($fname)){
        header('location:index.php?msg=Hey,Enter the First Name!!!');
  }elseif(empty($lname)){
        header('location:index.php?msg=Hey,Enter the Last Name!!!');
  }elseif(empty($age)){
        header('location:index.php?msg=Hey,Enter the Age!!!');
  }else{
    $query= "INSERT INTO `students` (`id`, `firstName`, `lastName`, `age`) VALUES (NULL, '$fname', '$lname', '$age');";
    $result=mysqli_query($conn,$query);

    if(!$result){
        echo "The data inserted was not created--->".mysqli_error($conn);
        }else{
     header('location:index.php?insert_msg=Hey,Your Insert operation is successfull');
}

  }
  }
?>
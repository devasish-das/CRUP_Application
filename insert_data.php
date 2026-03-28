<?php
require_once("db.php");

if (isset($_POST["add_students"])) {

  $f_name = $_POST["f_name"];
  $l_name = $_POST["l_name"];
  $age = $_POST["age"];

  if (empty($f_name)) {
    header('location: index.php?message=Please fill in the first name');
    exit();
  } elseif (empty($l_name)) {
    header('location: index.php?message=Please fill in the last name');
    exit();
  } elseif (empty($age)) {
    header('location: index.php?message=Please fill in the age');
    exit();
  } else {

    $query = "INSERT INTO students (first_name, last_name, age) VALUES ('$f_name', '$l_name', '$age')";
    $result = mysqli_query($connection, $query);

    if (!$result) {
      die("Query error: " . mysqli_error($connection));
    } else {
      header('location: index.php?message=Student Added Successfully');
      exit();
    }
  }
}

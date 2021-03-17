<?php

session_start();



$conn = mysqli_connect("localhost","root","usbw","usersinfo");

if(!$conn){
  echo "Error while connecting to the database";
}

$fname = '';
$lname = '';
$email = '';
$phone = '';
$update = false;
$id=0;

if (isset($_POST["submit"])){

  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];

  $sql = mysqli_query($conn, "INSERT INTO data (fname,lname,email,phone)
  VALUES ('$fname', '$lname', '$email', $phone) ") or die();

  if(!$sql){
    echo mysqli_error($sql);
  }

  header("Location: index.php");
}

if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $sql2 = mysqli_query($conn, "DELETE FROM data WHERE id=$id");

  if(!$sql2){
    echo mysqli_error($sql2);
  }

  header("Location: index.php");
 
}

if(isset($_GET['edit'])){
      $id = $_GET['edit'];
      $update = true;
      $res = mysqli_query($conn, "SELECT * FROM data WHERE id=$id") or die(mysqli_error($res));

      if(count($res) == 1){
        $row = $res -> fetch_array();
        $fname = $row['fname'];
        $lname = $row['lname'];
        $email = $row['email'];
        $phone = $row['phone'];
      }      
}

if(isset($_POST['update'])){
  $id = $_POST['id'];
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];

  $sql3 = mysqli_query($conn, "UPDATE data SET fname='$fname', lname='$lname', email='$email', phone=$phone WHERE id=$id") or die(mysqli_error($sql3));
  header("Location: index.php");
}
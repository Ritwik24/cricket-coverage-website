<?php
require 'config.php';

if(isset($_POST["action"])){
  if($_POST["action"] == "insert"){
    insert();
  }
  else if($_POST["action"] == "edit"){
    edit();
  }
  else{
    delete();
  }
}

function insert(){
  global $conn;
 
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $email = $_POST["email"];
  $state = $_POST["state"];
  $mobile = $_POST["mobile"];

  $query = "INSERT INTO registration VALUES(13, '$fname', '$lname', '$email', '1234', '$state', '$mobile')";
  mysqli_query($conn, $query);
  echo "Inserted Successfully";
}

function edit(){
  global $conn;

  $id = $_POST["id"];
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $email = $_POST["email"];
  $state = $_POST["state"];
  $mobile = $_POST["mobile"];

  $query = "UPDATE registration SET firstName = '$fname', lastName = '$lname', email = '$email', state = '$state', mobile = '$mobile'  WHERE id = $id";
  mysqli_query($conn, $query);
  echo "Updated Successfully";
}

function delete(){
  global $conn;

  $id = $_POST["action"];

  $query = "DELETE FROM registration WHERE id = $id";
  mysqli_query($conn, $query);
  echo "Deleted Successfully";
}

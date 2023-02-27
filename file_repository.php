<?php
require 'connectDB.php';
function findUserByEmail($email){
  $conn = databaseConnection();
  $sql = "SELECT * FROM users WHERE email='".$email."'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
    // output data of each row
    while($row = mysqli_fetch_assoc($result)){
      if($row['email']==$email){
        return $row;
      }
    }
  }
  mysqli_close($conn);
  return NULL;
}

function saveUser($email, $name, $password){
  $conn = databaseConnection();
  $sql = "INSERT INTO users(name, email, password) VALUES('".$name."', '".$email."', '".$password."')";

  mysqli_query($conn, $sql);

  mysqli_close($conn);

}

function updateUser($email, $name, $password){
  $conn = databaseConnection();

  $sql = "";

  mysqli_query($conn, $sql);

  mysqli_close();
}
?>
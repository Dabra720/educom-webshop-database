<?php
require 'connectDB.php';

function findUserByEmail($email){
  $conn = databaseConnection();
  $email = mysqli_real_escape_string($conn, $email);
  // debug_to_console("email: " . $email);
  try{
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if(!$result){
      throw new Exception("Find failed, sql: " . $sql . ", error: " . mysqli_error($conn));
    }
    if(mysqli_num_rows($result) > 0){
      // output data of each row
      while($row = mysqli_fetch_assoc($result)){
        if($row['email']==$email){
          return $row;
        }
      }
    }
    return NULL;
  } finally {
    mysqli_close($conn);
  }
}

function saveUser($email, $name, $password){
  $conn = databaseConnection();
  $name = mysqli_real_escape_string($conn, $name);
  $email = mysqli_real_escape_string($conn, $email);
  $password = mysqli_real_escape_string($conn, $password);
  $sql = "INSERT INTO users(name, email, password) VALUES('$name', '$email', '$password')";

  mysqli_query($conn, $sql);

  mysqli_close($conn);

}

function updateUser($email, $name, $password){
  $conn = databaseConnection();

  $sql = "";

  mysqli_query($conn, $sql);

  mysqli_close();
}

function findUserById($id){
  $conn = databaseConnection();
  $id = mysqli_real_escape_string($conn, $id);
  // debug_to_console("email: " . $email);
  try{
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if(!$result){
      throw new Exception("Find failed, sql: " . $sql . ", error: " . mysqli_error($conn));
    }
    if(mysqli_num_rows($result) > 0){
      // output data of each row
      while($row = mysqli_fetch_assoc($result)){
        if($row['id']==$id){
          return $row;
        }
      }
    }
    return NULL;
  } finally {
    mysqli_close($conn);
  }
  // $conn = databaseConnection();
  // $data = array('id'=>'', 'name'=>'', 'email'=>'', 'password'=>'');
  // if(isset($_SESSION['userid'])){
  //   $sql = "SELECT * FROM users WHERE id='".$_SESSION['userid']."'";
  //   $result = mysqli_query($conn, $sql);
  //   while($row = mysqli_fetch_assoc($result)){
  //     $data = $row;
  //   }
  //   mysqli_close($conn);
    
  // }
  // return $data;
}


?>
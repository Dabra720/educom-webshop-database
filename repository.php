<?php
require 'connectDB.php';

function findUserByEmail($email){
  $conn = databaseConnection();
  $email = mysqli_real_escape_string($conn, $email);
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

function updateUser($key, $value){
  $conn = databaseConnection();
  
  try{
    $sql = "UPDATE users SET $key='$value' WHERE id='".getCurrentUser('id'). "'";
    mysqli_query($conn, $sql);
  } finally {
    mysqli_close($conn);
  }
}
// ================================== PRODUCTS =======================================

function selectProducts(){
  // $data = array('validForm'=>false, 'values'=>array(), 'errors'=>array(), 'products'=>array(), 'cart'=>array());
  $conn = databaseConnection();
  $sql = "SELECT * FROM products";

  $data['products'] = mysqli_query($conn, $sql);

  mysqli_close($conn);
  return $data;
}

function findProductById($id){
  $conn = databaseConnection();
  $id = mysqli_real_escape_string($conn, $id);
  try{
    $sql = "SELECT * FROM products WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if(!$result){
      throw new Exception("Find product failed, sql: " . $sql . ", error: " . mysqli_error($conn));
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
}

function storeOrder($user_id, $cartContent){
  $conn = databaseConnection();

  $sql1 = "INSERT INTO 'order'(user_id) VALUES($user_id)";

  mysqli_query($conn, $sql1);

  $last_id = mysqli_insert_id($conn);

  foreach($cartContent as $key=>$value){
    $sql2 = "INSERT INTO order_row(order_id, product_id, amount) VALUES($last_id, $key, $value)";
    mysqli_query($conn, $sql2);
  }

  mysqli_close($conn);
}

?>
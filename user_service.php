<?php
require 'file_repository.php';

function authenticateUser($email, $password){
  $user = findUserByEmail($email);
  if(!empty($user)){
    if($user['password']==$password){
      return $user;
    }
  } else{
    return NULL;
  }
}

function getUserBy($search, $value){
  switch($search){
    case 'email':
      $user = findUserByEmail($value);
      return $user;
    case 'id':
      $user = findUserById($value);
      return $user;
  }
  return NULL;

}

function doesEmailExist($email){
  if(!is_null(findUserByEmail($email))){
    return true;
  } else {return false;}
}

function storeUser($email, $name, $password){
  saveUser($email, $name, $password);
}

?>
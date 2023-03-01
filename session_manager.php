<?php 

function doLoginUser($data){
  $_SESSION['id'] = $data['values']['id'];
  $_SESSION['name'] = $data['values']['name'];
}
function isUserLoggedIn(){
  if(isset($_SESSION['name'])){
    return TRUE;
  } else { return FALSE; }
}
function getCurrentUser($value){
  switch($value){
    case 'name':
      return $_SESSION['name'];
    case 'id':
      return $_SESSION['id'];
  }
}
function doLogoutUser(){
  session_unset();
}

?>
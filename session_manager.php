<?php 

function doLoginUser($user){
  $_SESSION['userid'] = $user['id'];
  $_SESSION['username'] = $user['name'];
}
function isUserLoggedIn(){
  if(isset($_SESSION['username'])){
    return TRUE;
  } else { return FALSE; }
}
function getLoggedInUserName(){
  return $_SESSION['username'];
}
function doLogoutUser(){
  session_unset();
}


?>
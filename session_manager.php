<?php 

//=================== USER ========================
function doLoginUser($data){
  $_SESSION['id'] = $data['values']['id'];
  $_SESSION['name'] = $data['values']['name'];
  $_SESSION['cart'] = array();
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

//=================== PRODUCT ========================
function storeInCart($productId, $amount){
  $_SESSION['cart'][$productId] = $amount;
}

function removeFromCart($productId){
  unset($_SESSION['cart'][$productId]);
}

function getCartContent(){
  return $_SESSION['cart'];
}
?>
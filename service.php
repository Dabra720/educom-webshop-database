<?php
require 'repository.php';

// ================================= USERS ==================================
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

// ================================= PRODUCTS ==================================
function getProducts(){
  $data = selectProducts();
  return $data;
}

function getTopFive(){
  $data = selectTopFive();
  return $data;
}

function getProductBy($search, $value){
  switch($search){
    case 'id':
      $product = findProductById($value);
      return $product;
  }
  return NULL;
}

// Om het toevoegen van een knop makkelijker te maken
function addAction($nextpage, $action, $buttonTxt, $productId = NULL, $name = NULL){
  $amount = getAmountFromCart($productId);
  // debug_to_console('Amount: ' . $amount);
  // debug_to_console('Id: ' . $productId);
  if (isUserLoggedIn()){
    echo '<form action="index.php" method="post">';
    echo '<input type="hidden" name="action" value="' . $action . '">';
    if(!empty($productId)){
      echo '<input type="number" name="amount" value="'; echo (!empty($amount)) ? $amount : '1'; echo '" class="" style="float:left; width: 40px;">';
      echo '<input type="hidden" name="id" value="' . $productId . '">';
    }
    if(!empty($name)) {
      echo '<input type="hidden" name="name" value="' . $name . '">';
    }
    echo '<input type="hidden" name="page" value="' . $nextpage . '">';
    echo '<button>' . $buttonTxt . '</button>';
    echo '</form>';
  }
}
// Voor het afhandelen van de acties van de knoppen van hierboven ^^
function handleActions(){
  // $data = array();
  $action = getPostVar("action");
  switch($action) {
    case "addToCart":
      // debug_to_console('Action='.$action);
      $productId = getPostVar("id");
      $amount = getPostVar("amount");
      storeInCart($productId, $amount);
      break;
    case "removeFromCart":
      $productId = getPostVar("id");
      removeFromCart($productId);
      break;
    case "order":
      $user_id = getCurrentUser('id');
      $cartContent = getCartContent(); 
      saveOrder($user_id, $cartContent);
      break;
  }
  // return $data;
}

function saveOrder($userId, $cartContent){

  try{
    storeOrder($userId, $cartContent);
    emptyCart();
  }catch(Exception $e){
    
  }

}
?>
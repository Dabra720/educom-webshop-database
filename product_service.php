<?php
// require 'file_repository.php';

function getProducts(){
  $data = selectProducts();

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
?>
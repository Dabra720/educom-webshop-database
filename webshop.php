<?php
// var_dump($data['products']);
function showWebshopContent($data){
  echo '<h1>Producten</h1>';
  foreach($data['products'] as $key => $value){
    // debug_to_console("key: " . $key);
    // debug_to_console("value: " . $value['id']);
    showProduct($key, $value);
  }
}

function showProduct($key, $value){
  echo '<a href="index.php?page=detail&id='.$value['id'].'" class="product_link">
        <div class="shop_product">
          <div class="shop_title">
            <h3>'.$value['name'].'</h3>
          </div>
          <div class="shop_image">
            <img src="Images/'.$value['filename'].'" alt="'.$value['name'].'" style="width:80%;height:100%">
          </div>
          </a>
          <div class="shop_bottom">
            <div class="shop_price">
              <h3>&#8364; '.$value['price'].'</h3>
            </div>';
  if(isUserLoggedIn()){
    addAction('webshop', 'addToCart', 'Add to Cart', $value['id'], $value['name']);
  }
  echo'</div>
  </div>';
}

?>
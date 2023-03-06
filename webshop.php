<?php
// var_dump($data['products']);
function showWebshopContent($data){
  echo '<h1>Producten</h1>';
  foreach($data['products'] as $key => $value){
    debug_to_console("key: " . $key);
    debug_to_console("value: " . $value['id']);
    showProduct($key, $value);
  }
}

function showProduct($key, $value){
  echo '<a href="index.php?page=product&id='.$value['id'].'" class="product_link">
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
            </div>
            <div class="shop_addcart">
              <form action="index.php" method="post">
              <input type="number" name="amount" value="1" style="float:left; width: 40%;">
              <!--<a href="index.php?page=""><button>Add to Cart</button></a>-->
              <input type="hidden" name="id" value="'.$value['id'].'">
              <input type="hidden" name="price" value="'.$value['price'].'">
              <input type="hidden" name="page" value="addToCart">
              <input type="submit" value="Add to Cart">
              </form>
            </div>
          </div>
          
        </div>
        
        ';
}

?>
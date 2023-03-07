<?php
// var_dump($data);
function showDetailContent($data){
  echo '<div class="product_detail">
    <div class="product_image">
      <img src="Images/'.getArrayVar($data['product'], 'filename').'" style="width:80%;height:100%">
    </div>
    <div class="product_title">
      '.getArrayVar($data['product'], 'name').'
    </div>
    <div class="product_price">
      &#8364; '.getArrayVar($data['product'], 'price').'
    </div>
    <div class="">
      <div class="product_description">
        <p>'.getArrayVar($data['product'], 'description').'</p>
        
      </div>';
  addAction('detail', 'addToCart', 'Add to cart', getArrayVar($data['product'], 'id'), getArrayVar($data['product'], 'name'));
  // if(isUserLoggedIn()){
  //   echo '<div class="product_add" style="display:block; width:30%;">
  //       <form action="index.php" method="post">
  //         <input type="number" name="amount" value="1" style="">
  //         <input type="hidden" name="id" value="'.getArrayVar($data['product'], 'id').'">
  //         <input type="hidden" name="price" value="'.getArrayVar($data['product'], 'price').'">
  //         <input type="hidden" name="page" value="addToCart">
  //         <input type="submit" value="Add to Cart">
  //       </form>
  //     </div>';
  // }
  echo '</div>';
}


?>
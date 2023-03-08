<?php

function showCartContent(){
  $total = 0;
  $cartContent = getCartContent();
  // var_dump($cartContent);
  echo '<h1>Winkelwagen</h1>';
  echo '<table>';
  echo '<tr>
    <th></th>
    <th>Naam</th>
    <th>Aantal</th>
    <th>Prijs</th>
    <th>Wijzig</th>
    </tr>';
  foreach($cartContent as $id=>$amount){
    $product = getProductBy('id', $id);
    $price = $product['price'] * $amount;
    $total += $price;
    echo '<tr>
      <td><a href="index.php?page=detail&id='. $id .'" class="cart_link"><img src="Images/'.$product['filename'].'" class="cart_image"></a></td>
      <td><a href="index.php?page=detail&id='. $id .'" class="cart_link">'. $product['name'] .'</a></td>
      <td style="text-align:center;"><a href="index.php?page=detail&id='. $id .'" class="cart_link">'. $amount .'</a></td>
      <td><a href="index.php?page=detail&id='. $id .'" class="cart_link">&#8364; '. number_format($price, 2, ',', '.') .'</a></td>
      <td>'; addAction('cart', 'updateCart', 'Wijzig', $id); echo '</td>
    </tr>';
  }
  echo '<tr><td></td><td></td><td></td><th>Totaal:</th></tr>';
  echo '<tr><td></td><td></td><td></td><td>&#8364; '. number_format($total, 2, ',', '.') .'</td></tr>';
  echo '<tr><td></td><td></td><td></td><td>'; addAction('home', 'order', 'Afrekenen'); echo '</td></tr>';
  echo '</table>';
}

?>
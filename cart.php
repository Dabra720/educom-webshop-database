<?php

function showCartContent(){
  $total = 0;
  $cartContent = getCartContent();
  var_dump($cartContent);
  echo '<h1>Winkelwagen</h1>';
  echo '<table>';
  echo '<tr>
    <th>Naam</th>
    <th>Aantal</th>
    <th>Prijs</th>
    </tr>';
  foreach($cartContent as $id=>$amount){
    $product = getProductBy('id', $id);
    $price = $product['price'] * $amount;
    $total += $price;
    echo '<tr>
    <td>'. $product['name'] .'</td>
    <td>'. $amount .'</td>
    <td>&#8364; '. $price .'</td>
    </tr>';
  }
  echo '<tr><td></td><td></td><th>Totaal:</th></tr>';
  echo '<tr><td></td><td></td><td>&#8364; '. $total .'</td></tr>';
  echo '</table>';
  
  
}

?>
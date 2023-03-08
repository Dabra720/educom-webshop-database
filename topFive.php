<?php
// var_dump($data);
function showTopFiveContent($data){
  echo '<h1>Top 5 van afgelopen week</h1>';
  echo '<table>';
  echo '<tr>';
  echo '<th></th>';
  echo '<th>Naam:</th>';
  echo '<th>Aantal verkocht:</th>';
  echo '<th>Prijs per stuk:</th>';
  echo '</tr>';
  foreach($data['top'] as $key => $value){
    // debug_to_console("key: " . $key);
    // debug_to_console("value: " . $value['id']);
    showTopFiveRow($value);
  }
  echo '</table>';
}

function showTopFiveRow($value){
  echo '<tr>';
  echo '<td><a href="index.php?page=detail&id='. $value['id'] .'" class="cart_link"><img src="Images/'.$value['filename'].'" class="cart_image"></a></td>';
  echo '<td><a href="index.php?page=detail&id='. $value['id'] .'" class="cart_link">'. $value['name'] .'</a></td>';
  echo '<td><a href="index.php?page=detail&id='. $value['id'] .'" class="cart_link">'. $value['quantity'] .'</a></td>';
  echo '<td><a href="index.php?page=detail&id='. $value['id'] .'" class="cart_link">&#8364; '. number_format($value['price'], 2, ',', '.') .'</a></td>';
  echo '</tr>';
}

?>
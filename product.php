<?php
var_dump($data);
function showProductContent($data){
  echo '<tr><td><h1>'.getArrayVar($data['product'], 'name').'</h1></tr></td>
  <div class="">
    
  </div>
  ';
}


?>
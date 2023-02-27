<?php

function showProfileContent($data){
  echo '
  <h1>Profiel '. $data['values']['name'] .'</h1>
  <form action="index.php" method="POST">
    Naam: <input type="text" value=""><br>
    Email: <input type="text" value""><br>
    Password: <input type="text" value=""><br>
    <input type="submit" value="Opslaan">
  </form>
'; 
}


?>
<?php

function showProfileContent($data){
  echo '
  <h1>Profiel '. $data['name'] .'</h1>
  <form action="index.php" method="POST">
  <table>
    <tr>
      <td>Userid:</td>
      <td><input type="text" value="'. $data['id'] .'"></td>
    </tr>
    <tr>
      <td>Naam:</td>
      <td><input type="text" value="'. $data['name'] .'"></td>
    </tr>
    <tr>
      <td>Email:</td>
      <td><input type="text" value="'. $data['email'] .'"></td>
    </tr>
    <tr>
      <td>Password:</td>
      <td><input type="text" value="'. $data['password'] .'"></td>
      <td><input type="submit" value="Wijzig"></td>
    </tr>
    <tr>
      <td><input type="hidden" name="page" value="profile"></td>
      <td><input type="submit" value="Opslaan"></td>
    </tr>
    
  </table>
  </form>
'; 
}

?>
<?php
// var_dump($data);
function showProfileContentTwo($data){
  echo '
  <h1>Profiel '. $data['values']['name'] .'</h1>
  <form action="index.php" method="POST">
  <table>
    <tr>
      <td>Userid: </td>
      <td>'. $data['values']['id'] .'</td>
    </tr>
    <tr>
      <td>Naam: </td>
      <td>'. $data['values']['name'] .'</td>
    </tr>
    <tr>
      <td>Email: </td>
      <td>'. $data['values']['email'] .'</td>
    </tr>
    <tr>
      <td>Password: </td>
      <td>'. $data['values']['password'] .'</td>
      
    </tr>
    <tr>
      <td><input type="submit" value="Wijzig wachtwoord"></td>
      <td><input type="hidden" name="page" value="change"></td>
    </tr>
  </table>
  </form>
  ';
}

function showProfileContent($data){
  echo '
  <h1>Profiel '. $data['values']['name'] .'</h1>
  <table>
    <tr>
      <td>Userid: </td>
      <td>'. $data['values']['id'] .'</td>
    </tr>
    <tr>
      <td>Naam: </td>
      <td>'. $data['values']['name'] .'</td>
    </tr>
    <tr>
      <td>Email: </td>
      <td>'. $data['values']['email'] .'</td>
    </tr>
    <tr>
      <td>Password: </td>
      <td>'. $data['values']['password'] .'</td>
      
    </tr>
    <tr>
      <td><a href="index.php?page=change" class="submit"><button>Wijzig wachtwoord</button></a></td>
      <td><input type="hidden" name="page" value="change"></td>
    </tr>
  </table>
  ';
}

function showChangePasswordForm($data){
	echo '
  <h1>Wachtwoord wijzigen</h1>
  <span class="error">* required fields</span>
	<form action="index.php" method="POST">
	<table>
		<tr>
			<td><label for="old_pass">Huidige wachtwoord: </label></td>
			<td>
				<input type="text" name="old_pass" id="old_pass" value=""><span class="error">* '.getArrayVar($data['errors'], 'old_pass').'</span>
			</td>
		</tr>
    <tr>
			<td><label for="new_pass">Nieuw wachtwoord: </label></td>
			<td>
				<input type="text" name="new_pass" id="new_pass" value=""><span class="error">* '.getArrayVar($data['errors'], 'new_pass').'</span>
			</td>
		</tr>
		<tr>
			<td><label for="new_pass_rep">Herhaal wachtwoord: </label></td>
			<td>
				<input type="text" name="new_pass_rep" id="new_pass_rep" value=""><span class="error">* '.getArrayVar($data['errors'], 'new_pass_rep').'</span>
			</td>
		</tr>
    <tr>
    <td><input type="submit" value="Opslaan"></td>
    <td><input type="hidden" name="page" value="change"></td>
    </tr>
		</table>
		</form>';
}

?>
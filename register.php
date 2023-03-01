<?php 
require 'forms.php';
function showRegisterContent($data){
  echo '<h1>Registreer nu je account</h1>
  <h2>Voer je gegevens in:</h2>';
  showRegisterForm($data);
}

function showRegisterForm2($data){
  echo '<span class="error">* required fields</span>
	<form action="index.php" method="POST">
	<table>
		<tr>
			<td><label for="name">Naam: </label></td>
			<td>
				<input type="text" name="name" id="name" value="'.getArrayVar($data['values'], 'name').'"><span class="error">* '.getArrayVar($data['errors'], 'name').'</span>
			</td>
		</tr>
		<tr>
			<td><label for="email">E-Mail: </label></td>
			<td>
				<input type="email" name="email" id="email" value="'.getArrayVar($data['values'], 'email').'"><span class="error">* '.getArrayVar($data['errors'], 'email').'</span>
			</td>
		</tr>
		<tr>
			<td><label for="password">Wachtwoord: </label></td>
			<td>
				<input type="password" name="password" id="password" value="'. getArrayVar($data['values'], 'password') . '"><span class="error">* '. getArrayVar($data['errors'], 'password') . '</span>
			</td>
		</tr>
		<tr>
			<td><label for="pass_rep">Herhaal wachtwoord: </label></td>
			<td>
				<input type="password" name="pass_rep" id="pass_rep" value="'. getArrayVar($data['values'], 'pass_rep') . '"><span class="error">* '. getArrayVar($data['errors'], 'pass_rep') . '</span>
			</td>
		</tr>
		<tr>
			<td><input type="hidden" name="page" value="register"></td>
			<td><span class="error">'; if(isset($data['errors']['generic'])) echo $data['errors']['generic']; echo '</span></td>
		</tr>
		<tr>
			<td><input type="submit" value="Registreer"></td>
		</tr>
	</table>
	</form>';
}

function showRegisterForm($data){
	showFormStart(TRUE);
	showFormField('name', 'Naam', 'text', $data);
	showFormField('email', 'E-Mail', 'email', $data);
	showFormField('password', 'Wachtwoord', 'password', $data);
	showFormField('pass_rep', 'Herhaal wachtwoord', 'password', $data);
	showFormEnd('register');
	
}



?>
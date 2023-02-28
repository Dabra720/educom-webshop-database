<?php

function showLoginContent($data){
  echo '<h1>LOGIN</h1>';
  echo '<h2>Vul je gegevens in</h2>';
  showLoginForm($data);
}

function showLoginForm($data){
  echo '<span class="error">* required fields</span>
	<form action="index.php" method="POST">
	<table>
		<tr>
			<td><label for="email">E-Mail: </label></td>
			<td>
				<input type="text" name="email" id="email" value="'. getArrayVar($data['values'], 'email') .'"><span class="error">* '. getArrayVar($data['errors'], 'email') .'</span>
			</td>
		</tr>
		<tr>
			<td><label for="password">Wachtwoord: </label></td>
			<td>
				<input type="text" name="password" id="password" value=""><span class="error">* '. getArrayVar($data['errors'], 'password') . '</span>
			</td>
		</tr>
		<tr>
			<td><input type="hidden" name="page" value="login"></td>
			<td><span class="error">'; if(isset($data['errors']['generic'])) echo $data['errors']['generic']; echo '</span></td>
		</tr>
		<tr>
			<td><input type="submit" value="Log in"></td>
		</tr>
	</table>
		
		
	</form>';
}
?>
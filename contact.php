<?php

function showContactContent($data){
	echo '<h1>Neem contact met ons op</h1>
	<h2>Contactgegevens</h2>';
	showContactForm($data);
}

function showContactThanks($data){
	echo "Beste " . getArrayVar($data['values'], 'aanhef') . " " . getArrayVar($data['values'], 'name') . ", dankjewel voor het posten!" . "<br>";
	echo "Emailadres: " . getArrayVar($data['values'], 'email') . "<br>";
	echo "Telefoonnummer: " . getArrayVar($data['values'], 'phone') . "<br>";
	echo "Communicatievoorkeur: " . getArrayVar($data['values'], 'voorkeur') . "<br>";
	echo "Bericht: " . getArrayVar($data['values'], 'message') . "<br>";
}

function showContactForm($data){
	echo '<span class="error">* required fields</span>
	<form action="index.php" method="POST">
	<table>
		<tr>
			<td><label for="aanhef">Aanhef: </label></td>
			<td>
				<select name="aanhef" id="aanhef">
					<option value="Dhr">Dhr.</option>
					<option value="Mvr">Mvr.</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><label for="name">Naam: </label></td>
			<td>
				<input type="text" name="name" id="name" value="'.getArrayVar($data['values'], 'name').'"><span class="error">* '.getArrayVar($data['errors'], 'name').'</span>
			</td>
		</tr>
		<tr>
			<td>E-Mail: </td>
			<td>
				<input type="text" name="email" value="'.getArrayVar($data['values'], 'email').'"><span class="error">* '.getArrayVar($data['errors'], 'email').'</span>
			</td>
		</tr>
		<tr>
			<td>Telefoonnummer: </td>
			<td>
				<input type="text" name="phone" value="'.getArrayVar($data['values'], 'phone').'"><span class="error">* '.getArrayVar($data['errors'], 'phone').'</span>
			</td>
		</tr>
		<tr>
			<td>Communicatievoorkeur: </td>
			<td>
				<input type="radio" name="voorkeur" '; if (getArrayVar($data['values'], 'voorkeur')=="Email") echo "checked"; echo ' value="Email">Email
				<input type="radio" name="voorkeur" '; if (getArrayVar($data['values'], 'voorkeur')=="Telefoon") echo "checked"; echo ' value="Telefoon">Telefoon <span class="error">* '.getArrayVar($data['errors'], 'voorkeur').'</span>
			</td>
		</tr>
		<tr>
			<td>Bericht</td>
			<td>
				<textarea name="message">'.getArrayVar($data['values'], 'message').'</textarea><span class="error">* '.getArrayVar($data['errors'], 'message').'</span>
			</td>
		</tr>
		<tr>
			<td><input type="hidden" name="page" value="contact"></td>
			<td><input type="submit"></td>
		</tr>
	</table>
	</form>';
}
?>

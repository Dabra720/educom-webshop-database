<?php
require 'forms.php';

function showContactContent($data){
	echo '<h1>Neem contact met ons op</h1>
	<h2>Contactgegevens</h2>';
	showContactForm($data);
}

function showContactThanks($data){
	echo "Beste " . SALUTATIONS[getArrayVar($data['values'], 'aanhef', 'Dhr')] . " " . getArrayVar($data['values'], 'name') . ", dankjewel voor het posten!" . "<br>";
	echo "Emailadres: " . getArrayVar($data['values'], 'email') . "<br>";
	echo "Telefoonnummer: " . getArrayVar($data['values'], 'phone') . "<br>";
	echo "Communicatievoorkeur: " . getArrayVar($data['values'], 'voorkeur') . "<br>";
	echo "Bericht: " . getArrayVar($data['values'], 'message') . "<br>";
}

function showcontactForm($data){
	// debug_to_console('Default array var: ' . SALUTATIONS[getArrayVar($data['values'], 'aanhef')]);  
	showFormStart(true);
	showFormField('aanhef', 'Aanhef', 'select', $data, true, SALUTATIONS);
	showFormField('name', 'Naam', 'text', $data);
	showFormField('email', 'E-Mail', 'email', $data);
	showFormField('phone', 'Telefoon', 'text', $data);
	showFormField('voorkeur', 'Communicatievoorkeur', 'radio', $data, true, COMM_PREFS);
	showFormField('message', 'Bericht', 'textarea', $data);
	showFormEnd('contact');
}
?>

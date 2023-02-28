<?php
// Valideer alle gegevens in het Contactform
function validateContact(){
  $data = array('validForm'=> false, 'values'=> array(), 'errors'=> array());

  if($_SERVER['REQUEST_METHOD']=='POST'){
    $data = validateField($data, 'aanhef', 'isEmpty');
    $data = validateField($data, 'name', 'nameValid');
    $data = validateField($data, 'email', 'emailValid');
    $data = validateField($data, 'phone', 'isEmpty');
    $data = validateField($data, 'voorkeur', 'isEmpty');
    $data = validateField($data, 'message', 'isEmpty');

    if(empty($data['errors'])){
      $data['validForm'] = true;
    }
  }
  return $data;
}

// Valideer alle gegevens in het Registerform
function validateRegister(){
  $data = array('validForm'=> false, 'values'=> array(), 'errors'=> array());

  if($_SERVER['REQUEST_METHOD']=='POST'){
    $data = validateField($data, 'email', 'emailValid');
    $data = validateField($data, 'name', 'nameValid');
    $data = validateField($data, 'password', 'isEmpty');
    $data = validateField($data, 'pass_rep', 'pass_rep:password');

    // debug_to_console($data['values']);
    // var_dump($data['values']);
    try{
      if(!empty($data['values']['email'])){
        if(doesEmailExist($data['values']['email'])){
          $data['errors']['email'] = "Already exists";
        } else{
          if(empty($data['errors'])){
            $data['validForm'] = true;
          }
        }
      }
    } catch (Exception $ex){
      $data['errors']['generic'] = "Er is een technische storing, probeer het later nogmaals.";
      logDebug("Register failed: " . $ex->getMessage());
    }
  }
  return $data;
}

// Valideer alle gegevens in het Loginform
function validateLogin(){
  $data = array('validForm'=> false, 'values'=> array(), 'errors'=> array());
  
  if($_SERVER['REQUEST_METHOD']=='POST'){
    try{
      $user = authenticateUser(getPostVar('email'), getPostVar('password'));
      // $user = authenticateUser($_POST['email'], $_POST['password']);
      if(is_null($user)){
        $data['errors']['email'] = "Email and/or password is wrong";
        $data['errors']['password'] = "Email and/or password is wrong";
      } else{
        $data['validForm'] = true;
        $data['values']['name'] = $user['name'];
        doLoginUser($user); // Deze moet in de index.php gebeuren.
      }
    } catch(Exception $ex){
      $data['errors']['generic'] = "Er is een technische storing, probeer het later nogmaals.";
      logDebug("Authentication failed: " . $ex->getMessage());
    }
    
  }
  return $data;
}

function validateProfile(){
  $data = array('validForm'=> false, 'values'=> array(), 'errors'=> array());
  $user = getUserBy('id', $_SESSION['userid']);
  if($user){
    // debug_to_console("ValidateProfile: " . $user['name']);
    $data['values']['id'] = $user['id'];
    $data['values']['name'] = $user['name'];
    $data['values']['email'] = $user['email'];
    $data['values']['password'] = $user['password'];
  }

  if($_SERVER['REQUEST_METHOD']=='POST'){
    $data['validForm'] = true;
  }
  
  return $data;
}
// Valideer het oude wachtwoord en of er 2x het nieuwe wachtwoord is ingevuld.
function validateChangePassword(){
  $data = array('validForm'=> false, 'values'=> array(), 'errors'=> array());

  $old_pass = getPostVar('old_pass');
  $new_pass = getPostVar('new_pass');
  $pass_rep = getPostVar('new_pass_rep');

  $user = getUserBy('id', $_SESSION['userid']);
  if($user){
    debug_to_console("ValidateProfile: " . $user['name']);
    $data['values']['id'] = $user['id'];
    $data['values']['name'] = $user['name'];
    $data['values']['email'] = $user['email'];
    $data['values']['password'] = $user['password'];
  }

  if($_SERVER['REQUEST_METHOD']=="POST"){
    $data = validateField($data, 'old_pass', 'isEmpty');
    if($old_pass == $user['password']){
      $data = validateField($data, 'new_pass', 'pass_rep:new_pass_rep');
    } else {
      $data['errors']['old_pass'] = "Password is incorrect";
    }
    
    
  }

  return $data;
}

function validateField($array, $value, $check){
  $checkFields = explode(":", $check);
  switch($checkFields[0]){
    case 'isEmpty':
      if(empty(getPostVar($value))){
        $array['errors'][$value] = $value . " is required";
      } else {
        $array['values'][$value] = test_input(getPostVar($value));
      }
      break;
    case 'nameValid':
      if (empty(getPostVar($value))) {
        $array['errors'][$value] = "Name is required";
      } else {
        $array['values'][$value] = test_input(getPostVar($value));
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$array['values'][$value])) {
          $array['errors'][$value] = "Only letters and white space allowed";
        }
      }
      break;
    case 'emailValid':
      if(empty(getPostVar($value))){
        $array['errors'][$value] = "Email is required";
      } else {
        $array['values'][$value] = test_input(getPostVar($value));
        // check if e-mail address is well-formed
        if (!filter_var($array['values'][$value], FILTER_VALIDATE_EMAIL)) {
          $array['errors'][$value] = "Invalid ". $value ." format";
        }
      }
      break;
    case 'pass_rep':
      if(empty(getPostVar($value))){
        $array['errors'][$value] = "Repeat the password";
      } else {
        if(!strcmp(getPostVar($value), $array['values'][$checkFields[1]])){
          $array['values'][$value] = getPostVar($value);
        } else{
          $array['errors'][$value] = "Passwords don't match";
          $array['errors'][$checkFields[1]] = "Passwords don't match";
          $array['values'][$value] = "";
          $array['values'][$checkFields[1]] = "";
        }
      }
      break;
  }
  return $array;
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
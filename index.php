<?php 
session_start();
require 'validation.php';
require 'service.php';
// require 'product_service.php';
require 'session_manager.php';

$page = getRequestedPage();
$data = processRequest($page);
// var_dump($data);
// var_dump($_SESSION);
showResponsePage($data);

function getRequestedPage() 
{     
   $requested_type = $_SERVER['REQUEST_METHOD']; 
   if ($requested_type == 'POST') 
   { 
       $requested_page = getPostVar('page','home');
   } 
   else 
   { 
       $requested_page = getUrlVar('page','home');
   } 
   $requested_page = test_input($requested_page);
   return $requested_page; 
} 

function processRequest($page){
  switch ($page){
    case 'login':
      $data = validateLogin();
      if($data['validForm']){
        doLoginUser($data);
        $page = 'home';
      }
      break;
    case 'logout':
      doLogoutUser();
      $page = 'home';
      break;
    case 'contact';
      $data = validateContact();
      if($data['validForm']){
        $page = 'thanks';
      }
      break;
    case 'register':
      $data = validateRegister();
      if($data['validForm']){
        storeUser($data['values']['email'], $data['values']['name'], $data['values']['password']);
        $page = 'login';
      }
      break;
    case 'profile':
        if(isUserLoggedIn()){
          $data = validateChangePassword();
          $page='profile';
        } else {
          $data = validateLogin();
          $page ='login';
        }
      break;
    case 'change':
      $data = validateChangePassword();
      if($data['validForm']){
        updateUser('password', $data['values']['new_pass']);
        $data = validateChangePassword();
        $page = 'profile';
      } else {$page = 'change';}
      break;
    case 'webshop':
      handleActions();
      $data = getProducts();
      break;
    case 'topFive':
      $data = getTopFive();
      break;
    case 'detail':
      handleActions();
      if($_SERVER['REQUEST_METHOD'] == "GET"){
        $data['product'] = getProductBy('id', getUrlVar('id'));
      } else{
        $data['product'] = getProductBy('id', getPostVar('id'));
      }
      break;
    case 'cart':
      handleActions();
      break;
    case 'home':
      handleActions();
      break;
    // case 'addToCart':
    //   $data = validateProduct();
    //   if($data['validForm']){
    //     $id = $data['product']['id'];
    //     $amount = $data['product']['amount'];
    //     storeInCart($id, $amount);
    //   }
    //   $data = getProducts();
    //   $page = 'webshop';
    //   break;
  }
  $data['page'] = $page;
  $data['menu'] = array('home' => 'HOME', 'about' => 'ABOUT', 'contact' => 'CONTACT', 'webshop'=>'WEBSHOP', 'topFive'=>'TOP 5');
  if(isUserLoggedIn()){
    $data['menu']['cart'] = "CART";
    $data['menu']['profile'] = "PROFILE";
    $data['menu']['logout'] = "LOGOUT " . getCurrentUser('name');
  } else{
    $data['menu']['register'] = "REGISTER";
    $data['menu']['login'] = "LOGIN";
  }
  return $data;
}

function showResponsePage($data){
  showDocumentStart();
  showHeadSection($data);
  showBodySection($data);
  showDocumentEnd();
}

function showBodySection($data){
  echo '<body>';
  showHeader($data);
  echo '<div class="content">';
  showContent($data);
  echo '</div>';
  showFooter();
  echo '</body>';
}

function showContent($data){
  switch($data['page']){
    case "home":
      require('home.php');
      showHomeContent();
      break;
    case "about":
      require('about.php');
      showAboutContent();
      break;
    case "contact":
      require('contact.php');
      showContactContent($data);
      break;
    case "register":
      require('register.php');
      showRegisterContent($data);
      break;
    case "login":
      require('login.php');
      showLoginContent($data);
      break;
    case "thanks":
      require 'contact.php';
      showContactThanks($data);
      break;
    case "profile":
      require 'profile.php';
      showProfileContent($data);
      break;
    case 'change':
      require 'profile.php';
      showChangePasswordForm($data);
      break;
    case 'webshop':
      require 'webshop.php';
      showWebshopContent($data);
      break;
    case 'topFive':
      require_once 'topFive.php';
      showTopFiveContent($data);
      break;
    case 'detail':
      require 'detail.php';
      showDetailContent($data);
      break;
    case 'cart':
      require 'cart.php';
      showCartContent();
      break;
    default:
      pageNotFound($data);
  }
}

function showDocumentStart(){
  echo '<!DOCTYPE html>
        <html>';
}

function showHeadSection($data){
  echo '<head>
	        <meta charset="UTF-8">
	        <title>'. $data['page'] .'</title>
          <link rel="stylesheet" href="CSS/stylesheet.css">
        </head>';
}

function showHeader($data){
  echo '
  <header>
		<ul class="navbar">';
  foreach($data['menu'] as $link => $label){
    showMenuItem($link, $label);
  }
	echo '</ul>
	</header>';
}

function showMenuItem($link, $label){
  echo "<li class=''><a href='index.php?page=$link'>$label</a></li>";
}

function showFooter(){
  echo '<footer>
  &#169; 2023 Daan Braas
  </footer>';
}

function showDocumentEnd(){
  echo "</html>";
}

function pageNotFound($data){
  var_dump($data);
  echo '<h1>PAGE NOT FOUND 404</h1>';
}

function getValue($data, $key, $default=''){
  return getArrayVar($data['values'], $key, $default);
}
function getArrayVar($array, $key, $default='') 
{ 
   return isset($array[$key]) ? $array[$key] : $default; 
}

function getPostVar($key, $default='')
{ 
  $value = filter_input(INPUT_POST, $key); 
  return isset($value) ? $value : $default;
} 

function getUrlVar($key, $default=''){
  return isset($_GET[$key]) ? $_GET[$key] : $default;
}

// Debug tool, om variabelen makkelijk te kunnen checken
function debug_to_console($data) {
  $output = $data;
  if (is_array($output))
      $output = implode(',', $output);

  echo "<script>console.log('Debug Objects: " . $output . "');</script>";
}

function logDebug($msg){
  debug_to_console($msg);
}

?>
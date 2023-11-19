<?php
// Get the database connection file
  require_once 'library/connections.php';
  require_once 'library/functions.php';
  // Get the PHP Motors model for use as needed
  require_once 'model/main-model.php';
  // Create or access a Session
 session_start();
  
  // Get the array of classifications
  $classifications = getClassifications();

//  var_dump($classifications);
//  	exit;
  
  
  // Build a navigation bar using the $classifications array
  $navList = createNav( $classifications);
//  echo $navList;
//  exit;
  
  $action = filter_input(INPUT_POST, 'action');
  if ($action === null) {
    $action = filter_input(INPUT_GET, 'action');
  }
  // Check if the firstname cookie exists, get its value
  if(isset($_COOKIE['firstname'])){
  $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 }
  switch ($action) {
    case 'template':
      include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/template.php';
      break;
    default:
      include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/home.php';
      break;
  }

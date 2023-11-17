<?php
// The Vehicles Controller

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the vehical model
require_once '../model/vehicles-model.php';
// Get the functions file
require_once '../library/functions.php';
// Create or access a Session
session_start();

// Get the array of classifications
$classifications = getClassifications();

// Build a navigation bar using the $classifications array
$navList = '<ul>';
$navList .= "<li><a href='/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
    $navList .= "<li><a href='/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

// Build a car classification drop down list.
$carClassifications = "<select name = 'carClassifications'>";
foreach($classifications as $classification) {
    $tag = '<option value="">'.$classification['classificationName'].'</option>';
    $tag = substr_replace($tag, $classification['classificationId'], 15, 0);
    $carClassifications .= $tag;
}
$carClassifications .= '</select>';

switch ($action){

    case 'classification':
        include "../view/add-classification.php";
        break;

    case 'vehicle':
        include "../view/add-vehicle.php";
        break;

    case 'addVehicle':
        // Filter the input
        $classType = filter_input(INPUT_POST, 'carClassifications');
        $make = filter_input(INPUT_POST, 'make');
        $model = filter_input(INPUT_POST, 'model');
        $description = filter_input(INPUT_POST, 'description');
        $image = filter_input(INPUT_POST, 'image');
        $thumb = filter_input(INPUT_POST, 'thumb');
        $price = filter_input(INPUT_POST, 'price');
        $stock = filter_input(INPUT_POST, 'stock');
        $color = filter_input(INPUT_POST, 'color');

        // Check for missing data
        if(empty($classType) || empty($make) || empty($model) || empty($description) || empty($image) || empty($thumb) || empty($price) || empty($stock) || empty($color)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/add-vehicle.php';
            exit; 
        }

        // Add Data to database
        $AddVehicleReport = newVehicle($make, $model, $description, $image, $thumb, $price, $stock, $color, $classType);
        // Check and report the result
        if($AddVehicleReport === 1){
            $message = "<p>Vehical registration was a success.</p>";
            include '../view/vehicle-management.php';
            exit;
        } else {
            $message = "<p>Sorry, but the registration failed. Please try again.</p>";
            include '../view/add-vehicle.php';
            exit;
        }
        break;

    case 'addClass':
        // Filter the input
        $newClass = filter_input(INPUT_POST, 'newClassification');

        // Check for missing data
        if(empty($newClass)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/add-classification.php';
            exit; 
        }

        // Add Data to database
        $AddClassReport = newClassification($newClass);
        // Check and report the result
        if($AddClassReport === 1){
            $message = "<p>Car Classification registration was a success.</p>";
            include '../view/vehicle-management.php';
            exit;
        } else {
            $message = "<p>Sorry, but the registration failed. Please try again.</p>";
            include '../view/add-classification.php';
            exit;
        }
        break;

    /* * ********************************** 
    * Get vehicles by classificationId 
    * Used for starting Update & Delete process 
    * ************************************/ 
    case 'getInventoryItems': 
        // Get the classificationId 
        $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT); 
        // Fetch the vehicles by classificationId from the DB 
        $inventoryArray = getInventoryByClassification($classificationId); 
        // Convert the array to a JSON object and send it back 
        echo json_encode($inventoryArray); 
        break;

    case 'mod':
        $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $invInfo = getInvItemInfo($invId);
        if(count($invInfo)<1){
            $message = 'Sorry, no vehicle information could be found.';
        }
        include '../view/vehicle-update.php';
        exit;
        break;

    case 'del':
        $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $invInfo = getInvItemInfo($invId);
        if (count($invInfo) < 1) {
            $message = 'Sorry, no vehicle information could be found.';
        }
        include '../view/vehicle-delete.php';
        exit;
        break;

    case 'updateVehicle':
        // Filter the input
        $classType = filter_input(INPUT_POST, 'carClassifications', FILTER_SANITIZE_STRING);
        $make = filter_input(INPUT_POST, 'make', FILTER_SANITIZE_STRING);
        $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);
        $thumb = filter_input(INPUT_POST, 'thumb', FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $stock = filter_input(INPUT_POST, 'stock', FILTER_SANITIZE_NUMBER_INT);
        $color = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_STRING);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

        // Check for missing data
        if(empty($classType) || empty($make) || empty($model) || empty($description) || empty($image) || empty($thumb) || empty($price) || empty($stock) || empty($color)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/vehicle-update.php';
            exit; 
        }

        // Add Data to database
        $updateResult = updateVehicle($make, $model, $description, $image, $thumb, $price, $stock, $color, $classType, $invId);
        // Check and report the result
        if($updateResult === 1){
            $message = "<p>Vehical update was a success.</p>";
            $_SESSION['message'] = $message;
            header( 'location: /vehicles/');
            exit;
        } else {
            $message = "<p>Sorry, but the update failed. Please try again.</p>";
            include '../view/vehicle-update.php';
            exit;
        }
        break;

    case 'deleteVehicle':
        // Filter the input
        $make = filter_input(INPUT_POST, 'make', FILTER_SANITIZE_STRING);
        $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

        // Add Data to database
        $deleteResult = deleteVehicle($invId);
        // Check and report the result
        if($deleteResult === 1){
            $message = "<p>Vehical delete of $make $model was a success.</p>";
            $_SESSION['message'] = $message;
            header('location: /vehicles/');
            exit;
        } else {
            $message = "<p>Sorry, but the delete of $make $model failed. Please try again.</p>";
            $_SESSION['message'] = $message;
	        header('location: /vehicles/');
	        exit;
        }
        break;

    default:
        $classificationList = buildClassificationList($classifications);    
        include "../view/vehicle-management.php";
        break;
}
?>
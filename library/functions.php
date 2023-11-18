<?php
function checkEmail($clientEmail){
 $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
 return $valEmail;
}

// Check the password for a minimum of 8 characters,
 // at least one 1 capital letter, at least 1 number and
 // at least 1 special character
 function checkPassword($clientPassword){
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]\s])(?=.*[A-Z])(?=.*[a-z])(?:.{8,})$/';
    return preg_match($pattern, $clientPassword);
   }


   
// Build the classifications select list 
function buildClassificationList($classifications){ 
   $classificationList = '<select name="classificationId" id="classificationList">'; 
   $classificationList .= "<option>Choose a Classification</option>"; 
   foreach ($classifications as $classification) { 
       $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>"; 
   } 
   $classificationList .= '</select>'; 
   return $classificationList; 
}


// The function will build a display of vehicles within an unordered list.
function buildVehiclesDisplay($vehicles){
   $dv = '<ul id="inv-display">';
   foreach ($vehicles as $vehicle) {
       $dv .= '<li>';
       $dv .= "<a href = '/vehicles/index.php?action=vehicleView&Vehicle=$vehicle[invId]'>";
       $dv .= "<img src='$vehicle[invThumbnail]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'>";
       $dv .= '<hr>';
       $dv .= "<h2>$vehicle[invMake] $vehicle[invModel]</h2>";
       $dv .= "<span>$vehicle[invPrice]</span>";
       $dv .= '</a>';
       $dv .= '</li>';
   }
   $dv .= '</ul>';
   return $dv;
}

// The function will build a display of vehicle's details.
function buildVehiclesHTML($vehiclesDetail){
   $dv = "<section class = 'car-details'>";
   $dv .= "<img src='$vehiclesDetail[invImage]' alt='$vehiclesDetail[invMake]-$vehiclesDetail[inModel]'>";
   $dv .= '<h2>Price: $'.number_format($vehiclesDetail['invPrice']).'</h2>';
   $dv .= "<h2>$vehiclesDetail[invMake] $vehiclesDetail[inModel] Details</h2>";
   $dv .= "<p>$vehiclesDetail[invDescription]</p>";
   $dv .= "<p>Color: $vehiclesDetail[invColor]</p>";
   $dv .= "<p>Number in Stock: $vehiclesDetail[invStock]</p>";
   $dv .= '</section>';
   return $dv;
}
?>
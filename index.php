<?php
/*
 * This is the ACME Controller
 */

// Create or access a Session
session_start();

// Get the database connection file
require_once 'library/connections.php';
// Get the acme model for use as needed
require_once 'model/acme-model.php';
// Get the functions library
require_once 'library/functions.php';
 
// Get the array of categories
$categories = getCategories();

// Build a navigation bar using the $categories array
$navList = createNav($categories);

// Build the HTML for the feature product
$newFeatureInfo = getFutureProductInfo();
$featuredSection = buildFeaturedSection($newFeatureInfo);   

//  This Defines the MVC Structure
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
   if ($action == NULL){
      $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
   }

// Check if the firstname cookie exists, get its value
if(isset($_COOKIE['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}
   
// This will define which view will be displayed
switch ($action){
   case 'template':
      include 'template/template.php';
      break; 
   default:
      // The default will always deliver the homepage.
      include 'view/home.php';
      break;
}


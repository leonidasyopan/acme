<?php

/* * ****************************************************
*        This is the Reviews Controller application
* **************************************************** */

session_start();

require_once '../library/connections.php';
require_once '../model/acme-model.php';
require_once '../model/products-model.php';
require_once '../model/uploads-model.php';
require_once '../model/reviews-model.php';
require_once '../library/functions.php';

//  This Defines the MVC Structure
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
   if ($action == NULL){
      $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
   }

// Get the array of categories
$categories = getCategories();   
   
// Build a navigation bar using the $categories array
$navList = createNav($categories);

/* * ****************************************************
*   This is the Control Structure for the Controller
* **************************************************** */
switch ($action) {
   case 'addReview':

   break;
   case 'editReview':

   break;
   case 'updateReview':

   break;
   case 'deleteReview':

   break;
   case 'confirmReviewDelete':

   break;
   default:
   
   include '../view/image-admin.php';
   exit; 
 break;
}
<?php
/*
 * This is the PRODUCTS Controller
 */

// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the acme model for use as needed
require_once '../model/acme-model.php';
// Get the products model
require_once '../model/products-model.php';
// Get the uploads model
require_once '../model/uploads-model.php';
// Get the functions library
require_once '../library/functions.php';

// Get the array of categories
$categories = getCategories();
 
// Get the array of category products
$categoryProducts = getCategoryProduct();

// Build a navigation bar using the $categories array
$navList = createNav($categories);

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
   case 'addCategory':        
      // Filter and store the data 
      $categoryName = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_STRING);      

      // Check for missing data
      if (empty($categoryName)) {
          $message = '<p class="warning-message">Please provide at least one new category name.</p>';
          include '../view/new-cat.php';
          exit;
      }

      // Send the data to the model 
      $addCategory = addCategory($categoryName);

      // Check and report the result
      if ($addCategory === 1){
          header('location:/products/');
          exit;
      } else {
          $message = '<p class="warning-message">Sorry, ' . "$categoryName was not added. Please, try again.</p>";
          include '../view/new-cat.php';
          exit;
      } 
   break;
   case 'addProduct':
      // Filter and store the data     
      $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
      $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
      $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_URL);
      $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_URL);
      $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
      $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
      $invSize = filter_input(INPUT_POST, 'invSize', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
      $invWeight = filter_input(INPUT_POST, 'invWeight', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
      $invLocation = filter_input(INPUT_POST, 'invLocation', FILTER_SANITIZE_STRING);
      $categoryId = filter_input(INPUT_POST, 'categoryId', FILTER_SANITIZE_NUMBER_INT);
      $invVendor = filter_input(INPUT_POST, 'invVendor', FILTER_SANITIZE_STRING);
      $invStyle = filter_input(INPUT_POST, 'invStyle', FILTER_SANITIZE_STRING);   

      // Check for missing data
      if (empty($invName) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invSize) || empty($invWeight) || empty($invLocation) || empty($categoryId) || empty($invVendor) || empty($invStyle)) {
      $message = '<p class="warning-message">Please complete all information for the new item. Double check the category of the item.</p>';
      include '../view/new-prod.php';
      exit;
      }

      // Send the data to the model 
      $addProduct = addProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle);

      // Check and report the result
      if ($addProduct === 1){
          $message = '<p class="warning-message">The operations was successful. Thanks for registering'. " <strong>$invName</strong> as a new product.</p>";
          include '../view/new-prod.php';
          exit;
      } else {
          $message = '<p class="warning-message">Sorry, ' . " <strong>$invName</strong> could NOT be added. Please try again.</p>";
          include '../view/new-prod.php';
          exit;
      }
   break;
   case 'newCat': 
      include '../view/new-cat.php';
   break; 
   case 'newProd':
      include '../view/new-prod.php';
   break;
   case 'mod':
      $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
      $prodInfo = getProductInfo($invId);
      if(count($prodInfo) < 1){
         $message = '<p class="warning-message">Sorry, no product information could be found.</p>';
      }
      include '../view/prod-update.php';
      exit;
   break;
   case 'updateProd':
      // Filter and store the data     
      $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
      $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
      $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_URL);
      $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_URL);
      $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
      $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
      $invSize = filter_input(INPUT_POST, 'invSize', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
      $invWeight = filter_input(INPUT_POST, 'invWeight', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
      $invLocation = filter_input(INPUT_POST, 'invLocation', FILTER_SANITIZE_STRING);
      $categoryId = filter_input(INPUT_POST, 'categoryId', FILTER_SANITIZE_NUMBER_INT);
      $invVendor = filter_input(INPUT_POST, 'invVendor', FILTER_SANITIZE_STRING);
      $invStyle = filter_input(INPUT_POST, 'invStyle', FILTER_SANITIZE_STRING);
      $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

      // Check for missing data
      if (empty($invName) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invSize) || empty($invWeight) || empty($invLocation) || empty($categoryId) || empty($invVendor) || empty($invStyle)) {
      $message = '<p class="warning-message">Please complete all information to update the item.</p>';
      include '../view/prod-update.php';
      exit;
      }

      // Send the data to the model 
      $updateResult = updateProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle, $invId);

      // Check and report the result
      if ($updateResult === 1){
         $message = '<p class="warning-message">The operations was successful. Thanks for updating the information for: '. " <strong>$invName</strong>.</p>";
         $_SESSION['message'] = $message;
         header('location: /products/');
         exit;
      } else {
         $message = '<p class="warning-message">Sorry, ' . " <strong>$invName</strong> could NOT be updated. Please try again.</p>";
         include '../view/prod-update.php';
         exit;
      }
   break;
   case 'del':
        $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $prodInfo = getProductInfo($invId);
        if(count($prodInfo) < 1){
           $message = '<p class="warning-message">Sorry, no product information could be found.</p>';
        }
        include '../view/prod-delete.php';
        exit;
   break;
   case 'deleteProd':
        // Filter and store the data     
        $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);      
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);      

        // Send the data to the model 
        $deleteResult = deleteProduct($invId);

        // Check and report the result
        if ($deleteResult === 1){
           $message = '<p class="warning-message">The operations was successful.'. " <strong>$invName</strong> was properly deleted.</p>";
           $_SESSION['message'] = $message;
           header('location: /products/');
           exit;
        } else {
           $message = '<p class="warning-message">Sorry, ' . " <strong>$invName</strong> could NOT be deleted. Please try again.</p>";
           $_SESSION['message'] = $message;
           header('location: /products/');
           exit;
        }
   break;
   case 'category':
        $categoryName = filter_input(INPUT_GET, 'categoryName', FILTER_SANITIZE_STRING);
        $products = getProductsByCategory($categoryName);
        if(!count($products)){
            $message = "<p class='warning-message'>Sorry, no $categoryName products could be found.</p>";
        } else {
            $prodDisplay = buildProductsDisplay($products);
        }
        include '../view/category.php';
   break;
   case 'invInfo':
        $invName = filter_input(INPUT_GET, 'invName', FILTER_SANITIZE_STRING);
        $invId = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_NUMBER_INT);
        $invInfo = getInvInfoById($invId);
        if(!count($invInfo)){
            $message = "<p class='warning-message'>Sorry, the product could not be found.</p>";
        } else {
            $itemDisplay = buildInvInfoDisplay($invInfo);
            $thumbnails = getThumbnails($invId);
            $displayThumbnails = buildThumbnailsDisplay($thumbnails, $invName);
        }
        include '../view/product-detail.php';
   break;
   case 'feature':
      $newFeatureId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
      $newFeatureName = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);
      $currentFeature = checkCurrentFeature();
      foreach ($currentFeature as $cf) {
         $currentId = $cf['invId'];
         $currentName = $cf['invName'];
      }   

      $currentFeatureCleared = clearCurrentFeature($currentId);
      $newFeatureSet = setNewFeature($newFeatureId);
      
      if($currentFeatureCleared === 1 && $newFeatureSet === 1) {
         $setFeatureProduct = 1;
      } else {
         $message = '<p class="warning-message">The operations was NOT successful. Please try again.</p>';
         $_SESSION['message'] = $message;
         header('location: /products/');
         exit;
      }    
      
      if ($setFeatureProduct === 1){
//         $newFeatureInfo = getNewFutureInfo ($newFeatureId);
//         $featuredSection = buildFeaturedSection($newFeatureInfo);
         $message = '<p class="warning-message">Previously feature item: '. " <strong>$currentName</strong> was cleared. New feature item: <strong>$newFeatureName</strong> was set.</p>";
         $_SESSION['message'] = $message;
         header('location: /products/');   
         exit;
        }         
   exit;     
   break;
   default:   
      $products = getProductBasics();
      if(count($products) > 0){
         $prodList = '<table id="products-table-management">';
         $prodList .= '<thead>';
         $prodList .= '<tr><th>Product Name</th><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
         $prodList .= '</thead>';
         $prodList .= '<tbody>';
         foreach ($products as $product) {
          $prodList .= "<tr><td>$product[invName]</td>";
          $prodList .= "<td><a href='/products?action=mod&id=$product[invId]' title='Click to modify'>Modify</a></td>";
          $prodList .= "<td><a href='/products?action=del&id=$product[invId]' title='Click to delete'>Delete</a></td>";
          $prodList .= "<td><a href='/products?action=feature&id=$product[invId]&name=".urlencode($product['invName'])."' title='Click to set as feature product'>Feature</a></td></tr>";
//          $prodList .= "<td><a href='/products?action=feature&id=$product[invId]&name=$product[invName]' title='Click to set as feature product'>Feature</a></td></tr>";
         }
          $prodList .= '</tbody></table>';
         } else {
          $message = '<p class="warning-message">Sorry, no products were returned.</p>';
      }
      include '../view/prod-mgmt.php';
   break;
}


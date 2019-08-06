<?php

/* * ****************************************************
*        This is the Products Model
* **************************************************** */

function getCategoryProduct(){
   // Create a connection object from the acme connection function
   $db = acmeConnect(); 
   // The SQL statement to be used with the database 
   $sql = 'SELECT categoryId, categoryName FROM categories ORDER BY categoryName ASC'; 
   // The next line creates the prepared statement using the acme connection      
   $stmt = $db->prepare($sql);
   // The next line runs the prepared statement 
   $stmt->execute(); 
   // The next line gets the data from the database and 
   // stores it as an array in the $categoryProducts variable 
   $categoryProducts = $stmt->fetchAll(); 
   // The next line closes the interaction with the database 
   $stmt->closeCursor(); 
   // The next line sends the array of data back to where the function 
   // was called (this should be the controller) 
   return $categoryProducts;
}

// Insert new category to the database
function addCategory($categoryName){
   // Create a connection object using the acme connection function
   $db = acmeConnect();
   // The SQL statement to be used with the database
   $sql = 'INSERT INTO categories (categoryName) VALUES (:categoryName)';
   // The next line creates the prepared statement using the acme connection
   $stmt = $db->prepare($sql);
   // The next four lines replace the placeholders in the SQL statement with the actual values in the variables and tells the database the type of data it is
   $stmt->bindValue(':categoryName', $categoryName, PDO::PARAM_STR);    
   // Use the prepared statement to insert the data
   $stmt->execute();
   // Now we find out if the insert worked by asking how many rows changed in the table
   $rowsChanged = $stmt->rowCount();    
   // Close the database  interaction
   $stmt->closeCursor();
   // Return the indication of success
   return $rowsChanged;
}

// Insert new product to database
function addProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle){
   // Create a connection object using the acme connection function
   $db = acmeConnect();
   // The SQL statement to be used with the database
   $sql = 'INSERT INTO inventory (invName, invDescription, invImage, invThumbnail, invPrice, invStock, invSize, invWeight, invLocation, categoryId, invVendor, invStyle) VALUES (:invName, :invDescription, :invImage, :invThumbnail, :invPrice, :invStock, :invSize, :invWeight, :invLocation, :categoryId, :invVendor, :invStyle)';
   // The next line creates the prepared statement using the acme connection
   $stmt = $db->prepare($sql);
   // The next lines replace the placeholders in the SQL statement with the actual values in the variables and tells the database the type of data it is    
   $stmt->bindValue(':invName', $invName, PDO::PARAM_STR);
   $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
   $stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
   $stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
   $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_STR);
   $stmt->bindValue(':invStock', $invStock, PDO::PARAM_INT);
   $stmt->bindValue(':invSize', $invSize, PDO::PARAM_INT);
   $stmt->bindValue(':invWeight', $invWeight, PDO::PARAM_INT);
   $stmt->bindValue(':invLocation', $invLocation, PDO::PARAM_STR);
   $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_INT);
   $stmt->bindValue(':invVendor', $invVendor, PDO::PARAM_STR);
   $stmt->bindValue(':invStyle', $invStyle, PDO::PARAM_STR);    
   // Use the prepared statement to insert the data
   $stmt->execute();
   // Now we find out if the insert worked by asking how many rows changed in the table
   $rowsChanged = $stmt->rowCount();    
   // Close the database  interaction
   $stmt->closeCursor();
   // Return the indication of success
   return $rowsChanged;
}
 
// Gets basic product information from the inventory table for starting an update or delete process
function getProductBasics() {
   $db = acmeConnect();
   $sql = 'SELECT invName, invId FROM inventory ORDER BY invName ASC';
   $stmt = $db->prepare($sql);
   $stmt->execute();
   $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
   $stmt->closeCursor();
   return $products;
}

// Gets a single product information based on its id
function getProductInfo($invId){
   $db = acmeConnect();
   $sql = 'SELECT * FROM inventory WHERE invId = :invId';
   $stmt = $db->prepare($sql);
   $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
   $stmt->execute();
   $prodInfo = $stmt->fetch(PDO::FETCH_ASSOC);
   $stmt->closeCursor();
   return $prodInfo;
}

// Update a product in the database
function updateProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle, $invId){
   // Create a connection object using the acme connection function
   $db = acmeConnect();
   // The SQL statement to be used with the database
   $sql = 'UPDATE inventory SET invName = :invName, invDescription = :invDescription, invImage = :invImage, invThumbnail = :invThumbnail, invPrice = :invPrice, invStock = :invStock, invSize = :invSize, invWeight = :invWeight, invLocation = :invLocation, categoryId = :categoryId, invVendor = :invVendor, invStyle = :invStyle WHERE invId = :invId';
   // The next line creates the prepared statement using the acme connection
   $stmt = $db->prepare($sql);
   // The next lines replace the placeholders in the SQL statement with the actual values in the variables and tells the database the type of data it is    
   $stmt->bindValue(':invName', $invName, PDO::PARAM_STR);
   $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
   $stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
   $stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
   $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_STR);
   $stmt->bindValue(':invStock', $invStock, PDO::PARAM_INT);
   $stmt->bindValue(':invSize', $invSize, PDO::PARAM_INT);
   $stmt->bindValue(':invWeight', $invWeight, PDO::PARAM_INT);
   $stmt->bindValue(':invLocation', $invLocation, PDO::PARAM_STR);
   $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_INT);
   $stmt->bindValue(':invVendor', $invVendor, PDO::PARAM_STR);
   $stmt->bindValue(':invStyle', $invStyle, PDO::PARAM_STR);
   $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
   // Use the prepared statement to insert the data
   $stmt->execute();
   // Now we find out if the insert worked by asking how many rows changed in the table
   $rowsChanged = $stmt->rowCount();    
   // Close the database  interaction
   $stmt->closeCursor();
   // Return the indication of success
   return $rowsChanged;
}

// Detele a product from the database
function deleteProduct($invId){
   // Create a connection object using the acme connection function
   $db = acmeConnect();
   // The SQL statement to be used with the database
   $sql = 'DELETE FROM inventory WHERE invId = :invId';
   // The next line creates the prepared statement using the acme connection
   $stmt = $db->prepare($sql);
   // The next lines replace the placeholders in the SQL statement with the actual values in the variables and tells the database the type of data it is 
   $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
   // Use the prepared statement to insert the data
   $stmt->execute();
   // Now we find out if the insert worked by asking how many rows changed in the table
   $rowsChanged = $stmt->rowCount();    
   // Close the database  interaction
   $stmt->closeCursor();
   // Return the indication of success
   return $rowsChanged;
}

// Get a list of products based on the category
function getProductsByCategory($categoryName){
   $db = acmeConnect();
   $sql = 'SELECT * FROM inventory WHERE categoryId IN (SELECT categoryId FROM categories WHERE categoryName = :categoryName)';
   $stmt = $db->prepare($sql);
   $stmt->bindValue(':categoryName', $categoryName, PDO::PARAM_STR);
   $stmt->execute();
   $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
   $stmt->closeCursor();
   return $products;
}

// Retrieve information about a specific inventory item and return it to the controller
function getInvInfoById($invId){
   $db = acmeConnect();
   $sql = 'SELECT * FROM inventory WHERE invId = :invId';
   $stmt = $db->prepare($sql);
   $stmt->bindValue(':invId', $invId, PDO::PARAM_STR);
   $stmt->execute();
   $invInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
   $stmt->closeCursor();
   return $invInfo;
}

function checkCurrentFeature() {
   $db = acmeConnect();
   $sql = 'SELECT invId, invName FROM inventory WHERE invFeatured IS NOT NULL';
   $stmt = $db->prepare($sql);   
   $stmt->execute();
   $feature = $stmt->fetchAll(PDO::FETCH_ASSOC);
   $stmt->closeCursor();
   return $feature;
}

function clearCurrentFeature($currentId) {
   $db = acmeConnect();
   $sql = 'UPDATE inventory SET invFeatured = NULL WHERE invId = :invId';   
   $stmt = $db->prepare($sql);
   $stmt->bindValue(':invId', $currentId, PDO::PARAM_INT);
   $stmt->execute();
   $rowsChanged = $stmt->rowCount();
   $stmt->closeCursor();
   return $rowsChanged;
}

function setNewFeature($newFeatureId) {
   $db = acmeConnect();
   $sql = 'UPDATE inventory SET invFeatured = TRUE WHERE invId = :invId';   
   $stmt = $db->prepare($sql);
   $stmt->bindValue(':invId', $newFeatureId, PDO::PARAM_INT);
   $stmt->execute();
   $rowsChanged = $stmt->rowCount();
   $stmt->closeCursor();
   return $rowsChanged;
}
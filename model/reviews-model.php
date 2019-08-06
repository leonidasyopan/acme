<?php

/* 
 * Reviews Model
 */

// Insert site visitor data to database
function insertReview(){
//    // Create a connection object using the acme connection function
//    $db = acmeConnect();
//    // The SQL statement to be used with the database
//    $sql = 'INSERT INTO clients (clientFirstname, clientLastname, clientEmail, clientPassword) VALUES (:clientFirstname, :clientLastname, :clientEmail, :clientPassword)';
//    // The next line creates the prepared statement using the acme connection
//    $stmt = $db->prepare($sql);
//    // The next four lines replace the placeholders in the SQL statement with the actual values in the variables and tells the database the type of data it is
//    $stmt->bindValue(':clientFirstname', $clientFirstname, PDO::PARAM_STR);
//    $stmt->bindValue(':clientLastname', $clientLastname, PDO::PARAM_STR);
//    $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
//    $stmt->bindValue(':clientPassword', $clientPassword, PDO::PARAM_STR);
//    // Use the prepared statement to insert the data
//    $stmt->execute();
//    // Now we find out if the insert worked by asking how many rows changed in the table
//    $rowsChanged = $stmt->rowCount();    
//    // Close the database  interaction
//    $stmt->closeCursor();
//    // Return the indication of success
//    return $rowsChanged;
}

// Check for an existing email address
function getReviewByInventory($invId) {
//    $db = acmeConnect();
//    $sql = 'SELECT clientEmail FROM clients WHERE clientEmail = :email';
//    $stmt = $db->prepare($sql);
//    $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
//    $stmt->execute();
//    $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
//    $stmt->closeCursor();
//    if(empty($matchEmail)){
//        return 0;
//    } else {
//        return 1;
//    }
}

// Get client data based on an email address
function getReviewByClient($clientEmail){
//    $db = acmeConnect();
//    $sql = 'SELECT clientId, clientFirstname, clientLastname, clientEmail, clientLevel, clientPassword 
//            FROM clients
//            WHERE clientEmail = :email';
//    $stmt = $db->prepare($sql);
//    $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
//    $stmt->execute();
//    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
//    $stmt->closeCursor();
//    return $clientData;
}

function getReviewById($reviewId) {
//   $db = acmeConnect();
//   $sql = 'SELECT * FROM clients WHERE clientId = :clientId';
//   $stmt = $db->prepare($sql);
//   $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
//   $stmt->execute();
//   $clientInfo = $stmt->fetch(PDO::FETCH_ASSOC);
//   $stmt->closeCursor();
//   return $clientInfo;
}

function updateReview($reviewId){
//   $db = acmeConnect();
//   $sql = 'UPDATE clients SET clientFirstname = :clientFirstname, clientLastname = :clientLastname, clientEmail = :clientEmail WHERE clientId = :clientId';
//   $stmt = $db->prepare($sql);
//   $stmt->bindValue(':clientFirstname', $clientFirstname, PDO::PARAM_STR);
//   $stmt->bindValue(':clientLastname', $clientLastname, PDO::PARAM_STR);
//   $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
//   $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
//   $stmt->execute();
//   $rowsChanged = $stmt->rowCount();    
//   $stmt->closeCursor();
//   return $rowsChanged;
}

function deleteReview($reviewId){
//   $db = acmeConnect();
//   $sql = 'UPDATE clients SET clientPassword = :clientPassword WHERE clientId = :clientId';
//   $stmt = $db->prepare($sql);
//   $stmt->bindValue(':clientPassword', $clientPassword, PDO::PARAM_STR);
//   $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
//   $stmt->execute();
//   $rowsChanged = $stmt->rowCount();    
//   $stmt->closeCursor();
//   return $rowsChanged;
}
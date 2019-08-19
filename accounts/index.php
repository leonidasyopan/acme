<?php
/*
 * This is the Acounts Controller
 */
   
// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the acme model for use as needed
require_once '../model/acme-model.php';
// Get the accounts mode
require_once '../model/accounts-model.php';
// Get the functions library
require_once '../library/functions.php';
 
// Get the array of categories
$categories = getCategories();

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

// This will load the login and register pages
switch ($action){
   case 'register':      
      // Filter and store the data 
      $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
      $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
      $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
      $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);

      $clientEmail = checkEmail($clientEmail);
      $checkPassword = checkPassword($clientPassword);

      // Check for existing email address in the table of clients
      $existingEmail = checkExistingEmail($clientEmail);

      // Check for existing email address in the table
      if($existingEmail){
          $message = '<p class="warning-message">That email address already exists. Do you want to login instead?</p>';
          include '../view/login.php';
          exit;
      }

      // Check for missing data
      if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
          $message = '<p class="warning-message">Please provide information for all empty form fields.</p>';
          include '../view/registration.php';
          exit;
      }

      // Hash the checked password
      $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

      // Send the data to the model 
      $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

      // Check and report the result
      if ($regOutcome === 1){
          setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
          $_SESSION['message'] = '<p class="warning-message">Thanks for registering' . " $clientFirstname. Please use your password and email to login.</p>";
          header('Location: /accounts/?action=login');
          exit;
      } else {
          $message = '<p class="warning-message">Sorry,'." $clientFirstname, but the registration failed. Please try again.</p>";
          include '../view/registration.php';
          exit;
      }
   break;
   case 'login':
      include '../view/login.php';
      break;
   case 'registration':      
      include '../view/registration.php';
      break;
   case 'Login':
      // Filter and store the data    
      $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
      $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING); 

      // Validate email and password formats
      $clientEmail = checkEmail($clientEmail);
      $checkPassword = checkPassword($clientPassword);        

      // Check for missing data
      if (empty($clientEmail) || empty($checkPassword)) {
         $message = '<p class="warning-message">Please provide a valid email address and password.</p>';
         include '../view/login.php';
         exit;
      }     

      // A valid password exists, proceed with the login process 
      // Query the client data based on the email address
      $clientData = getClient($clientEmail); 
      // Compare the password just submitted against the hashed password for the matching client
      $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
      // If the hashes don't match create an error and return to the login view
      if(!$hashCheck) {
        $message = '<p class="warning-message">Please check your password and try again.</p>';
        include '../view/login.php';
        exit;
      }
      // A valid user exists, log them in
      $_SESSION['loggedin'] = TRUE;
      // Remove the password from the array, the array_pop function removes the last element from an array
      array_pop($clientData);
      // Store the array into the session
      $_SESSION['clientData'] = $clientData;
      // Destroys cookie firstname when client logs in   
      $clientFirstname = $clientData['clientFirstname'];
      setcookie('firstname', $clientFirstname, strtotime('-1 year'), '/');
      unset($_COOKIE['firstname']);
      // Send them to the admin view
      header('Location: /accounts/');
      exit;
   break;
   case 'Logout':
      $_SESSION['loggedin'] = FALSE;
      session_destroy();
      header('Location: .');
   break;
   case 'updateAccount':
      $clientId = $_SESSION['clientData']['clientId'];
      $clientInfo = getClientBasics($clientId);      
      include '../view/client-update.php';
      exit;
   break;
   case 'updateClientInfo':
      // Filter and store the data 
      $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
      $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
      $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
      $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);      

      $clientEmail = checkEmail($clientEmail);

      // Check for existing email address in the table of clients
      if($clientEmail != $_SESSION['clientData']['clientEmail']){
         $existingEmail = checkExistingEmail($clientEmail);
      }

      // Check for existing email address in the table
      if($existingEmail){
          $message = '<p class="warning-message">That email address already exists. Please provide another email address.</p>';
          include '../view/client-update.php';
          exit;
      }

      // Check for missing data
      if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)) {
          $message = '<p class="warning-message">Please provide information for all empty form fields.</p>';
          include '../view/client-update.php';
          exit;
      }

      // Send the data to the model 
      $updateClientInfoOutcome = updateClientInfo($clientFirstname, $clientLastname, $clientEmail, $clientId);

      // Check and report the result
      if ($updateClientInfoOutcome === 1){         
         $clientData = getClient($clientEmail);  
         array_pop($clientData);
         $_SESSION['clientData'] = $clientData;         
         $_SESSION['message'] = '<p class="warning-message">Successful update. Thanks for keeping your information up-to-date.</p>';
         header('Location: /accounts/?action=admin');
         exit;
     } else {
         $_SESSION['message'] = '<p class="warning-message">Sorry,'." $clientFirstname, but the update failed. Please try again.</p>";
         header('Location: /accounts/');         
         exit;
      }
   break;
   case 'updateClientPassword':
      // Filter and store the data      
      $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
      $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
      
      $checkPassword = checkPassword($clientPassword);

      // Check for missing data
      if (empty($checkPassword)) {
          $message2 = '<p class="warning-message">Please provide a valid password. Password must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</p>';
          include '../view/client-update.php';
          exit;
      }

      // Hash the checked password
      $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

      // Send the data to the model 
      $updateClientPasswordOutcome = updateClientPassword($hashedPassword, $clientId);

      // Check and report the result
      if ($updateClientPasswordOutcome === 1){
         $_SESSION['message'] = '<p class="warning-message">Successful update. Your password has been changed.</p>';
         header('Location: /accounts/');
         exit;
     } else {
         $message2 = '<p class="warning-message">Sorry, there was an error when trying to update your password. Please, try again.';
         header('Location: /accounts/');
         exit;
      }
   break;
   default:
      include '../view/admin.php';      
      exit;
   break; 
}



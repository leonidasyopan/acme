<?php if(!$_SESSION['loggedin']){
   header('Location: /');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Update Account Information | Acme, Inc.</title>

  <link rel="stylesheet" type="text/css" href="/css/screen.css" media="screen">
</head>
<body>
  <header>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/header.php'; ?>
     
    <nav>
      <?php echo $navList; ?>   
    </nav>
  </header>

  <main id="register-main">
    <h1>Update Account Information</h1>
    
    <?php
        if (isset($message)) {
         echo $message;
         unset($message);
        }
    ?>

    <form action="/accounts/" method="post" class="register-form">        
        <fieldset>
          <legend>Use this form to update your name or email information.</legend>
            <label for="clientFirstname">First Name</label><input type="text" id="clientFirstname" name="clientFirstname" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";} elseif(isset($clientInfo['clientFirstname'])) {echo "value='$clientInfo[clientFirstname]'"; } ?> required  />
            <label for="clientLastname">Last Name</label><input type="text" id="clientLastname" name="clientLastname" <?php if(isset($clientLastname)){echo "value='$clientLastname'";} elseif(isset($clientInfo['clientLastname'])) {echo "value='$clientInfo[clientLastname]'"; } ?> required />      
            <label for="clientEmail">Email Adress</label><input type="email" id="clientEmail" name="clientEmail" <?php if(isset($clientEmail)){echo "value='$clientEmail'";} elseif(isset($clientInfo['clientEmail'])) {echo "value='$clientInfo[clientEmail]'"; } ?> required />
            
            <input type="submit" name="submit" value="Update Account" class="updateButton">
            
            <!-- Add the action key - value-pair -->
            <input type="hidden" name="action" value="updateClientInfo">
            
            <input type="hidden" name="clientId" value="<?php if(isset($clientInfo['clientId'])){ echo $clientInfo['clientId'];} elseif(isset($clientId)){ echo $clientId; } ?>">
            
        </fieldset>                        
    </form>
    
    <h2>Password Change</h2>
    
    <?php
        if (isset($message2)) {
         echo $message2;
         unset($message2);
        }
    ?>
    
    <form action="/accounts/" method="post" class="register-form">        
        <fieldset>
          <legend>Use this form to change your password.</legend>          
            <label for="clientPassword">Password</label><p>Password must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</p><input type="password" id="clientPassword" name="clientPassword" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required />
            
            <input type="submit" name="submit" value="Change Password" class="updateButton">
            
            <!-- Add the action key - value-pair -->
            <input type="hidden" name="action" value="updateClientPassword">
            
            <input type="hidden" name="clientId" value="<?php if(isset($clientInfo['clientId'])){ echo $clientInfo['clientId'];} elseif(isset($clientId)){ echo $clientId; } ?>">
            
        </fieldset>                        
    </form>    

    
  </main>
  
  <footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php'; ?> 
  </footer>
</body>
</html>
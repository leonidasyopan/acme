<?php if($_SESSION['clientData']['clientLevel'] < 2){
   header('Location: /');
   exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php if(isset($prodInfo['invName'])){ echo "Delete $prodInfo[invName]";} ?> | Acme, Inc.</title>
  

  <link rel="stylesheet" type="text/css" href="/css/screen.css" media="screen">
</head>
<body>
  <header>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/header.php'; ?>
     
    <nav>
      <?php echo $navList; ?>   
    </nav>
  </header>

  <main id="new-prod-main">
    <h1><?php if(isset($prodInfo['invName'])){ echo "Delete $prodInfo[invName]";} ?></h1>
    
    <?php
        if (isset($message)) {
         echo $message;
         unset($message);
        }
    ?>
    
    <p class="warning-message">BEWARE. The delete is permanent.</p>
    
    <form action="/products/index.php" method="post" id="new-product-form">
        <fieldset>
            <legend>Confirm this is the product you intend to delete.</legend>
                
        <label for="invName">Product Name</label><input type="text" id="invName" name="invName" <?php if(isset($prodInfo['invName'])) {echo "value='$prodInfo[invName]'"; }  ?> readonly />
        <label for="invDescription">Product Description</label>
        <textarea name="invDescription" id="invDescription" rows="5" cols="30" readonly ><?php if(isset($prodInfo['invDescription'])) {echo $prodInfo['invDescription']; }  ?></textarea>        
                
        <input type="submit" name="submit" value="Delete Product" id="new-product-button">
            
        <!-- Add the action key - value-pair -->
        <input type="hidden" name="action" value="deleteProd">
        
        <input type="hidden" name="invId" value="<?php if(isset($prodInfo['invId'])){ echo $prodInfo['invId'];} ?>">
        
        </fieldset>
    </form>

    
  </main>
  
  <footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php'; ?> 
  </footer>
</body>
</html>
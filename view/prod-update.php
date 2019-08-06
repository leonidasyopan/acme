<?php if($_SESSION['clientData']['clientLevel'] < 2){
   header('Location: /');
   exit;
}

// Build the categories option list
$catList = '<select name="categoryId" id="categoryId">';
$catList .= "<option>Choose a Category</option>";
foreach($categoryProducts as $categoryProducts){
   $catList .= "<option value='$categoryProducts[categoryId]'";
      if(isset($categoryId)){
         if($categoryProducts['categoryId'] === $categoryId){
            $catList .= ' selected ';
         } 
      } elseif(isset($prodInfo['categoryId'])){
      if($categoryProducts['categoryId'] === $prodInfo['categoryId']){
         $catList .= ' selected ';
        }
      }        
   $catList .= ">$categoryProducts[categoryName]</option>";
}
$catList .= '</select>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php if(isset($prodInfo['invName'])){ echo "Modify $prodInfo[invName] ";} elseif(isset($invName)) { echo $invName; }?> | Acme, Inc.</title>

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
    <h1><?php if(isset($prodInfo['invName'])){ echo "Modify $prodInfo[invName] ";} elseif(isset($invName)) { echo $invName; }?></h1>
    
    <?php
        if (isset($message)) {
         echo $message;
         unset($message);
        }
    ?>
    
    <form action="/products/index.php" method="post" id="new-product-form">
        <fieldset>
            <legend>Modify product's information bellow. All fields are required.</legend>
        <label for="categoryId">Category</label>
        <?php echo $catList; ?>
        
        <label for="invName">Product Name</label><input type="text" id="invName" name="invName" <?php if(isset($invName)){echo "value='$invName'";} elseif(isset($prodInfo['invName'])) {echo "value='$prodInfo[invName]'"; }  ?> required />
        <label for="invDescription">Product Description</label><textarea name="invDescription" id="invDescription" rows="5" cols="30" required ><?php if(isset($invDescription)){echo $invDescription;} elseif(isset($prodInfo['invDescription'])) {echo $prodInfo['invDescription']; }  ?></textarea>        
        <label for="invImage">Product Image (path to image)</label><input type="text" id="invImage" name="invImage" <?php if(isset($invImage)){echo "value='$invImage'";} elseif(isset($prodInfo['invImage'])) {echo "value='$prodInfo[invImage]'"; }  ?> required />
        <label for="invThumbnail">Product Thumbnail (path to thumbnail)</label><input type="text" id="invThumbnail" name="invThumbnail" <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";} elseif(isset($prodInfo['invThumbnail'])) {echo "value='$prodInfo[invThumbnail]'"; }  ?> required />
        <label for="invPrice">Product Price</label><input type="number" id="invPrice" name="invPrice" <?php if(isset($invPrice)){echo "value='$invPrice'";} elseif(isset($prodInfo['invPrice'])) {echo "value='$prodInfo[invPrice]'"; }  ?> required />
        <label for="invStock"># in Stock</label><input type="number" id="invStock" name="invStock" <?php if(isset($invStock)){echo "value='$invStock'";} elseif(isset($prodInfo['invStock'])) {echo "value='$prodInfo[invStock]'"; }  ?> required />
        <label for="invSize">Shipping Size (W x H x L in inches)</label><input type="number" id="invSize" name="invSize" <?php if(isset($invSize)){echo "value='$invSize'";} elseif(isset($prodInfo['invSize'])) {echo "value='$prodInfo[invSize]'"; }  ?> required />
        <label for="invWeight">Weight (lbs.)</label><input type="number" id="invWeight" name="invWeight" <?php if(isset($invWeight)){echo "value='$invWeight'";} elseif(isset($prodInfo['invWeight'])) {echo "value='$prodInfo[invWeight]'"; }  ?> required />
        <label for="invLocation">Location (city name)</label><input type="text" id="invLocation" name="invLocation" <?php if(isset($invLocation)){echo "value='$invLocation'";} elseif(isset($prodInfo['invLocation'])) {echo "value='$prodInfo[invLocation]'"; }  ?> required />
        <label for="invVendor">Vendor Name</label><input type="text" id="invVendor" name="invVendor" <?php if(isset($invVendor)){echo "value='$invVendor'";} elseif(isset($prodInfo['invVendor'])) {echo "value='$prodInfo[invVendor]'"; }  ?> required />
        <label for="invStyle">Primary Material</label><input type="text" id="invStyle" name="invStyle" <?php if(isset($invStyle)){echo "value='$invStyle'";} elseif(isset($prodInfo['invStyle'])) {echo "value='$prodInfo[invStyle]'"; }  ?> required />
        
        <input type="submit" name="submit" value="Update Product" id="new-product-button">
            
        <!-- Add the action key - value-pair -->
        <input type="hidden" name="action" value="updateProd">
        
        <input type="hidden" name="invId" value="<?php if(isset($prodInfo['invId'])){ echo $prodInfo['invId'];} elseif(isset($invId)){ echo $invId; } ?>">
        
        </fieldset>
    </form>

    
  </main>
  
  <footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php'; ?> 
  </footer>
</body>
</html>
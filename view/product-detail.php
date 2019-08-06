<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $invName; ?> Products | Acme, Inc.</title>

  <link rel="stylesheet" type="text/css" href="/css/screen.css" media="screen">
</head>
<body>
  <header>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/header.php'; ?>
     
    <nav>
      <?php echo $navList; ?>   
    </nav>
  </header>

  <main>
      <div id="item-display-main">
         <h1><?php echo $invName; ?></h1>  

         <?php
            if (isset($message)) {
             echo $message;
             unset($message);
            }
         ?>  

         <?php 
            if(isset($itemDisplay)){ 
               echo $itemDisplay; 
            } 
         ?>         
      </div>     
      <div id="thumbnails-display">      
         <br>
         <hr>
         <br> 
         <h2>Product Thumbnails:</h2>

         <?php 
            if(isset($displayThumbnails)){ 
               echo $displayThumbnails; 
            } 
         ?>     
      </div>
    
  </main>
  
  <footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php'; ?> 
  </footer>
</body>
</html>
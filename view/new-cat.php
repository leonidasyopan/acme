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
  <title>Add Category | Acme, Inc.</title>

  <link rel="stylesheet" type="text/css" href="/css/screen.css" media="screen">
</head>
<body>
  <header>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/header.php'; ?>
     
    <nav>
      <?php echo $navList; ?>   
    </nav>
  </header>

  <main id="new-cat-main">
    <h1>Add Category</h1>  
    
    <?php
        if (isset($message)) {
         echo $message;
         unset($message);
        }
    ?>
    
    <form action="/products/index.php" method="post" id="new-category-form">
        <fieldset>
            <legend>Add a new category of products bellow.</legend>
            <label for="categoryName">New Category Name</label><input type="text" name="categoryName" id="categoryName" required />
                
                <input type="submit" name="submit" value="Add Category" id="new-category-button">
            
                <!-- Add the action key - value-pair -->
                <input type="hidden" name="action" value="addCategory">
        </fieldset>        
    </form>
   
    
    
  </main>
  
  <footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php'; ?> 
  </footer>
</body>
</html>
<?php if($_SESSION['clientData']['clientLevel'] < 2){
   header('Location: /');
   exit;
}
if (isset($_SESSION['message'])) {
 $message = $_SESSION['message'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Product Management | Acme, Inc.</title>

  <link rel="stylesheet" type="text/css" href="/css/screen.css" media="screen">
</head>
<body>
  <header>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/header.php'; ?>
     
    <nav>
      <?php echo $navList; ?>   
    </nav>
  </header>

  <main id="prod-mgmt-main">
      <h1>Product Management</h1>

      <p>Welcome to the product management page. Please choose an option below:</p>

      <ul>
         <li><a href="/products/?action=newCat" title="New Category">Add a New Category</a></li>
         <li><a href="/products/?action=newProd" title="New Product">Add a New Product</a></li>
      </ul>
    
   <?php
      if (isset($message)) {
       echo $message;
      } if (isset($prodList)) {
       echo $prodList;
      }
   ?>
    
  </main>
  
  <footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php'; ?> 
  </footer>
</body>
</html>
<?php unset($_SESSION['message']); ?>
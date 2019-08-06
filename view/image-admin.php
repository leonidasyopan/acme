<?php
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
  <title>Image Management | Acme, Inc.</title>

  <link rel="stylesheet" type="text/css" href="/css/screen.css" media="screen">
</head>
<body>
   <header>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/header.php'; ?>

      <nav>
        <?php echo $navList; ?>   
      </nav>
   </header>

   <main id="img-management-main">
      <h1>Image Management</h1>

      <p>Welcome to the image management page. Please, choose an option bellow.</p>

      <h2>Add New Product Image(s)</h2>
      <?php
       if (isset($message)) {
        echo $message;
       } ?>

      <form action="/uploads/" method="post" enctype="multipart/form-data">
         <label for="invItem">Product</label><br>
         <?php echo $prodSelect; ?><br><br>
         <label>Upload Image:</label><br>
         <input type="file" name="file1"><br>
         <input type="submit" class="updateButton" value="Upload">
         <input type="hidden" name="action" value="upload">
      </form>
      
      <hr>
      
      <h2>Existing Images</h2>
      <p class="warning-message">If deleting an image, delete the thumbnail too and vice versa.</p>
      <?php
         if (isset($imageDisplay)) {
          echo $imageDisplay;
         }
      ?>
      
   </main>

   <footer>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php'; ?> 
   </footer>
</body>
</html>
<?php unset($_SESSION['message']); ?>
<?php if(!$_SESSION['loggedin']){
   header('Location: /');
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
  <title>Admin Panel | Acme, Inc.</title>

  <link rel="stylesheet" type="text/css" href="css/screen.css" media="screen">
</head>
<body>
   <header>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/header.php'; ?>

      <nav>
        <?php echo $navList; ?>   
      </nav>
   </header>

   <main id="admin-main">
      <h1><?php echo $_SESSION['clientData']['clientFirstname'] . " " . $_SESSION['clientData']['clientLastname']; ?></h1>

      <?php
        if (isset($message)) {
         echo $message;
        }
      ?>

      <br>
      <p>You are LOGGED IN.</p>

      <ul>
          <li>First Name: <?php echo $_SESSION['clientData']['clientFirstname']; ?></li>
          <li>Last Name: <?php echo $_SESSION['clientData']['clientLastname']; ?></li>
          <li>Email: <?php echo $_SESSION['clientData']['clientEmail']; ?></li>       
      </ul>

      <p><a href="/accounts/?action=updateAccount" title="Update Account Information">Update Account Information</a></p>

      <?php 
      if($_SESSION['clientData']['clientLevel'] > 1){
      ?>        
      <br>
      <h2>Administrative Functions</h2><br>
      <p>Use the link bellow to manage products</p><br>
      <p><a href="/products/" title="Products Management Page">Products Management Page</a></p>
      <?php } ?>

   </main>

   <footer>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php'; ?> 
   </footer>
</body>
</html>
<?php unset($_SESSION['message']); ?>
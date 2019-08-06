<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login | Acme, Inc.</title>

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
    <h1>ACME Login</h1>
    
    <?php
        if (isset($message)) {
            echo $message;
            unset($message);
        }
        
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    ?>  
    
    <form action="/accounts/" method="post" id="login-form">        
        <fieldset>
          <legend>Username and Password</legend>
          <label for="clientEmail">Email Adress</label><input type="email" id="clientEmail" name="clientEmail" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?> required />
            <label for="clientPassword">Password</label><p>Password must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</p><input type="password" id="clientPassword" name="clientPassword" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required />
            <input type="submit" value="Login" id="submitButton">
            
            <input type="hidden" name="action" value="Login">
        </fieldset>
    </form>
    
    <section id="not-a-member-section">
      <h2>Not a Member?</h2>
      <form method="post" action="/accounts/?action=registration">
         <input type="submit" value="Create an account" id="createButton">   
      </form>        
    </section>   
    
    
  </main>
  
  <footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php'; ?> 
  </footer>
</body>
</html>
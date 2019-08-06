<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home | Acme, Inc.</title>

  <link rel="stylesheet" type="text/css" href="/css/screen.css" media="screen">
</head>
<body class="home">
  <header>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/header.php'; ?> 
     
    <nav>
      <?php echo $navList; ?>   
    </nav>
     
  </header> 
   
  <main>
    <h1>Welcome to Acme!</h1>

    <section id="feature"> <!-- Section Feature Begins -->
       
      <?php      
         if (isset($featuredSection)) {
          echo "$featuredSection";
         }
      ?>       
       
        
    </section> <!-- Section Feature Ends -->
      
    <div id="recipes-section"> <!-- Section Recipes Begins -->
      <article id="product-reviews"> <!-- Article Reviews Begins -->
        <h3>Acme Rocket Review</h3>
        <ul>
          <li>"I don't know how I ever caught roadrunners before this." (4/5)</li>
          <li>"That thing was fast!" (4/5)</li>
          <li>"Talk about fast delivery." (5/5)</li>
          <li>"I didn't even have to pull the meat apart." (4.5/5)</li>
          <li>"I'm on my thirtieth one. I love these things!" (5/5)</li>
        </ul>
      </article> <!-- Article Reviews Ends -->
      <aside id="recipes-aside"> <!-- Aside Recipes Begins -->         
        <h3>Feature Recipes</h3>
        <figure>
          <img src="images/recipes/bbqsand.jpg" alt="Pulled Roadrunner BBQ">
          <figcaption><a href="#">Pulled Roadrunner BBQ</a></figcaption>
        </figure>
        
        <figure>
          <img src="images/recipes/potpie.jpg" alt="Roadrunner Pot Pie">
          <figcaption><a href="#">Roadrunner Pot Pie</a></figcaption>
        </figure>
        <figure>
          <img src="images/recipes/soup.jpg" alt="Roadrunner Soup">
          <figcaption><a href="#">Roadrunner Soup</a></figcaption>
        </figure>
        <figure>
          <img src="images/recipes/taco.jpg" alt="Roadrunner Tacos">
          <figcaption><a href="#">Roadrunner Tacos</a></figcaption>
        </figure>                
      </aside> <!-- Aside Recipes Ends -->  
    </div> <!-- Div Recipes Ends -->

  </main>
  
  <footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php'; ?> 
  </footer>
</body>
</html>
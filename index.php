<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  </head>
  <body>
  
  <style>
      .currentPage {
          font-weight: 600;
      }    
      
  </style>
  
     <nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
   <div>
    <h1 class="title">
        Paginate
      </h1>
    </div>  

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item">
        Home
      </a>

      <a class="navbar-item">
        Documentation
      </a>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          More
        </a>

       </div>
      </div>
    
  </div>
</nav>
     
<section class="section">
    <div class="container">
      
      <p class="subtitle">
        My first website with <strong>Bulma</strong>!
        
      </p>
      <div class="subtitle">
         
          <?php foreach ($rows as $row):?>
          <p> Name: <?= h($row['name']);?>  
            <br> Email: <?= h($row['email']);?> 
          </p>
                
          <?php endforeach; ?>
          
        <?php for ($i= 1; $i<=$pages; $i++) : ?>
            
          <a href="?page=<?php echo $i ?>&per-page=<?php echo $perPage?>" <?php if ($page === $i) {echo 'class="currentPage"';} ?> > <?php echo $i; ?> </a>
        
        <?php endfor; ?>

      </div>
    </div>
  </section>
  <script>
  document.addEventListener('DOMContentLoaded', () => {

  // Get all "navbar-burger" elements
  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach( el => {
      el.addEventListener('click', () => {

        // Get the target from the "data-target" attribute
        const target = el.dataset.target;
        const $target = document.getElementById(target);

        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

});    
  </script>
  </body>
</html  
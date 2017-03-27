<!-- Include header -->
<?php include 'header.php'; ?>

<!-- create three coulumn with lg and md size  -->
<div class="container-fluid" id="content">
  <div id="home-message">
    <h2>Welcoming To Ingredients For You!</h2>
    <p>This is your first stop to a more beautiful dinner table!<br />
      We have the freshest ingredients in stock and we gain more <br />
      all of the time. Explore our wares and get a sense of that new<br />
      ingredient you need to put some excitement in the kitchen!<br />
      <strong>More Inventory coming soon!</strong></p>
  </div>

<!-- Add Main Content here -->
<!-- class="col-xs-6 col-sm-9 col-md-6 col-lg-4" -->
    <div >
      <br>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <!-- Ingredient 1 slide -->
          <div class="item active">
            <a style="display:block" href="./MapleSugar.php" >
                <figure class="ing">
                    <img  src="./images/maplesugar.jpg" alt="igdt 1" width="250" height="auto">
                    <figcaption><a href="https://en.wikipedia.org/wiki/Maple_sugar">Wikipedia</a></figcaption>
                </figure>
            </a>
            <div class="carousel-caption">
              <h3>Maple Sugar</h3>
              <p>Tasty! - $5.99</p>
            </div>
          </div>

          <!-- Ingredient 2 slide -->
          <div class="item">
            <a style="display:block"  href="./Nori.php">
                <figure class="ing">
                    <img  src="./images/nori.jpg" alt="igdt 2" width="250" height="auto">
                    <figcaption><a href="https://en.wikipedia.org/wiki/Nori">Wikipedia</a></figcaption>
                </figure>
            </a>
            <div class="carousel-caption">
              <h3>Nori</h3>
              <p>It's seaweed! - $2.99</p>
            </div>
          </div>
          <!-- Ingredient 3 slide -->
          <div class="item">
            <a style="display:block" href="./SesameSeed.php">
                <figure class="ing">
                    <img  src="./images/sesameseed.jpg" alt="igdt 3" width="250" height="auto">
                    <figcaption><a href="https://en.wikipedia.org/wiki/Sesame">Wikipedia</a></figcaption>
                </figure>
            </a>
            <div class="carousel-caption">
              <h3>Sesame Seed</h3>
              <p>Sprinkle on some buns! - $3.99</p>
            </div>
          </div>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

    </div>

</div>
<?php include 'footer.php'; ?>

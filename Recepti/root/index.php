<?php 
    session_start();
    include 'scripts/connection.php'; 
    define('IMGPATH', 'img/'); 

    if (isset($_GET['logout'])) {
      unset($_SESSION['username']);
      session_destroy();
      header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style3.css">
    <title>AllRecipes</title>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <nav> 
          <ul class="menuLinks">
            <a href="index.php" id="home">Home</a>
            <?php 
              if (!isset($_SESSION['username'])) {
                echo "<a href='pages/login.php'><li>Login</li></a>"; }
              if (!isset($_SESSION['username'])) {
              echo "<a href='pages/signup.php'><li>Sign up</li></a>"; }
              if (isset($_SESSION['level']) && $_SESSION['level'] == 'administrator') {
                echo "<a href='pages/admin.php'><li>Admin</li></a>"; }
              if (isset($_SESSION['username'])) {
                echo "<a href='pages/myRecipes.php'><li>My Recipes</li></a>"; }
              if (isset($_SESSION['username'])) {
                echo "<a href='pages/newRecipe.php'><li>Add a Recipe</li></a>"; }
              if (isset($_SESSION['username'])) {
                echo "<a href='index.php?logout='1''><li>Logout</li></a>"; }
            ?>
          </ul>
          <div class="menu">
            <div></div>
            <div></div>
            <div></div>
          </div>
        </nav>
        <header class="search">
          <h1>Find your new favorite recipe</h1>
          <form method="POST" action="./pages/search.php" enctype="multipart/form-data">
          <input type="text" placeholder="ingredient, type, name,..." name="input"><button type="submit" name="submit"><i class="fas fa-search"></i></button>
          </form>
          <button type="button" id="vegan" data-cat="vegan" class="btn">Vegan</button>
          <button type="button" id="dessert" data-cat="dessert" class="btn">Dessert</button>
          <button type="button" id="breakfast" data-cat="breakfast" class="btn">Breakfast</button>
          <button type="button" id="lunch" data-cat="lunch" class="btn">Lunch</button>
          <button type="button" id="healthy" data-cat="healthy" class="btn">Healthy</button>
        </header>
      </div>
      <main>
        <h1 id="top">NEW RECIPES:</h1>
        <div class="recipes">
          <?php
            $query = "SELECT recipe.id, photo, title, categories FROM recipe ORDER BY date DESC LIMIT 3";
            $result = mysqli_query($dbc, $query);
            while($row = mysqli_fetch_array($result)) { 
              echo '<article>';
              echo '<a href="./pages/recipe.php?id=' . $row['id'] . '">';
              echo '<img src="' . IMGPATH . $row['photo'] . '">';
              echo '<h4>' . $row['title'];
              echo '</a></h4>';
              echo '<p><strong>Categories: </strong>' . $row['categories'] . '</p>';
              echo '</article>';
            }
          ?>
        </div>
        <div class="center" id="bottom"><a href="./pages/allRecipes.php" id="showAll">SHOW ALL RECIPES -></a></div>
        <h1>BEST RATED RECIPES:</h1>
        <div class="recipes">
          <?php
            $query = "SELECT ROUND(AVG(value), 2) as avgRating, recipe.id, photo, title, categories FROM ratings INNER JOIN recipe ON ratings.recipeId = recipe.id GROUP BY recipe.id ORDER BY avgRating DESC LIMIT 3";
            $result = mysqli_query($dbc, $query);
            if($result->num_rows !== 0) {
              while($row = mysqli_fetch_array($result)) { 
              echo '<article>';
              echo '<a href="./pages/recipe.php?id=' . $row['id'] . '">';
              echo '<img src="' . IMGPATH . $row['photo'] . '">';
              echo '<h4>' . $row['title'];
              echo '</a></h4>';
              echo '<p><strong>Categories: </strong>' . $row['categories'] . '</p>';
              echo '<p><strong>Average rating: </strong>' . $row['avgRating'] . '</p>';
              echo '</article>';
              }
            } else
              echo '<h3>No ratings.</h3>';
          ?>
        </div>
        <div class="center" id="bottom"><a href="./pages/allRecipes.php" id="showAll">SHOW ALL RECIPES -></a></div>
      </main>
      <footer class="header"><h3>AllRecipes</h3></footer>
      </div>
      <script type="module" src="./scripts/filter.js"></script>
      </body>
</html>
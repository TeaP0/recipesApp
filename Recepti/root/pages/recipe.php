<?php 
  session_start();
  include '../scripts/connection.php';
  define('IMGPATH', '../img/'); 
  $id = $_GET['id']; 
  $query = "SELECT * FROM recipe WHERE id =  $id";
  $result = mysqli_query($dbc, $query);
  $row = mysqli_fetch_array($result)
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" /> 
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/recipe.css">
    <title><?php echo $row['title']; ?></title>
  </head>
  <body>
    <div class="container">
    <nav class="header">
        <ul class="menuLinks">
          <a href="../index.php" id="home">Home</a>
          <?php 
              if (!isset($_SESSION['username'])) {
                echo "<a href='./login.php'><li>Login</li></a>"; }
              if (!isset($_SESSION['username'])) {
              echo "<a href='./signup.php'><li>Sign up</li></a>"; }
              if (isset($_SESSION['level']) && $_SESSION['level'] == 'administrator') {
                echo "<a href='./admin.php'><li>Admin</li></a>"; }
              if (isset($_SESSION['username'])) {
                echo "<a href='./myRecipes.php'><li>My Recipes</li></a>"; }
              if (isset($_SESSION['username'])) {
                echo "<a href='./newRecipe.php'><li>Add a Recipe</li></a>"; }
              if (isset($_SESSION['username'])) {
                echo "<a href='../index.php?logout='1''><li>Logout</li></a>"; }
          ?>
        </ul>
        <div class="menu">
          <div></div>
          <div></div>
          <div></div>
        </div>
      </nav> 
      <main id="recipe">
      <?php
          echo '<h1>' . $row['title'] . '</h1>';
          echo '<p><strong>Author: </strong>' . $row['author'] . '</p>';
          echo '<p><strong>Published: </strong>' . $row['date'] . '</p>';
          echo '<p><strong>Total time: </strong>' .  $row['time'] . ' min</p>';
          echo '<img src="' . IMGPATH . $row['photo'] . '">';
          echo '<p><strong>Ingredients: </strong>' . $row['ingredients'] . '</p>';
          echo '<p><strong>Directions: </strong>' . $row['preparation'] . '</p>';   
        ?>
        <p id="avgRating" data-recipeId="<?php echo $id; ?>"></p>
        <div class="ratings">
          <p id="left"><strong>Rate this recipe: </strong></p>
          <span data-rating="1" data-recipeId="<?php echo $id; ?>"><i class="far fa-star"></i></span>
          <span data-rating="2" data-recipeId="<?php echo $id; ?>"><i class="far fa-star"></i></i></span>
          <span data-rating="3" data-recipeId="<?php echo $id; ?>"><i class="far fa-star"></i></span>
          <span data-rating="4" data-recipeId="<?php echo $id; ?>"><i class="far fa-star"></i></span>
          <span data-rating="5" data-recipeId="<?php echo $id; ?>"><i class="far fa-star"></i></span>   
        </div>
      </main>
    <footer class="header">
      <h2>AllRecipes</h2>
    </footer>
  </div>
  <script type="module" src="../scripts/rating.js"></script>
  </body>
</html>

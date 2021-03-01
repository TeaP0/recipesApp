<?php 
    session_start();
    include '../scripts/connection.php'; 
    define('IMGPATH', '../img/'); 
?>
<!DOCTYPE html>
<html lang="en" dir="ltr"> 
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style3.css">
    <title>AllRecipes</title>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <nav>
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
        <h1 class="center">SEARCH RESULTS:</h1>
      </div>
      <main>
        <div class="recipes">
        <?php 
          if (isset($_POST['submit']))  { 
              $keyword = $_POST['input'];
              $check = 0;
              $query = "SELECT id, photo, title, ingredients, categories FROM recipe";
              $result = mysqli_query($dbc, $query);
              $row = mysqli_fetch_array($result);
                while($row = mysqli_fetch_array($result)) { 
                  if(stripos($row['title'], $keyword) !== false || stripos($row['ingredients'], $keyword) !== false || stripos($row['categories'], $keyword) !== false) {
                    $check = 1;
                    echo '<article>';
                    echo '<a href="./recipe.php?id=' . $row['id'] . '">';
                    echo '<img src="' . IMGPATH . $row['photo'] . '">';
                    echo '<h4>' . $row['title'];
                    echo '</a></h4>';
                    echo '<p><strong>Categories: </strong>' . $row['categories'] . '</p>';
                    echo '</article>';
                  } 
                }
                if ($check == 0) {
                  echo '<h2>No search results found.</h2>';
                }
              mysqli_close($dbc);      
          }
          ?>
        </div>
      </main>
      <footer class="header">
        <h2>AllRecipes</h2></footer>
    </div>
    <script type="module" src="../scripts/responsiveMenu.js"></script>
  </body>
</html>

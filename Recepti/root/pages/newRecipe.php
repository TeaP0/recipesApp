<?php 
  session_start();
  if (!isset($_SESSION['username'])) {
    $_SESSION['message'] = "You must log in.";
    header('Location: login.php');
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style2.css">
    <title>Add a recipe</title>
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
        <h1 class="title">Add a recipe:</h1>
      </div>
      <main>
        <form method="POST" action="../scripts/saveToDb.php" enctype="multipart/form-data">
          <label for="title">Enter a recipe title:</label>
          <input id='title' type="text" name="title" value="">
          <span id='msgTitle'></span>
          <label for="time">Enter needed time in minutes:</label>
          <input id='time' type="number" name="time" value="">
          <span id='msgTime'></span>
          <label for="ingredients">Enter ingredients:</label>
          <textarea id='ingredients' name="ingredients" rows="5" cols="30"></textarea>
          <span id='msgIngredients'></span>
          <label for="directions">Enter directions:</label>
          <textarea id='directions' name="directions" rows="20" cols="30"></textarea>
          <span id='msgDirections'></span>
          <div>
            <label>Select categories: (at least one)</label>
            <div class="checkbox"><input type="checkbox" id="cat1" name="cat[]" value="vegan">
            <label for="cat1">Vegan</label><br></div>
            <div class="checkbox"><input type="checkbox" id="cat2" name="cat[]" value="dessert">
            <label for="cat2">Dessert</label><br></div>
            <div class="checkbox"><input type="checkbox" id="cat3" name="cat[]" value="breakfast">
            <label for="cat3">Breakfast</label><br></div>
            <div class="checkbox"><input type="checkbox" id="cat4" name="cat[]" value="lunch">
            <label for="cat4">Lunch</label><br></div>
            <div class="checkbox"><input type="checkbox" id="cat5" name="cat[]" value="dinner">
            <label for="cat5">Dinner</label><br></div>
            <div class="checkbox"><input type="checkbox" id="cat6" name="cat[]" value="healthy">
            <label for="cat6">Healthy</label><br></div>
          </div>
          <span id='msgCategories'></span>    
          <label for="photo">Upload a photo:</label>
          <input type="file" name="photo" accept="image/*" id="img">
          <span id='msgPhoto'></span>
      
          <div class="center"><input  id="submit" type="submit" name="submit" value="Submit"></div>
        </form>
      </main>  
    </div>
    <footer class="header"><h2>AllRecipes</h2></footer>
    <script type="module" src="../scripts/validateRecipe.js"></script>
  </body>
</html>

<?php 
    session_start();
    include 'connection.php'; 
    $username = $_SESSION['username'];

    // Saving recipe to database
    if (isset($_POST['submit']))
    {
        $title = $_POST['title'];

            if (isset($_POST['ingredients'])){
                $ingredients = $_POST['ingredients'];
            }
            if (isset($_POST['directions'])){
                $directions = $_POST['directions'];
            }
            if (isset($_POST['time'])){
              $time = $_POST['time'];
          }
            if (isset($_POST['cat'])){
                $categories = implode(", ", $_POST['cat']);
            }
           if (isset($_FILES['photo']['name'])){
               $photo = $_FILES['photo']['name'];
            }
            $date = date('Y-m-d H:i:');
    }
    
    $target_dir = '../img/' . $photo; 
    move_uploaded_file($_FILES["photo"]['tmp_name'], $target_dir); 

    $author = $_SESSION['username'];

    $query = "INSERT INTO recipe (author, date, title, ingredients, preparation, photo, categories, time)
            VALUES ('$author', '$date', '$title', '$ingredients', '$directions', '$photo', '$categories', '$time')"; 
    
    $result = mysqli_query($dbc, $query) or die('Error querying database.' . mysqli_error($dbc)); 
    mysqli_close($dbc); 
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style2.css">
    <title>Recipe saved</title>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <nav>
          <ul class="menuLinks">
            <a href="../index.php" id="home">Home</a>
            <?php 
              if (!isset($_SESSION['username'])) {
                echo "<a href='../pages/login.php'><li>Login</li></a>"; }
              if (!isset($_SESSION['username'])) {
              echo "<a href='../pages/signup.php'><li>Sign up</li></a>"; }
              if (isset($_SESSION['level']) && $_SESSION['level'] == 'administrator') {
                echo "<a href='./admin.php'><li>Admin</li></a>"; }
              if (isset($_SESSION['username'])) {
                echo "<a href='../pages/myRecipes.php'><li>My Recipes</li></a>"; }
              if (isset($_SESSION['username'])) {
                echo "<a href='../pages/newRecipe.php'><li>Add a Recipe</li></a>"; }
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
        <h1 class="center">Recipe saved!</h1>
      </div>
      <main>
        <main class="center" id="setHeight"><h1>Your recipe is saved</h1></main>
        <footer class="header">
        <h2>AllRecipes</h2>
        </footer>
    </div>
     <script type="module" src="./responsiveMenu.js"></script>
  </body>
</html>


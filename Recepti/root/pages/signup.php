<?php 
    session_start();
    include '../scripts/connection.php'; 
    define('IMGPATH', '../img/'); 
    $msgUser = "";
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
        <h1 class="center">SIGN UP:</h1>
      </div>
      <main>
        <form method="POST" action="signup.php" enctype="multipart/form-data" class="smallerForm" >
            <label for="username">Enter your username:</label>
            <input id='username' type="text" name="username" value="">
            <?php echo '<span id="msgUser">' . $msgUser . '</span>'; ?>
            <label for="pass1">Enter password:</label>
            <input id='pass1' type="password" name="pass1" value="">
            <span id='msgPass1'></span>    
            <label for="pass2">Confirm password:</label>
            <input id='pass2' type="password" name="pass2" value="">
            <span id='msgPass2'></span>   
            <div class="center"><input id="submit" name="submit" type="submit" value="Submit" /></div>
        </form>
      </main>
      <footer class="header">
        <h2>AllRecipes</h2></footer>
    </div>
    <script type="module" src="../scripts/validateUser.js"></script>
    <?php if (isset($_POST['submit']))
        { 
            $username = $_POST['username'];
            $password = $_POST['pass1'];
            $hashed_password = password_hash($password, CRYPT_BLOWFISH); 
            $role = 0;

            $sql = "SELECT username FROM users WHERE username = ?";
            $stmt = mysqli_stmt_init($dbc);
            if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 's', $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            }
            if (mysqli_stmt_num_rows($stmt) > 0) {
              $msgUser = 'Username already exists!';
            } else{
              $sql = "INSERT INTO users (username, password, role) values (?, ?, ?)";
              $stmt = mysqli_stmt_init($dbc);
              
              if (mysqli_stmt_prepare($stmt, $sql)){
                  mysqli_stmt_bind_param($stmt,'ssi', $username, $hashed_password, $role);
                  mysqli_stmt_execute($stmt);
                  $_SESSION['username'] = $username;
                  header("Location: ../index.php");
              }  else {
                session_destroy();
                header("Location: error.php");
              }    
              mysqli_close($dbc);      
            }
        }
    ?>
  </body>
</html>

<?php 
    session_start();
    include '../scripts/connection.php'; 
    define('IMGPATH', 'img/'); 
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
                echo "<a href='login.php'><li>Login</li></a>"; }
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
        <h1 class="center">LOG IN:</h1>
      </div>
      <main>
        <form method="post" action="login.php" class="smallerForm">
            <label for="username">Username:</label>
            <br/>
            <input name="username" type="text" required/>
            <br/>
            <label for="password">Password:</label>
            <br/>
            <input name="pass" type="password" required/>
            <br/>
            <div class="center"><input id="submit" name="submit" type="submit" value="Login"/></div>
        </form>
        <?php
          if (isset($_POST['submit']))
          {
            $user = $_POST['username'];
            $pass = $_POST['pass'];
            $check = false;

            $sql = "SELECT id, username, password, role FROM users WHERE username = ?";
            $stmt = mysqli_stmt_init($dbc);
                
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 's', $user);
                mysqli_stmt_execute($stmt);  
                mysqli_stmt_store_result($stmt);
            }
            mysqli_stmt_bind_result($stmt, $userId, $username, $userPassword, $roleUser);
            mysqli_stmt_fetch($stmt);

            if (password_verify($pass, $userPassword) && mysqli_stmt_num_rows($stmt) > 0) {
                $check = true;
            } else {
                  echo "<h4 class='center errorText'>You have entered wrong password or username.</h4>";
            }
          
            if ($check == true && $roleUser == '1'){
                $_SESSION['username'] = $user;
                $_SESSION['userId'] = $userId;
                $_SESSION['level'] = 'administrator';
                $_SESSION['message'] = 'You are logged in as an administrator.';
                header("Location: ../index.php");
            }
            else if ($check == true && $roleUser == '0'){
                $_SESSION['username'] = $user;
                $_SESSION['userId'] = $userId;
                $_SESSION['level'] = 'user';
                $_SESSION['message'] = 'You are logged in.';
                header("Location: ../index.php");
            }
            mysqli_close($dbc);
          }
        ?>
        </main>
        <footer class="header">
            <h2>AllRecipes</h2>
        </footer>
    </div>
    <script type="module" src="../scripts/responsiveMenu.js"></script>
  </body>
</html>

</body>
</html>

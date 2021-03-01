<?php 
    session_start();
    include 'connection.php';
    // Saves rating to db
    if (isset($_POST["rating"], $_POST["recipeId"], $_SESSION['username'])) {
        $recipeId = $_POST["recipeId"];
        $rating = $_POST["rating"];
        $user = $_SESSION['username'];

        $sql = "SELECT user, recipeId FROM ratings WHERE user = ? and recipeId = ?";
            $stmt = mysqli_stmt_init($dbc);
            if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 'si', $user, $recipeId);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            }
            if (mysqli_stmt_num_rows($stmt) <= 0) {
                $query = "INSERT INTO ratings (recipeId, user, value)
                    VALUES ('$recipeId', '$user', '$rating')"; 
                $result = mysqli_query($dbc, $query) or die('Error querying database.' . mysqli_error($dbc)); 
                mysqli_close($dbc);
            }           
    } else {
        die(json_encode(array('error' => 'User not logged in!')));
    }     
?>
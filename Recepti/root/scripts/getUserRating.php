<?php
    session_start();
    include 'connection.php';
   // Gets recipe rating of a logged in user from the db 
    if (isset($_GET["recipeId"])) {
        $recipeId = $_GET["recipeId"];
        $user = $_SESSION['username'];
        $query = "SELECT value FROM ratings WHERE recipeId = $recipeId AND user = '$user'";
        $result = mysqli_query($dbc, $query);
        $rating = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if ($rating) {
            echo json_encode($rating);
        } 
    }
?>
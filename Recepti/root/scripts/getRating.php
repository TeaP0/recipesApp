<?php 
    include 'connection.php';
    // Gets recipe rating from db
    if (isset($_GET["recipeId"])) {

        $recipeId = $_GET["recipeId"];
        $query = "SELECT ROUND(AVG(value), 2) as avgRating FROM ratings WHERE recipeId =  $recipeId";
        $result = mysqli_query($dbc, $query);
        $avgRating = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if ($avgRating) {
            echo json_encode($avgRating);
        } 

    }
?>


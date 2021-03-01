<?php
    // Echoes only the chosen category 
    include 'connection.php';
    if (isset($_GET["category"])) {
        $category = $_GET["category"];
        $query = "SELECT id, photo, title, categories FROM recipe WHERE categories LIKE '%$category%' GROUP BY id ORDER BY title ASC";
        $result = mysqli_query($dbc, $query);      
        $row = mysqli_fetch_all($result);
        if ($row) {
            echo json_encode($row);
        } else {
            die(json_encode(array('error' => 'Recipes not found')));
        }   
    } else {
        die(json_encode(array('error' => 'Category not set')));
    }   
?>
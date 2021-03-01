<?php
    session_start();
    include 'connection.php';
   // Checks if user is logged in
    if (isset($_SESSION['username'])) {
        $check = true;
        if ($check) {
            echo json_encode($check);
        } 
    } else {
        $check = false;  
        echo json_encode($check);
    }
?>
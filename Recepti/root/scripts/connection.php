<?php header('Content-Type: text/html; charset=utf-8');

    $dbc = mysqli_connect('localhost:3307', 'root', '', 'recipes') 
    or die('Error connecting to MySQL server.'.mysqli_error());
    mysqli_set_charset($dbc, "utf8");

?>

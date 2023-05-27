<?php
    $dsn = 'mysql:host=localhost;dbname=FamousQuotesDB'; //might have connection issues because of letter case of dbname.
    $username = 'root';
    $password =  'p2Dw1dw3b-gam3';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>
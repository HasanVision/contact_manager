<?php
    session_start()
    $dsn = 'mysql:host=localhost;dbname=contact_manager';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $_SESSION['error_message'] = $e->getMessage();
        $url = 'database_err.php';
        header('Location: ' . $url);
        exit();
    }
?>
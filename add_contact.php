<?php
    session_start();

    // Get the contact data from the form 
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $email = filter_input(INPUT_POST, 'email');
    $phone = filter_input(INPUT_POST, 'phone');

    // save the contact data to the database
    if ($first_name == null || $last_name == null || $email == null || $phone == null ) {
        $_SESSION['error_message'] = "Invalid contact data. Check all fields and try again.";
        $url = 'error.php';
        header('Location: ' . $url);
        
        die();
    } else {
        require_once('database.php');
        $query = 'INSERT INTO contacts
                     (firstName, lastName, email, phone)
                  VALUES
                     (:first_name, :last_name, :email, :phone)';
        $statement = $db->prepare($query);
        $statement->bindValue(':first_name', $first_name);
        $statement->bindValue(':last_name', $last_name);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $statement->execute();
        $statement->closeCursor();

        // Display the contact List page
        include('index.php');
    }
    $_SESSION['full_name'] = $first_name . ' ' . $last_name;

    // redirect to the confirmation page
    $url = 'confirmation.php';
    header('Location: ' . $url);
    die();
?>
<?php
    session_start();
    $contact_id = filter_input(INPUT_POST, 'contact_id', FILTER_VALIDATE_INT);
    // Get the contact data from the form 
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $email = filter_input(INPUT_POST, 'email');
    $phone = filter_input(INPUT_POST, 'phone');
    $status = filter_input(INPUT_POST, 'status');
    $dob = filter_input(INPUT_POST, 'dob');

    // save the contact data to the database
    if ($first_name == null || $last_name == null || $email == null || $phone == null || $dob == null) {
        $_SESSION['error_message'] = "Invalid contact data. Check all fields and try again.";
        $url = 'error.php';
        header('Location: ' . $url);
        die();
    } else {
        require_once('database.php');
        $query = 'UPDATE contacts
                    SET firstName = :firstName,
                        lastName = :lastName,
                        email = :email,
                        phone = :phone,
                        status = :status,
                        dob = :dob
                    WHERE contactID = :contact_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':contact_id', $contact_id);
        $statement->bindValue(':firstName', $first_name);
        $statement->bindValue(':lastName', $last_name);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':status', $status);
        $statement->bindValue(':dob', $dob);
        $statement->execute();
        $statement->closeCursor();

        // Display the contact List page
        include('index.php');

    }
    $_SESSION['full_name'] = $first_name . ' ' . $last_name;

    // redirect to the confirmation page
    $url = 'update_confirmation.php';
    header('Location: ' . $url);
    die();

?>
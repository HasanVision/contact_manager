<?php
    require_once('database.php');
    // Get the contact data from the form 
    $contact_id = filter_input(INPUT_POST, 'contact_id', FILTER_VALIDATE_INT);
    

    // save the contact data to the database
    if ( $contact_id != false) {
       
        $query = 'DELETE FROM contacts
                     WHERE contactID = :contact_id';
                 
        $statement = $db->prepare($query);
        $statement->bindValue(':contact_id', $contact_id);
        $statement->execute();
        $statement->closeCursor();

        // Display the contact List page
        include('index.php');
    }
    
    // reload the page
    // $url = 'index.php';
    // header('Location: ' . $url);
    // die();
?>
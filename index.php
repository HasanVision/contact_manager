<?php
    require('database.php');
    $queryContacts = 'SELECT * FROM contacts';
    $statement1 = $db->prepare($queryContacts);
    $statement1->execute();
    $contacts = $statement1->fetchAll();
    $statement1->closeCursor();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="css/app.css">
        <title>Contact Manager - Home</title>
    </head>
<body>
    <?php
    include ("header.php"); 
    ?>
    <main>
<div>
    <h1>
        Welcome to the Contact Manager System
    </h1>
</div>

<div>
    <h2>
        Contacts List
    </h2>
    <table>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Email address</th>
            <th>phone No</th>
            <th>&nbsp;</th> <!-- empty cell for the edit button -->
            <th>&nbsp;</th> <!-- empty cell for the delete button -->
        
        </tr>
        <?php foreach ($contacts as $contact) : ?>
        <tr>
            <td><?php echo $contact['firstName']; ?></td>
            <td><?php echo $contact['lastName']; ?></td>
            <td><?php echo $contact['email']; ?></td>
            <td><?php echo $contact['phone']; ?></td>
            <td></td> <!-- empty cell for the edit button -->
            <td></td> <!-- empty cell for the delete button -->
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<p><a href="add_contact_form.php">Add Contact</a></p>
    </main>
    <?php 
    include ("footer.php"); 
    ?>
</body>
</html>
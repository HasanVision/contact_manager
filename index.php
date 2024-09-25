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
            <th>Status</th>
            <th>Date of birth</th>
            <th>&nbsp;</th> 
            <th>&nbsp;</th> 
        
        </tr>
        <?php foreach ($contacts as $contact) : ?>
        <tr>
            <td><?php echo $contact['firstName']; ?></td>
            <td><?php echo $contact['lastName']; ?></td>
            <td><?php echo $contact['email']; ?></td>
            <td><?php echo $contact['phone']; ?></td>
            <td><?php echo $contact['status']; ?></td>
            <td><?php echo $contact['dob']; ?></td>
            <td>
                <form action="update_contact_form.php" method="post">
                    <input type="hidden" name="contact_id" value="<?php echo $contact['contactID']; ?>">
                    <input type="submit" value="Update">
                </form>
            </td>
            <td><form action="delete_contact.php" method="post">
                    <input type="hidden" name="contact_id" value="<?php echo $contact['contactID']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td> 
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



<?php
require_once('database.php');
    $contact_id = filter_input(INPUT_POST, 'contact_id', FILTER_VALIDATE_INT);
    $query = 'SELECT * FROM contacts
              WHERE contactID = :contact_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':contact_id', $contact_id);
    $statement->execute();
    $contact = $statement->fetch();
    $statement->closeCursor();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="css/app.css">
        <title>Contact Manager - Update contact</title>
    </head>
<body>
    <?php
    include ("header.php"); 
    ?>
    <main>
        <h2>
            Update contact
        </h2>
        <form action="update_contact.php" method="post" id="update_contact_form" >
            <div id="data">
                <input type="hidden" name="contact_id" value="<?php echo $contact['contactID']; ?>">
                <label>First name:</label>
                <input type="text" name="first_name" value="<?php echo $contact['firstName']; ?>" ><br>
                <label>Last name:</label>
                <input type="text" name="last_name" value="<?php echo $contact['lastName']; ?>" ><br>
                <label>Email address:</label>
                <input type="email" name="email" value="<?php echo $contact['email']; ?>" ><br>
                <label>Phone No:</label>
                <input type="text" name="phone" value="<?php echo $contact['phone']; ?>" ><br>
                <label>Status</label>
                <input type="radio" name="status" value="member" <?php echo ($contact['status'] == 'member') ? 'checked' : ''; ?> />Member</br>
                <input type="radio" name="status" value="noneMember" <?php echo ($contact['status'] == 'noneMember') ? 'checked' : ''; ?> />Non-member</br>
                <label>&nbsp;</label>
            </div>
            <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Update"><br>
            </div>
        </form>

<p><a href="index.php">View Contact List</a></p>
    </main>
    <?php 
    include ("footer.php"); 
    ?>
</body>
</html>
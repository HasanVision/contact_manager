<?php
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="css/app.css">
        <title>Contact Manager - Confirmation</title>
    </head>
<body>
    <?php
    include ("header.php"); 
    ?>
    <main>

<div>
    <h2>
        Thank you for adding a contact
    </h2>
    <p>
        <?php echo $_SESSION['full_name']; ?> has been added to your contact list.
    </p>
    
</div>
<p><a href="index.php">Back to home</a></p>
    </main>
    <?php 
    include ("footer.php"); 
    ?>
</body>
</html>
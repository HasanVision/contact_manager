<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/app.css">
    <title>Contact Manager -  Error</title>
</head>
<body>
    <?php
    include ("header.php"); 
    ?>
    <main>
<div>
    <p>
        Error message: <?php echo $_SESSION["error_message"] ?>

    </p>
    <p><a href="add_contact_form.php">Try again</a></p>
</div>
    <p><a href="index.php"></a></p>
    </main>

    <?php 
    include ("footer.php"); 
    ?>
</body>
</html>
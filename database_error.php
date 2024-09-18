<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/app.css">
    <title>Contact Manager - Database Error</title>
</head>
<body>
    <?php
    include ("header.php"); 
    ?>
    <main>
<div>
    <h1>
        Database Error
    </h1>
    <p>
        There was an error connecting to the database.
    </p>
    <p>
        database must be running.
    </p>
    <p>
        Error message: <?php echo $_SESSION["$database_err;"] ?>
    </p>
</div>
    <p><a href="index.php"></a></p>
    </main>

    <?php 
    include ("footer.php"); 
    ?>
</body>
</html>
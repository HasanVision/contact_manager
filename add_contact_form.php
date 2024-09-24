
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="css/app.css">
        <title>Contact Manager - Add contact</title>
    </head>
<body>
    <?php
    include ("header.php"); 
    ?>
    <main>
        <h2>
            add contact
        </h2>
        <form action="add_contact.php" method="post" id="add_contact_form" >
            <div id="data">

                <label>First name:</label>
                <input type="text" name="first_name" required><br>
                <label>Last name:</label>
                <input type="text" name="last_name" required><br>
                <label>Email address:</label>
                <input type="email" name="email" required><br>
                <label>Phone No:</label>
                <input type="text" name="phone" ><br>
                <label>&nbsp;</label>
        
            </div>
            <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Save Contact"><br>
            </div>
        </form>

<p><a href="index.php">View Contact List</a></p>
    </main>
    <?php 
    include ("footer.php"); 
    ?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <h1>Registration Form</h1>
    <p>Please fill out this form with the required information</p>
    <?php
    if (isset($_GET['message'])) {
        echo "<p><center>" . htmlspecialchars($_GET['message']) . "</center></p>";
    }
    ?>
    <form action="new.php" method="post">
      Username:<br>
        <input name="username" type="text" required><br>
        Password: <br>
        <input name="password" type="password" required><br>
        <input type="submit" name="submit" value="Register">
    </form>
</body>
</html>


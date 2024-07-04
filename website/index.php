<?php

 include("database.php");

?>
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
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    
    Username: <br>
    <input name="username" type="text" required><br>
    Password: <br>
    <input  name="password" type="password" required><br>
    <input type="submit" name="submit" value="Register" >
    </form>
  </body>
</html>
<?php
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $username=filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
        $password=filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
        
        
        $hash=password_hash($password,PASSWORD_DEFAULT);
        $sql="INSERT INTO users(user,password)
        VALUES('$username','$hash')";
        try{
        mysqli_query($conn, $sql);
        echo "<p><center>You have registered successfully</centre></p>";
       }
       catch(mysqli_sql_exception)
       {
        
       }
    
}
mysqli_close($conn);
?>
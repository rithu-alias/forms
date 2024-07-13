
<?php
include('database.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    $hash = password_hash($password, PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO users (user, password) VALUES (:username, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hash);
        $stmt->execute();

        $message = "You have registered successfully";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { 
            $message = "The username is already taken";
        } else {
            $message = "Error: " . $e->getMessage();
        }
    }
    
    header("Location: index.php?message=" . urlencode($message));
    exit();
}
?>


?>

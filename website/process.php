<?php
include('Database.php');
include('User.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    $database = new Database();
    $user = new User($database->getConnection());

    $message = $user->register($username, $password);

    header("Location: index.php?message=" . urlencode($message));
    exit();
}
?>

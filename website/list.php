<?php
include('Database.php');
include('User.php');

use App\Database\Database;
use App\User\User;
$database = new Database();
$user=new User($database->getConnection());
$users= $user->getUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <h1>List of Registered Users</h1>
    <p><a href="index.php">Register a new user</a></p>
    <?php if (count($users) > 0): ?>
        <ul>
            <?php foreach ($users as $user): ?>
                <li><?php echo htmlspecialchars($user['user']); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No users found.</p>
    <?php endif; ?>
</body>
</html>

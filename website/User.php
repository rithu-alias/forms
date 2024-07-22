<?php
namespace App\User;
use PDO;
use PDOException;
class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function register($username, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        try {
            $sql = "INSERT INTO users (user, password) VALUES (:username, :password)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hash);
            $stmt->execute();

            return "You have registered successfully";
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) { 
                return "The username is already taken";
            } else {
                return "Error: " . $e->getMessage();
            }
        }
    }
    public function getUsers()
    {
        try{
            $sql = "SELECT user from users";
            $stmt=$this->pdo->query($sql);
            return $stmt->fetchALL();

        }
        catch (PDOException $e)
        {
            return [];
        }
    }
}
?>


<?php

class User {

    private $connection;

    public function __construct($conn) {
        $this->connection=$conn;
    }

    public function login($email, $password) {
        $query = $this->connection->prepare("SELECT * FROM user_credentials WHERE email = :email");
        $query->execute([
            "email" => $email,
        ]);
        $user = $query->fetch();
        if ($user && password_verify($password, $user["upassword"])) {
            //pass arguments to session in user variable
            $_SESSION["user"]=$user;
            $_SESSION["userid"]=$user["userid"];
            $_SESSION["role"]=$user["urole"];
            return true;
        }
        else {
            return false;
        }
    }
    
    public function register($email, $username, $password, $role) {
        
        $emailQuery = "SELECT * FROM user_credentials WHERE email = :email";
        $emailStatement = $this->connection->prepare($emailQuery);
        $emailStatement->execute(['email' => $email]);

        $usernameQuery = "SELECT * FROM user_credentials WHERE username = :username";
        $usernameStatement = $this->connection->prepare($usernameQuery);
        $usernameStatement->execute(['username' => $username]);

        if ($emailStatement->rowCount() > 0 || $usernameStatement->rowCount() > 0) {
            // Email or Username already exist, quit registration
            return false;
        }
        
        $query = $this->connection->prepare("INSERT INTO user_credentials (username, upassword, email, urole) VALUES (:username, :upassword, :email, :urole)");
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        $query->execute([
            "email" => $email,
            "username" => $username,
            "upassword" => $password_hashed,
            "urole" => $role
        ]);

        return $this->login($email, $password);
    }


    public function getUsernameFromId($id) {
        $query = $this->connection->prepare("CALL WelcomeProcedure(:id)");
        $query->execute([
            "id" => $id
        ]);
        $theUserId = $query->fetch();
        echo "<h1 class='wow fadeInUp' data-wow-delay='.2s'>Welcome back $theUserId[0] </h1>";
    }
}
?>












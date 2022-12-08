<?php

namespace App\Manager;

use App\Entity\User;

class UserManager extends BaseManager
{

    /**
     * @return User[]
     */
    public function getAllUsers(): array
    {
        $query = $this->pdo->query("SELECT * FROM User");
        $query->execute();
        $users = [];
        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new User($data);
        }
        return $users;
    }


    public function getByUserId(int $id): ?User
    {
        $query = $this->pdo->prepare("SELECT * FROM User WHERE id = :id");
        $query->bindValue("id", $id, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        if ($data) {
            return new User($data);
        }

        return null;
    }

    public function getByUserMailPswd(string $mail, string $password): ?User
    {
        $query = $this->pdo->prepare("SELECT * FROM User WHERE mail = :mail AND password = :password");
        $query->bindValue("mail", $mail, \PDO::PARAM_STR);
        $query->bindValue("password", $password, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        if ($data) {
            return new User($data);
        }

        return null;
    }

    public function insertUser(User $user)
    {
        $query = $this->pdo->prepare("INSERT INTO User (password, username), VALUES (:password, :username)");
        $query->bindValue("password", $user->getHashedPassword(), \PDO::PARAM_STR);
        $query->bindValue("username", $user->getUsername(), \PDO::PARAM_STR);
        $query->execute();
    }

    public function addUser(string $firstName, string $lastName, $email, $password)
    {
        $query = $this->pdo->prepare("INSERT INTO User (lastName, firstName, mail, password, roles) VALUES (:lastName, :firstName, :email, :password, 1)");
        $query->bindValue(":lastName", $lastName);
        $query->bindValue(":firstName", $firstName);
        $query->bindValue(":email", $email);
        $query->bindValue(":password", $password);
        $query->execute();
    }

    public function updateUser(int $id, string $firstName, string $lastName,string $mail,string $password, int $roles)
    {
        $query = $this->pdo->prepare("UPDATE User SET 
            id = :id, 
            lastName = :lastName, 
            firstName = :firstName, 
            mail = :mail, 
            password = :password, 
            roles = :roles
            WHERE id = :id
            ");
        $query->bindValue("id", $id, \PDO::PARAM_INT);
        $query->bindValue("lastName", $lastName, \PDO::PARAM_STR);
        $query->bindValue("firstName", $firstName, \PDO::PARAM_STR);
        $query->bindValue("mail", $mail, \PDO::PARAM_STR);
        $query->bindValue("password", $password, \PDO::PARAM_STR);
        $query->bindValue("roles", $roles, \PDO::PARAM_INT);
        $query->execute();
    }

    public function deleteUser(int $id)
    {
        $query = $this->pdo->prepare("DELETE FROM User WHERE id = :id");
        $query->bindValue("id", $id, \PDO::PARAM_STR);
        $query->execute();
    }


    public function getByUsername(string $username): ?User
    {
        $query = $this->pdo->prepare("SELECT * FROM User WHERE mail = :mail");
        $query->bindValue("mail", $username, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        if ($data) {
            return new User($data);
        }

        return null;
    }

    public function isAdmin() : ?bool
    {
        if(isset($_SESSION['role'], $_SESSION['username'])) {
            $role = $_SESSION['role'];
            $username = $_SESSION['username'];
            //var_dump($role);
            return true;
        }

        return null;
    }

}
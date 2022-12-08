<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\UserManager;
use App\Route\Route;

class SecurityController  extends AbstractController
{
    #[Route('/loginForm', name: "login", methods: ["GET"])]
    public function loginForm()
    {
        $this->render("users/login.php", [
        ], "Se Connecter");
    }

    #[Route('/login', name: "login", methods: ["POST"])]
    public function login()
    {

        $formUsername = $_POST['email'];
        $formHashPwd = $_POST['password'];


        $userManager = new UserManager(new PDOFactory());
        $user = $userManager->getByUserMailPswd($formUsername, $formHashPwd);

        if ($user === null)
        {
            //var_dump($user);
            header("Location: /?error=notfound");
            exit;
        }

        if (isset($user))
        {

            $_SESSION['role'] = "admin";
            $_SESSION['password'] = $formHashPwd;
            header("Location: http://localhost:5656/", TRUE,301);
            exit();
        }
        header("Location: /?error=notfound");
        exit;
    }

    #[Route('/logOut', name: "login", methods: ["GET"])]
    public function logOut()
    {
        session_unset();
        session_destroy();
        $_SESSION = array();
        header("Location: http://localhost:5656/", TRUE,301);
        exit();
    }

    #[Route('/api/users', name: "login", methods: ["GET"])]
    public function showUsers()
    {
        $userManager = new UserManager(new PDOFactory());
        $users=$userManager->getAllUsers();
        foreach($users as $user){

            echo json_encode([
                "id" =>$user->getId(),
                "lastname" => $user->getLastname(),
                "firstname" => $user->getFirstname(),
                "email" => $user->getEmail(),
                "password" => $user->getPassword()
            ]);
        
            //$t = json_encode($post);
            //echo $t;
            //var_dump($post);
            echo "<br>";
            
        }
    }

    #[Route('/registerForm', name: "login", methods: ["GET"])]
    public function registerForm()
    {
        $this->render("users/register.php", [
        ], "S'inscrire");
    }

    #[Route('/register', name: "register", methods: ["POST"])]
    public function register()
    {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $userManager = new UserManager(new PDOFactory());
        $userManager->addUser($firstName, $lastName, $email, $password);
        $_SESSION['role'] = "admin";
        $_SESSION['username'] = $password;
        header("Location: http://localhost:5656/", TRUE,301);
        exit();
    }

    #[Route('/updateUserForm/{id}', name: "updateUserForm", methods: ["GET"])]
    public function updateUserForm($id)
    {
        $userManager = new UserManager(new PDOFactory());
        $user=$userManager->getByUserId($id);
        $this->render("users/updateUser.php", [
            "user" => $user
            ], "Modifier l'utilisateur");
    }

    #[Route('/updateUser', name: "updateUser", methods: ["POST"])]
    public function updateUser()
    {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $userManager = new UserManager(new PDOFactory());
        $userManager->addUser($firstName, $lastName, $email, $password);
        header("Location: http://localhost:5656/users", TRUE,301);
        exit();
    }

    #[Route('/deleteUser/{id}', name: "deleteUser", methods: ["GET"])]
    public function deleteUser($id)
    {
        $userManager = new UserManager(new PDOFactory());
        $userManager->deleteUser($id);
        //comment peut on empecher que le user connecter se supprime lui même
        header("Location: http://localhost:5656/users", TRUE,301);
        exit();
    }

}
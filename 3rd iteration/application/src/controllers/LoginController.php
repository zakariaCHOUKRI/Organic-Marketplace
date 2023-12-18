<?php
session_start();
require '../models/User.php';
require '../dbconfig.php';
class LoginController
{
    private $userModel;
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }
    public function login()
    {
        try
        {
            $user=$this->userModel->login($_POST['email'], $_POST['password']);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
        if ($user) {
            switch ($_SESSION["role"]) {
                case 'admin':
                    header("location: ../views/AdminDashboard.php");
                    break;
                case 'sales':
                    header("location: ../views/SalesDashboard.php");
                    break;
                case 'logistics':
                    header("location: ../views/LogisticsDashboard.php");
                    break;
                case 'adv':
                    header("location: ../views/AdvDashboard.php");
                    break;
            }
            
        } else {
            header("location: ../views/login_page.php?error=0");
        }
    }

}


$user= new User($conn);
$loginController = new LoginController($user);
if(isset($_POST['email']))
{
    $loginController->login();
}
else
{
    if(isset($_GET['logout']))
    {
        session_destroy();
        header('Location: ../views/loginform.php');
    }
}









?>
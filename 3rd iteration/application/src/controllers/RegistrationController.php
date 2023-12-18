<?php
session_start();

include '../models/User.php';
include '../dbconfig.php';

class RegistrationController
{
    private $userModel;
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }
    public function register()
    {
        try{
            $user = $this->userModel->register($_POST['email'], $_POST['username'], $_POST['password'], $_POST['role']);
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
        } else{
            header("Location: ../views/login_page.php?error=1");
        }
    }
}


$user= new User($conn);
$regController = new RegistrationController($user);
if(isset($_POST['email']))
{
    $regController->register();
}






?>
<?php
	if(!isset($_SESSION))
	{
		session_start();
	}

    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == 'sales') {
            header('Location: ../views/SalesDashboard.php');
        } else if ($_SESSION['role'] == 'logistics') {
            header('Location: ../views/LogisticsDashboard.php');
        } else if ($_SESSION['role'] == 'adv') {
            header('Location: ../views/AdvDashboard.php');
        } else if ($_SESSION['role'] == 'admin') {
            header('Location: ../views/AdminDashboard.php');
        }
    } else {
        header('Location: ../views/login_page.php');
    }

?>
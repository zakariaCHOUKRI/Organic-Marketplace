<?php
session_start();


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
                default:
                    header("location: ../../index.php");
                    break;
            }



?>
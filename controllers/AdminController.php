<?php

    require_once "models/Admin.php";

    class AdminController {
        public function index() {
            if(isset($_SESSION['Admin'])){
                unset($_SESSION['Admin']);
                session_destroy();
            }
            if(isset($_POST['btnSignIn']) && isset($_POST['UserEmail'])) {
                $email = $_POST['UserEmail'];
                $pass = $_POST['UserPassword']; 
                $adminProcess = new Admin();
                $error = $adminProcess->processSignIn($email, $pass);
                if(!$error) {
                    header("location: index.php?controller=admin&action=signInProcess");
                }
            }
            require_once "views/admin/signinAdmin.php";
        }

        public function banPost() {
            $adminModel = new Admin();
            $PostID = $_GET['PostID'];
            $banUser = $adminModel->banPost($PostID);
            if($banUser) {
                header("location: index.php?controller=admin&action=signInProcess");
            } else {
                $error = "Cấm bài viết thất bại";
                header("location: views/templates/404page.php?error=$error");
            }
        }

        public function lockUser() {
            $adminModel = new Admin();
            $UserID = $_GET['UserID'];
            $lockUser = $adminModel->lockUser($UserID); 
            if($lockUser) {
                header("location: index.php?controller=admin&action=signInProcess");
            } else {
                $error = "Khóa thành viên thất bại";
                header("location: views/templates/404page.php?error=$error");
            }
        }

        public function unlockUser() {
            $adminModel = new Admin();
            $UserID = $_GET['UserID'];
            $unlockUser = $adminModel->unlockUser($UserID); 
            if($unlockUser) {
                header("location: index.php?controller=admin&action=signInProcess");
            } else {
                $error = "Mở khóa thành viên thất bại";
                header("location: views/templates/404page.php?error=$error");
            }
        }

        public function signInProcess() {
            $adminprocess = new Admin();
            if($_SESSION['Admin']) {
                $postsReported = $adminprocess->getPostReported();
                $reportedUser = $adminprocess->reportedUser();
                $lockedUser = $adminprocess->lockedUser();
                require_once "views/admin/index.php";
            } else {
                header("location: index.php?controller=admin&action=index");
            }
           
        }
    }

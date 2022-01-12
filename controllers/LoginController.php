<?php
    require_once 'models/Login.php';
   
    class LoginController {
        public function index() {
            if (isset($_POST['btnSignIn'])) {
                $email = $_POST['UserEmail'];
                $pass = $_POST['UserPassword']; 
                $login = new Login();
                $isVerified = $login->index($email, $pass);
                if($isVerified){
                    $_SESSION['isLoginOk'] = $isVerified;
                    header("location: index.php?controller=newsfeed&action=index");
                } else {
                    $error= "Tài khoản hoặc mật khẩu không chính xác!";
                    header("location: index.php?error=$error");
                }
            }
            require_once "views/login/login.php";
        }
    }
?>
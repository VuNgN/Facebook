<?php
    require_once 'models/Login.php';
   
    class LoginController {
        public function index() {
            // Sign in
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
            // Sign up
            else if (isset($_POST['btnSignUp'])) {
                $UserFirstName = $_POST['firstnameSignUp'];
                $UserLastName = $_POST['lastnameSignUp'];
                $UserMail = $_POST['emailSignUp'];
                $UserPasswd = $_POST['pwSignUp'];
                $UserBirth = "{$_POST['yearOfBirth']}-{$_POST['monthOfBirth']}-{$_POST['dayOfBirth']}";
                $UserGender = intval($_POST['genderSignUp']);
                $signUp = new Login();
                $isSignUp = $signUp->signUp($UserMail, $UserPasswd, $UserGender, $UserFirstName, $UserLastName, $UserBirth);
                if (!$isSignUp) {
                    header("location: views/login/welcomeNewUser.php");
                } else {
                    $error = $isSignUp;
                    header("location: views/templates/404page.php?error=$error");
                }
            }
            else {
                require_once "views/login/login.php";
            }
        }
        public function verify(){
            $key = $_GET['key'];
            $token = $_GET['token'];
            $signUp = new Login();
            $isVerified = $signUp->verifyMail($key, $token);
            if (!$isVerified) {
                header("location: views/login/registration_successful_page.php");
            } else {
                include "views/login/verify-email.php";
            }
        }
    }
?>
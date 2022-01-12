<?php
    require_once 'models/Profile.php';
    class ProfileController {
        public function index() {
            $UserID = $_SESSION['isLoginOk'];
            $Profile = new Profile($UserID);
            $profileInfo = $Profile->getProfileInfo();
            $profileImg = $Profile->getProfileImage();
            $profileFriend = $Profile->getProfileFriend();
            $profilePost = $Profile->getPost();
            
            require_once "views/profile/index.php";
        }
    }
?>
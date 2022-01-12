<?php
    require_once 'models/Newsfeed.php';
    class NewsfeedController {
        public function index() {
            $UserID = $_SESSION['isLoginOk'];
            $Newsfeed = new Newsfeed($UserID);
            $row_user_ava = $Newsfeed->getName(); 
            $posts = $Newsfeed->getPost();
            $friends = $Newsfeed->getFriend();
            require_once "views/newsfeed/index.php";
        }
    }
?>
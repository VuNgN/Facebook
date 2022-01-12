<?php
    require_once 'models/Newsfeed.php';
    class NewsfeedController {
        public function index() {
            $UserID = $_SESSION['isLoginOk'];
            $Newsfeed = new Newsfeed($UserID);
            $row_user_ava = $Newsfeed->getName(); 
            $posts = $Newsfeed->getPost();
            foreach($posts as $post){
                $postId = $post['PostID'];
            }
            $postImgs = $Newsfeed->getImgPost($postId);
            $row_count_comment = $Newsfeed->countComment($postId);
            $comments = $Newsfeed->getComment($postId);
            require_once "views/newsfeed/index.php";
        }
        public function sideBar() {

        }
    }
?>
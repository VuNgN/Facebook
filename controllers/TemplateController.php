<?php
    require_once 'models/Template.php';
   
    class TemplateController {
        public function header() { 
            $UserID = $_SESSION['isLoginOk'];
            $templates = new Template($UserID);
            $row_user_ava = $templates->getName();
            $row_friend_notify = $templates->getFriend();
            $row_notify = $templates->getNotify();
            require_once "views/templates/header.php";
        }
        public function footer() {
            require_once "views/templates/footer.php";
        }
        public function search() {
            $UserID = $_SESSION['isLoginOk'];
            $templates = new Template($UserID);
            if(isset($_POST['search-btn'])){
                $search = $_POST['search-input'];
                if($search != ''){
                    $users = $templates->getUserSearch($search);
                }
            }
            require_once "views/templates/search.php";
        }
        public function postDetail(){
            $UserID = $_SESSION['isLoginOk'];
            $templates = new Template($UserID);
            $PostID = $_GET['PostID'];
            $PostDetail = $templates->PostDetail($PostID);
            $row_user_ava = $templates->getName();
            require_once "views/templates/post.php";
        }
        public function likeProcess() {
            $UserID = $_SESSION['isLoginOk'];
            $templates = new Template($UserID);
            $PostID = $_GET['PostID'];
            $templates->likeProcess($PostID);
            header("location: index.php?controller=template&action=postDetail&PostID=".$PostID);
        }
    }
?>
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
            if(isset($_POST['search-btn']) && $_POST['search-input']){
                $search = $_POST['search-input'];
                if($search != ''){
                    $users = $templates->getUserSearch($search);
                }
                require_once "views/templates/search.php";
            }
            else {
                header("location: index.php");       
            }
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
        public function addComment(){
            //add cmt
            $UserID = $_SESSION['isLoginOk'];
            $templates = new Template($UserID);
            if (isset($_POST["btn-comment"])&& $_POST['txt-comment']){
                $UserCommentID = $_POST["UserID"];
                $PostID = $_POST["PostID"];
                $CommentContent = $_POST["txt-comment"];
                $arrComment = [
                    'userID' => $UserCommentID,
                    'postID' => $PostID,
                    'content' => $CommentContent
                ];
                $templatesAddComment = $templates->addComment($arrComment);
            }
            header("location: index.php?controller=template&action=postDetail&PostID=".$PostID);
        }
        public function editComment(){
            //edit cmt
            $UserID = $_SESSION['isLoginOk'];
            $templates = new Template($UserID);
            if (isset($_POST["btn-edit"]) && $_POST['txt-edit']){
                $CommentID = $_POST["CommentID"];
                $CommentContent = $_POST["txt-edit"];
                $arrComment = [
                    'commentID' => $CommentID,
                    'content' => $CommentContent
                ];
                $templatesAddComment = $templates->editComment($arrComment);
            }
            $PostID = $_GET['PostID'];
            header("location: index.php?controller=template&action=postDetail&PostID=".$PostID);
        }
        public function deleteComment(){
            //delete cmt
            $UserID = $_SESSION['isLoginOk'];
            $templates = new Template($UserID);
            $commentID = $_GET['CommentID'];
            $templatesAddComment = $templates->deleteComment($commentID);
            $PostID = $_GET['PostID'];
            header("location: index.php?controller=template&action=postDetail&PostID=".$PostID);
        }
    }
?>
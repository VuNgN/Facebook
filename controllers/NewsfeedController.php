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
        public function addComment(){
            //add cmt
            $UserID = $_SESSION['isLoginOk'];
            $Newsfeed = new Newsfeed($UserID);
            if (isset($_POST["btn-comment"])&& $_POST['txt-comment']){
                $UserCommentID = $_POST["UserID"];
                $PostID = $_POST["PostID"];
                $CommentContent = $_POST["txt-comment"];
                $arrComment = [
                    'userID' => $UserCommentID,
                    'postID' => $PostID,
                    'content' => $CommentContent
                ];
                $NewsfeedAddComment = $Newsfeed->addComment($arrComment);
            }
            header('location: index.php?controller=Newsfeed&action=index');
        }
        public function editComment(){
            //edit cmt
            $UserID = $_SESSION['isLoginOk'];
            $Newsfeed = new Newsfeed($UserID);
            if (isset($_POST["btn-edit"])&& $_POST['txt-edit']){
                $CommentID = $_POST["CommentID"];
                $CommentContent = $_POST["txt-edit"];
                $arrComment = [
                    'commentID' => $CommentID,
                    'content' => $CommentContent
                ];
                $NewsfeedAddComment = $Newsfeed->editComment($arrComment);
            }
            header('location: index.php?controller=Newsfeed&action=index');
        }
        public function deleteComment(){
            //delete cmt
            $UserID = $_SESSION['isLoginOk'];
            $Newsfeed = new Newsfeed($UserID);
            $commentID = $_GET['CommentID'];
            $NewsfeedAddComment = $Newsfeed->deleteComment($commentID);
            header('location: index.php?controller=Newsfeed&action=index');
        }
        public function addPost(){
            $UserID = $_SESSION['isLoginOk'];
            $Newsfeed = new Newsfeed($UserID);
            if (isset($_POST['btn-sendPost']) && ($_POST['txt-content'] || $_FILES['myFile'])){
                $PostContent = $_POST['txt-content'];
                $PostImg = $_FILES['myFile'];
                $arrPost = [
                    'content' => $PostContent,
                    'img' => $PostImg
                ];
                $newsfeedAddPost = $Newsfeed->addPost($arrPost);
                header('location: index.php?controller=profile&action=index');
            }
        }
    }
?>
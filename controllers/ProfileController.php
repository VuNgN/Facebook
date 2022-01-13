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
        public function addComment(){
            //add cmt
            $UserID = $_SESSION['isLoginOk'];
            $Profile = new Profile($UserID);
            if (isset($_POST["btn-comment"])&& $_POST['txt-comment']){
                $UserCommentID = $_POST["UserID"];
                $PostID = $_POST["PostID"];
                $CommentContent = $_POST["txt-comment"];
                $arrComment = [
                    'userID' => $UserCommentID,
                    'postID' => $PostID,
                    'content' => $CommentContent
                ];
                $profileAddComment = $Profile->addComment($arrComment);
            }
            header('location: index.php?controller=profile&action=index');
        }
        public function editComment(){
            //edit cmt
            $UserID = $_SESSION['isLoginOk'];
            $Profile = new Profile($UserID);
            if (isset($_POST["btn-edit"]) && $_POST['txt-edit']){
                $CommentID = $_POST["CommentID"];
                $CommentContent = $_POST["txt-edit"];
                $arrComment = [
                    'commentID' => $CommentID,
                    'content' => $CommentContent
                ];
                $profileAddComment = $Profile->editComment($arrComment);
            }
            header('location: index.php?controller=profile&action=index');
        }
        public function deleteComment(){
            //delete cmt
            $UserID = $_SESSION['isLoginOk'];
            $Profile = new Profile($UserID);
            $commentID = $_GET['CommentID'];
            $profileAddComment = $Profile->deleteComment($commentID);
            header('location: index.php?controller=profile&action=index');
        }
        public function addPost(){
            $UserID = $_SESSION['isLoginOk'];
            $Profile = new Profile($UserID);
            if (isset($_POST['btn-sendPost']) && ($_POST['txt-content'] || $_FILES['myFile'])){
                $PostContent = $_POST['txt-content'];
                $PostImg = $_FILES['myFile'];
                $arrPost = [
                    'content' => $PostContent,
                    'img' => $PostImg
                ];
                $profileAddPost = $Profile->addPost($arrPost);
            header('location: index.php?controller=profile&action=index');
            }
        }
        public function editPost(){
            
        }
        public function deletePost(){
            $UserID = $_SESSION['isLoginOk'];
            $Profile = new Profile($UserID);
            $PostID = $_GET['PostID'];
            echo $PostID;
            $profileDeleltePost = $Profile->deletePost($PostID);
            header('location: index.php?controller=profile&action=index');
        }
    }
?>
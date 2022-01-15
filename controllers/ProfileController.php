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
        public function viewImage () {
            $UserID = $_SESSION['isLoginOk'];
            $Profile = new Profile($UserID);
            $profileInfo = $Profile->getProfileInfo();
            $getImgage = $Profile->viewImg();
            require_once "views/profile/user_profile_image.php";
        }

        public function viewFriend() {
            $UserID = $_SESSION['isLoginOk'];
            $Profile = new Profile($UserID);
            $profileInfo = $Profile->getProfileInfo();
            $getFriend = $Profile->viewFriend();
            require_once "views/profile/user_profile_myFriend.php";
        }

        public function viewVideo() {
            $UserID = $_SESSION['isLoginOk'];
            $Profile = new Profile($UserID);
            $profileInfo = $Profile->getProfileInfo();
            require_once "views/profile/user_profile_video.php";
        }
        public function viewGioiThieu() {
            $UserID = $_SESSION['isLoginOk'];
            $Profile = new Profile($UserID);
            $getFriend = $Profile->viewFriend();
            $getImgage = $Profile->viewImg();
            $profileInfo = $Profile->getProfileInfo();

            require_once "views/profile/user_profile_gioithieu.php";
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
            $UserID = $_SESSION['isLoginOk'];
            $Profile = new Profile($UserID);
            if(isset($_POST['btn-sendPost']) && $_POST['editContent']){
                $PostID = $_GET['PostID'];
                $EditContent = $_POST['editContent'];
                $arrEdit = [
                    'PostID' => $PostID,
                    'edit' => $EditContent
                ];
                $profileEditPost = $Profile->editPost($arrEdit);
                header('location: index.php?controller=profile&action=index');
            }
        }
        public function deletePost(){
            $UserID = $_SESSION['isLoginOk'];
            $Profile = new Profile($UserID);
            $PostID = $_GET['PostID'];
            echo $PostID;
            $profileDeleltePost = $Profile->deletePost($PostID);
            header('location: index.php?controller=profile&action=index');
        }

        public function getFriendInfo() {
            $UserID = $_SESSION['isLoginOk'];
            $Profile = new Profile($UserID);
            $IDFriend = $_GET['UserIDFriend'];
            $friendInfo = $Profile->getFriendInfo($IDFriend);
            $isMySendFriend = $Profile->isMySendFriend($IDFriend);
            $isOtherSendFriend = $Profile->isOtherSendFriend($IDFriend);
            $profileImg = $Profile->getFriendImage($IDFriend );
            $profileFriend = $Profile->getFriendsFriend($IDFriend);
            $profilePost = $Profile->getFriendPost($IDFriend);
            $getProfileImage = $Profile->getAvatar($UserID);
            include_once "views/profile/friend.php";
        }

        public function processFriend() {
            $UserID = $_SESSION['isLoginOk'];
            $Profile = new Profile($UserID);
            $IDFriend = 0;
            if (isset($_POST['removeFriend']) or isset($_POST['addFriend']) or isset($_POST['cancelFriend']) or isset($_POST['acceptFriend'])){
                if (isset($_POST['addFriend'])) {
                    $IDFriend = $_POST['addFriend'];
                    $Profile->addFriend($IDFriend);
                }
                if (isset($_POST['acceptFriend'])) {
                    $IDFriend = $_POST['acceptFriend'];
                    $Profile->acceptFriend($IDFriend);
                }
                if (isset($_POST['cancelFriend'])) {
                    $IDFriend = $_POST['cancelFriend'];
                    $Profile->cancelFriend($IDFriend);
                }
                if (isset($_POST['removeFriend'])) {
                    $IDFriend = $_POST['removeFriend'];
                    $Profile->removeFriend($IDFriend);
                }
            }
            header("location: index.php?controller=profile&action=getFriendInfo&UserIDFriend= ". $IDFriend ." ");
        }
        public function addCommentFriend(){
            //add cmt
            $UserID = $_SESSION['isLoginOk'];
            $Profile = new Profile($UserID);
            $friendID = $_POST["UserIDFriend"];
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
            header("location: index.php?controller=profile&action=getFriendInfo&UserIDFriend=".$friendID);
        }
        public function likeProcess() {
            $UserID = $_SESSION['isLoginOk'];
            $Profile = new Profile($UserID);
            $PostID = $_GET['PostID'];
            $friendID = $_GET['UserID'];
            $Profile->likeProcess($PostID);
            header("location: index.php?controller=profile&action=getFriendInfo&UserIDFriend=".$friendID);
        }
    }

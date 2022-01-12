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
    }
?>
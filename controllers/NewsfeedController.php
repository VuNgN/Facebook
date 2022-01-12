<?php
    require_once 'models/Newsfeed.php';
    class NewsfeedController {
        public function index() {
            require_once "views/newsfeed/index.php";
        }
    }
?>
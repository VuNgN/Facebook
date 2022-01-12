<?php
    require_once 'configs/db.php';
    class Newsfeed {
        public function index() {
            $connection = $this->connectDb();
            $querySelect = "SELECT * FROM post";
            $results = mysqli_query($connection, $querySelect);
            $posts = [];
            if (mysqli_num_rows($results) > 0) {
                $posts = mysqli_fetch_all($results, MYSQLI_ASSOC);
            }
            $this->closeDb($connection);
    
            return $posts;
        }
        public function connectDb() {
            $connection = mysqli_connect(DB_HOST,
            DB_USERNAME, DB_PASSWORD, DB_NAME);
            if (!$connection) {
                die("Không thể kết nối. Lỗi: " .mysqli_connect_error());
            }

            return $connection;
        }
        public function closeDb($connection = null){
            mysqli_close($connection);
        }
    }
?>
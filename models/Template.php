<?php
    require_once 'configs/db.php';
    class Template {
        private $UserID;
        
        function __construct($UserID){
            $this->UserID = $UserID;
        }
        
        public function index() {

        }
        public function getName() {
            $connection = $this->connectDb();
            $sql_user_ava = "SELECT CONCAT(UserFirstName, ' ', UserLastName) as UserName, UserAva FROM user_profile WHERE UserID =  '".$this->UserID."'";
            $result_user_ava = mysqli_query($connection, $sql_user_ava);
            $names = [];
            if(mysqli_num_rows($result_user_ava) > 0){
                $names = mysqli_fetch_assoc($result_user_ava); 
            }
            $this->closeDb($connection);
            return $names;
        }
        public function getFriend(){
            $connection = $this->connectDb();
            $sql_friend_notify = "SELECT UserID, CONCAT(UserFirstName, ' ', UserLastName) as UserName, UserAva
                            FROM friend_ship INNER JOIN user_profile
                            on UserID = User1ID or UserID = User2ID
                            WHERE User2ID = '".$this->UserID."' and UserID !='".$this->UserID."' AND friend_ship.Active = 0";
            $result_friend_notify = mysqli_query($connection, $sql_friend_notify);
            $friends = [];
            if(mysqli_num_rows($result_friend_notify) > 0){
                    $friends = mysqli_fetch_assoc($result_friend_notify); 
                }
            $this->closeDb($connection);
            return $friends;
        }
        public function getNotify(){
            $connection = $this->connectDb();
            $sql_notify = "SELECT PostID, Bang.UserID, UserName, PostCaption, UserAva,
                    MINUTE(TIMEDIFF(NOW(),PostTime)) as MM, HOUR(timediff(NOW(),PostTime)) as HH
                        from user_profile,
                        (SELECT *
                        FROM friend_ship INNER JOIN view_post
                        on UserID = User1ID or UserID = User2ID
                        WHERE (User1ID = '".$this->UserID."' or User2ID = '".$this->UserID."') AND Active = 1) as Bang
                    WHERE Bang.UserID != '".$this->UserID."' AND Bang.UserID = user_profile.UserID
                    ORDER BY PostTime DESC";
            $result_notify = mysqli_query($connection, $sql_notify);
            $notify = [];
            if (mysqli_num_rows($result_notify) > 0) {
                    $notify = mysqli_fetch_assoc($result_notify); 
                }
            $this->closeDb($connection);
            return $notify;
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
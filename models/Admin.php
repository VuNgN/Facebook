<?php
    require_once "configs/db.php";
    class Admin {
        public function getPostReported () {
            $conn = $this->connectDb(); 
            $sql_news = "SELECT view_post.PostID, view_post.UserID, view_post.UserName, view_post.PostTime, view_post.PostCaption, UserAva
                        FROM user_profile,view_post INNER JOIN post
                        ON post.PostID = view_post.PostID
                        WHERE post.Reported = 1 and post.UserID = user_profile.UserID";
            $result_news = mysqli_query($conn, $sql_news);
            $postReported = [];
            if (mysqli_num_rows($result_news) > 0) {
                $postReported = mysqli_fetch_all($result_news, MYSQLI_ASSOC);
            }
            $this->closeDb($conn);
            return $postReported;
        }

        public function showPost($postid) {
            $conn = $this->connectDb(); 
            $sql_img_content = "SELECT * FROM images INNER JOIN post ON post.PostID = images.PostID WHERE post.PostID=" .$postid;
            $result_img_content = mysqli_query($conn, $sql_img_content);
            $postDetail = [];
            if(mysqli_num_rows($result_img_content) > 0){
                $postDetail = mysqli_fetch_all($result_img_content, MYSQLI_ASSOC);
            }
            $this->closeDb($conn);
            return $postDetail;
        }

        public function reportedUser() {
            $conn = $this->connectDb(); 
            $sql_reported_user = "SELECT UserID, CONCAT(UserFirstName, ' ', UserLastName) as UserName, UserAva, Reported
                                 FROM user_profile WHERE Reported > 0 and Active = 1";
            $result_reported_user = mysqli_query($conn, $sql_reported_user);
            $people = [];
            if(mysqli_num_rows($result_reported_user)>0){
                $people = mysqli_fetch_all($result_reported_user, MYSQLI_ASSOC);
            }
            $this->closeDb($conn);
            return $people;
        }
        public function lockedUser () {
            $conn = $this->connectDb(); 
            $sql_locked_user = "SELECT UserID, CONCAT(UserFirstName, ' ', UserLastName) as UserName, UserAva, Reported, TIMEDIFF(NOW(),LockTime) as Time
                                FROM user_profile WHERE Reported > 0 and Active = 0";
            $result_locked_user = mysqli_query($conn, $sql_locked_user);
            $people = [];
            if(mysqli_num_rows($result_locked_user)>0){
                $people = mysqli_fetch_all($result_locked_user, MYSQLI_ASSOC);
            }
            $this->closeDb($conn);
            return $people;
        }

        public function banPost($postid) { 
            $conn = $this->connectDb(); 
            $sql1 = "DELETE FROM comment WHERE PostID = $postid"; // xoa comment cua post
            $sql3 = "DELETE FROM images WHERE PostID = $postid";  //xóa anh của post
            $sql4 = "DELETE FROM like_action WHERE PostID = $postid";
            $sql2 = "DELETE FROM post WHERE PostID = $postid";     //xóa post
            $result1 = mysqli_query($conn, $sql1);
            $result3 = mysqli_query($conn, $sql3);
            $result4 = mysqli_query($conn, $sql4);
            $result2 = mysqli_query($conn, $sql2);
            $this->closeDb($conn);
            return ($result1 && $result2 && $result3 && $result4);
        }

        public function lockUser($userid) { 
            $conn = $this->connectDb(); 
            $sql = "UPDATE user_profile SET Active = 0, LockTime = NOW() WHERE UserID = $userid";
            $result = mysqli_query($conn,$sql);
            $this->closeDb($conn);
            return $result;
        }

        public function unlockUser($userid) { 
            $conn = $this->connectDb(); 
            $sql = "UPDATE user_profile SET Active = 1, LockTime = NULL WHERE UserID = $userid";
            $result = mysqli_query($conn,$sql);
            $this->closeDb($conn);
            return $result;
        }

        public function processSignIn($email, $pass) {
            $conn = $this->connectDb(); 
            $sql = "select * from admin where Email=?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "s", $email);
            if(mysqli_stmt_execute($stmt)) {
                mysqli_stmt_bind_result($stmt, $UserId, $UserEmail, $UserPass);
                if (mysqli_stmt_fetch($stmt)){
                    if(password_verify($pass, $UserPass)){
                        $_SESSION['Admin'] = $UserId;
                        $this->closeDb($conn);
                        return "";
                    } else {
                        $error= "Tài khoản hoặc mật khẩu không chính xác!";
                    }
                } else {
                    $error= "Tài khoản hoặc mật khẩu không tồn tại!";
                }
            } else {
                echo 'khong co du lieu';
            }    
            $this->closeDb($conn);
            return $error;
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

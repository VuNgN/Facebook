<?php
    require_once 'configs/db.php';
    class Login {
        public function index( $email, $pass ) {
            $conn = $this->connectDb(); 
            $sql = "select * from user_profile where UserEmail=?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "s", $email);
            if(mysqli_stmt_execute($stmt)) {
                mysqli_stmt_bind_result($stmt, $UserId, $UserEmail, $UserPass, $UserGender, $UserFirstName, $UserLastName, $UserBirth, $UserAddress, $UserAva, $Reported, $Description, $VerifyLink, $Active, $VerifyDate, $LockTime);
                if (mysqli_stmt_fetch($stmt)){
                    $this->closeDb($conn);
                    
                    return (password_verify($pass, $UserPass) && $Active === 1) ? $UserId : false;                 
                } else {
                    echo 'Du lieu khong khop';
                    $this->closeDb($conn);
                }
            } else {
                $this->closeDb($conn);
                echo 'khong co du lieu';
            }    
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
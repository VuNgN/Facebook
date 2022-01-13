<?php
    require_once 'configs/db.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
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
        public function signUp ($UserMail, $UserPasswd, $UserGender, $UserFirstName, $UserLastName, $UserBirth) {
            $conn = $this->connectDb(); 
            $sql = "select * from user_profile where UserEmail = '$UserMail'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) == 0){
                $token = md5($UserMail).rand(10,9999);
                $pass_hash = password_hash($UserPasswd, PASSWORD_DEFAULT);
                $sql2 = "insert into user_profile (UserEmail, UserPass, UserGender, UserFirstName, UserLastName, UserBirth, VerifyLink) values ('$UserMail', '$pass_hash', {$UserGender}, '$UserFirstName', '$UserLastName', '$UserBirth', '$token')";
                $result2 = mysqli_query($conn, $sql2);
                if($result2) {
                    $link = "localhost/facebook/index.php?controller=login&action=verify&key=".$UserMail."&token=".$token."";
                    $isSendMail = $this->sendMail($UserMail, $link);
                    return $isSendMail;
                } else {
                    return "Loi ket noi voi csdl";
                }
            } else {
                return "Email da ton tai";
            }
        }
        public function sendMail($email, $link) {
            require 'configs/PHPMailer/Exception.php';
            require 'configs/PHPMailer/PHPMailer.php';
            require 'configs/PHPMailer/SMTP.php';
            $username = 'nnvu.edu@gmail.com';
            $password = 'jvwjgpnzfjftzobv';
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = $username;                     //SMTP username
                $mail->Password   = $password;                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                $mail->CharSet    = 'utf-8';


                //Recipients
                $mail->setFrom($username, 'Facebook');
                $mail->addAddress($email);               //Name is optional

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Chào mừng bạn đến với trang fb của chúng tôi!';
                $mail->Body    = "Chào mừng {$email}!<br>Để xác minh tài khoản, hãy truy cập đường link sau đây: <br><a href='$link'>Xác minh tài khoản</a>";
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
            } catch (Exception $e) {
                return "Email có vẻ không tồn tại rồi bạn êiiii";
            }   
            return ""; 
        }
        public function verifyMail($email, $token) {
            $conn = $this->connectDb(); 
            $query = mysqli_query(
                $conn,
                "SELECT * FROM user_profile WHERE VerifyLink='" . $token . "' and UserEmail='" . $email . "';"
            );
            $d = date("Y-m-d H:i:s");
            if (mysqli_num_rows($query) > 0) { 
                $row = mysqli_fetch_array($query); 
                if ($row["VerifyDate"] == null) { 
                    mysqli_query( $conn, "UPDATE user_profile set VerifyDate ='". $d ."', Active = 1 WHERE UserEmail='" . $email . "'" ); 
                    return "";
                    } else { 
                    return "Bạn đã xác nhận tài khoản trước đó rồi!"; 
                    } 
                } else { 
                    return "This email has been not registered with us"; 
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
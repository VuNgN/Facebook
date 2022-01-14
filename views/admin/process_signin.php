<?php
session_start();
if(isset($_POST['btnSignIn']) && isset($_POST['UserEmail'])) {
    require('../src/connectDB.php');
    $email = $_POST['UserEmail'];
    $pass = $_POST['UserPassword']; 
    $sql = "select * from admin where Email=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    if(mysqli_stmt_execute($stmt)) {
        mysqli_stmt_bind_result($stmt, $UserId, $UserEmail, $UserPass);
        if (mysqli_stmt_fetch($stmt)){
            if(password_verify($pass, $UserPass)){
                $_SESSION['Admin'] = $UserId;
                mysqli_close($conn);
                header("Location: index.php");
            } else {
                mysqli_close($conn);
                $error= "Tài khoản hoặc mật khẩu không chính xác!";
                header("location: signinAdmin.php?error=$error");
            }
        } else {
            mysqli_close($conn);
            $error= "Tài khoản hoặc mật khẩu không tồn tại!";
            header("location: signinAdmin.php?error=$error");
        }
    } else {
        mysqli_close($conn);
        echo 'khong co du lieu';
    }    
}  
?>

<?php
    require('../src/connectDB.php');
    $email = 'admin2@gmail.com';
    $password = '123';
    $pass_hash = password_hash($password, PASSWORD_DEFAULT);
    $sql1 = "insert into admin(Email, Pass) values ('".$email."','".$pass_hash."')";
    $sql2 = "select * from admin where Email = '".$email."'";
    $result1 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result1) <= 0) {
        mysqli_query($conn, $sql1);
    } 
?>
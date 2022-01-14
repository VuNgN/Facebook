<?php
    session_start();    
    if(!isset($_SESSION['Admin'])) {
        header('Location: signinAdmin.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--GOOGLE FONT-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
<!--THƯ VIỆN FONT AWASOME-->
    <script src="https://kit.fontawesome.com/f15068147b.js" crossorigin="anonymous"></script>
<!--THƯ VIỆN BOOSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!--CSS ADMIN-->
    <link rel="stylesheet" href="css/admin.css">
    <!--FaceBook LOGO-->
    <link rel="icon" href="..\assets\images\Facebook_logo\Facebook_logo.ico" type="image/x-icon"/>
    <title>Admin-Facebook</title>
</head>
<body>
<!--HEADER-->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <div class="fb_logo">
                        <i class="fab fa-facebook-f fb-icon"></i>
                    </div>
                </a>
                <div class="admin-account">
                    <b>Admin</b>
                    <div class="account">
                    <span class="material-icons-outlined admin-icon">
                        account_circle
                    </span>
                    </div>
                </div>
                <div class="log-out">
                    <a href="signinAdmin.php" class="text-decoration-none link-dark">
                        <div class="item">
                            <span class="material-icons-outlined">
                                logout
                            </span>
                            <b>Log-out</b>
                        </div>
                    </a>        
                </div>
            </div>
          </nav>
    </header>
<!--MAIN-->
<main>
<!--REPORTED POST-->
        <div class="reported-posts option-select">
            <span class="material-icons-outlined icon">
                speaker_notes_off
            </span>
            <b>Bài viết bị báo cáo</b>
        </div>
        <div class="main-news-report">
<?php
    //KẾT NỐI SQL
    include "../src/connectDB.php";
    //TRUY VẤN POST BỊ REPORT
    $sql_news = "SELECT view_post.PostID, view_post.UserID, view_post.UserName, view_post.PostTime, view_post.PostCaption, UserAva
                FROM user_profile,view_post INNER JOIN post
                ON post.PostID = view_post.PostID
                WHERE post.Reported = 1 and post.UserID = user_profile.UserID";
    $result_news = mysqli_query($conn, $sql_news);
    if(mysqli_num_rows($result_news) > 0){
        while($row_news = mysqli_fetch_assoc($result_news)){
?>
            <div class="news">
                <div class="row">
                    <div class="heading">
                        <a class="user-ava">
                            <img class="user-img" src="../<?php echo $row_news['UserAva']?>" alt="">
                        </a>
                        <div class="user-name-time">
                            <a class="user-name text-decoration-none link-dark">
                                <b><?php echo $row_news['UserName'];?></b>
                            </a>
                            <h6 class="time">
                                <?php echo $row_news['PostTime'];?>
                            </h6>
                        </div>
                        <div class="option ms-auto">
                            <div class="option-icon collapsible" >
                                <span class="material-icons-outlined" style="position: absolute;">
                                    more_horiz
                                </span>
                            </div>
                            <div class="content" >
                                <div class="option-item">
                                    <a class="col-md-12 items text-decoration-none link-dark"
                                        href="controllers/process_ban_post.php?PostID= <?php echo $row_news['PostID'];?>">
                                        <span class="material-icons-outlined">
                                            remove_circle_outline
                                        </span>
                                        <b>Ban bài viết</b>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="news-content">
                        <div class="content-caption">
                            <?php echo $row_news['PostCaption'];?>
                        </div>
                        <div class="content-images">
                        <?php
    $sql_img_content = "SELECT * FROM images INNER JOIN post ON post.PostID = images.PostID WHERE post.PostID=" .$row_news['PostID'];
    $result_img_content = mysqli_query($conn, $sql_img_content);
    if(mysqli_num_rows($result_img_content) > 0){
        while($row_img_content = mysqli_fetch_assoc($result_img_content)){
    
?>
                        <img src="../<?php echo $row_img_content['images'];?>" alt="">
<?php
        }
    }
?>
                        </div>
                    </div>
                </div>
                
            </div>
<?php
        }
    }
?>
        </div>
<!--REPORTED USER-->
        <div class="reported-users option-select">
            <span class="material-icons-outlined icon">
                person_remove
            </span>
            <b>Người dùng bị báo cáo</b>
        </div>
        <div class="main-users-report">
<?php
    //TRUY VẤN USER BỊ REPORT
    $sql_reported_user = "SELECT UserID, CONCAT(UserFirstName, ' ', UserLastName) as UserName, UserAva, Reported
                        FROM user_profile WHERE Reported > 0 and Active = 1";
    $result_reported_user = mysqli_query($conn, $sql_reported_user);
    if(mysqli_num_rows($result_reported_user)>0){
        while($row_reported_user = mysqli_fetch_assoc($result_reported_user)){
?>
            <div class="row search-results">
                <div class="col-md-12 search-result-item collapsible">
                    <div class="user-icon">
                        <img class="user-img" src="../<?php echo $row_reported_user['UserAva'];?>" alt="">
                    </div>
                    <div class="txt">
                        <b><?php echo $row_reported_user['UserName'];?></b>
                    </div>
                    <div class="txt ms-auto txt-lock">
                    <b>Reported:
                        <p style="color: red;"><?php echo $row_reported_user['Reported'];?></p>
                    </b>
                    </div>
                </div>
                <div class="ban-option content">
                    <a class="ban-item text-decoration-none link-dark"
                        href="controllers/process_lock_user.php?UserID= <?php echo $row_reported_user['UserID'];?>">
                        <span class="material-icons-outlined lock-icon">
                            lock
                        </span>
                        <b>Khóa tài khoản</b>
                    </a>
                </div>
                <hr style="margin: 0px">
            </div>
<?php
        }
    }
?>
        </div>
<!--LOCKED USER-->
    <div class="locked-users option-select">
        <span class="material-icons-outlined icon">
            punch_clock
        </span>
        <b>Người dùng bị khóa</b>
    </div>
    <div class="main-users-ban">
<?php
    //TRUY VẤN USER BỊ LOCKER
    $sql_locked_user = "SELECT UserID, CONCAT(UserFirstName, ' ', UserLastName) as UserName, UserAva, Reported, TIMEDIFF(NOW(),LockTime) as Time
                        FROM user_profile WHERE Reported > 0 and Active = 0";
    $result_locked_user = mysqli_query($conn, $sql_locked_user);
    if(mysqli_num_rows($result_locked_user)>0){
        while($row_locked_user = mysqli_fetch_assoc($result_locked_user)){
?>
        <div class="row search-results">
            <div class="col-md-12 search-result-item collapsible">
                <div class="user-icon">
                    <img class="user-img" src="../<?php echo $row_locked_user['UserAva'];?>" alt="">
                </div>
                <div class="txt">
                    <b><?php echo $row_locked_user['UserName'];?></b>
                </div>
                <div class="txt ms-auto txt-lock">
                    <b>Reported:
                        <p style="color: red;"><?php echo $row_locked_user['Reported'];?></p>
                    </b>
                    <b>Thời gian bị khóa:
                        <p style="color: red;"><?php echo $row_locked_user['Time'];?></p>
                    </b>
                </div>
            </div>
            <div class="lock-option content">
                <a class="ban-item text-decoration-none link-dark"
                href="controllers/process_unlock_user.php?UserID= <?php echo $row_locked_user['UserID'];?>">
                    <span class="material-icons-outlined">
                        lock_open
                    </span>
                    <b>Mở khóa tài khoản</b>
                </a>
            </div>
            <hr style="margin: 0px">
        </div>
<?php
        }
    }
?>
    </div>
        </main>
<!--Thư viện Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/admin.js"></script>
</body>
</html>
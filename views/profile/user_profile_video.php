
<?php
include "template/header.php";
include "src/connectDB.php";

$queryProfile = "SELECT * from user_profile where UserID='$UserID'";
$result_ava = mysqli_query($conn, $queryProfile);
if (mysqli_num_rows($result_ava) > 0) {
    $row_ava = mysqli_fetch_assoc($result_ava);
}
?>

<main>
    <!-- Section: white bgg -->
    <section class="bg-white mb-4 shadow-2">
        <div class="container">
            <!-- Section: imagess -->
            <section class="mb-10">
                <!-- Background imagee -->
                <div class="p-5 text-center bg-image shadow-1-strong rounded-bottom" style="
                background-image: url('assets/images_dev/sky.jpg');
                height: 400px;
              " onclick="clickImg('assets/images_dev/sky.jpg')"></div>
                <div class="d-flex justify-content-center">
                    <img src=" <?php echo $row_ava['UserAva'] ?>" alt="" class="
                  rounded-circle
                  shadow-3-strong
                  position-absolute
                  border border-white
                " id="avatarImg" style="width: 180px;height:180px; margin-top: -60px" onclick="clickImg('<?php echo $row_ava['UserAva'] ?>')" />
                </div>
                <!-- Background imagee -->
            </section>`
            <!-- Section: imagess -->

            <!-- Section: user dataa -->
            <section class="text-center border-bottom">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <h2><strong> <?php echo $row_ava['UserFirstName'] . " " . $row_ava['UserLastName'] ?> </strong></h2>
                        <p class="text-muted">
                            <?php echo $row_ava['Description'] ?>
                        </p>
                    </div>
                </div>
            </section>

            <!-- Section buttonss -->
            <section class="py-2 d-flex justify-content-between">
                <!-- leftt -->
                <div>
                    <button type="button" class="btn btn-link text-reset" datadata-ripple-color="dark" onclick="document.location.href='user_profile.php'">
                        Bài viết
                    </button>
                    <button type="button" class="btn btn-link text-reset" datadata-ripple-color="dark" onclick="document.location.href='user_profile_gioithieu.php'">
                        Giới thiệu
                    </button>
                    <button type="button" class="btn btn-link text-reset" datadata-ripple-color="dark" onclick="document.location.href='user_profile_myFriend.php'">
                        Bạn bè
                    </button>
                    <button type="button" class="btn btn-link text-reset" datadata-ripple-color="dark" onclick="document.location.href='user_profile_image.php'">
                        Ảnh
                    </button>
                    <button type="button" class="btn btn-link bg-light" datadata-ripple-color="dark" onclick="document.location.href='user_profile_video.php'">
                        Video
                    </button>
                    <div class="dropdown d-inline-block">
                        <button class="btn btn-link dropdown-toggle text-reset" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                            Xem thêm
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#">Thể thao</a></li>
                            <li><a class="dropdown-item" href="#">Âm nhạc</a></li>
                            <li><a class="dropdown-item" href="#">Giải trí</a></li>
                        </ul>
                    </div>
                </div>
                <!-- leftt -->
                <!-- rightt -->
                <div>
                    <button type="button" class="btn btn-light bg-light mr-2" data-mdb-ripple-color="dark">
                        <i class="far fa-edit me-2"></i>Chỉnh sửa trang cá nhân
                    </button>
                    <button type="button" class="btn btn-light bg-light mr-2" data-mdb-ripple-color="dark">
                        <i class="fas fa-search me-2"></i>Tìm kiếm
                    </button>
                </div>
                <!-- rightt -->
            </section>
            <!-- Section buttonss -->
        </div>
    </section>
    <!-- Section: white bgg -->

    <!-- videos  -->
    <div class="container mb-3">
        <div class="bg-white mb-5 shadow-2 rounded">
            <h2 class="pt-3" style="padding-left: 3rem"><strong>Video</strong></h2>
            <div class="row">
                <div class="col-md-2">
                </div>

                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-3">
                            <video width="200" height="150" controls>
                                <source src="assets/video/video1.mp4" type="video/mp4">
                            </video>
                        </div>
                        <div class="col-md-3">
                            <video width="200" height="150" controls>
                                <source src="assets/video/video2.mp4" type="video/mp4">
                            </video>
                        </div>
                        <div class="col-md-3">
                            <video width="200" height="150" controls>
                                <source src="assets/video/video3.mp4" type="video/mp4">
                            </video>
                        </div>
                        <div class="col-md-3">
                            <video width="200" height="150" controls>
                                <source src="assets/video/video4.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-3">
                            <video width="200" height="150" controls>
                                <source src="assets/video/video1.mp4" type="video/mp4">
                            </video>
                        </div>
                        <div class="col-md-3">
                            <video width="200" height="150" controls>
                                <source src="assets/video/video2.mp4" type="video/mp4">
                            </video>
                        </div>
                        <div class="col-md-3">
                            <video width="200" height="150" controls>
                                <source src="assets/video/video3.mp4" type="video/mp4">
                            </video>
                        </div>
                        <div class="col-md-3">
                            <video width="200" height="150" controls>
                                <source src="assets/video/video4.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-3">
                            <video width="200" height="150" controls>
                                <source src="assets/video/video1.mp4" type="video/mp4">
                            </video>
                        </div>
                        <div class="col-md-3">
                            <video width="200" height="150" controls>
                                <source src="assets/video/video2.mp4" type="video/mp4">
                            </video>
                        </div>
                        <div class="col-md-3">
                            <video width="200" height="150" controls>
                                <source src="assets/video/video3.mp4" type="video/mp4">
                            </video>
                        </div>
                        <div class="col-md-3">
                            <video width="200" height="150" controls>
                                <source src="assets/video/video4.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-3">
                            <video width="200" height="150" controls>
                                <source src="assets/video/video1.mp4" type="video/mp4">
                            </video>
                        </div>
                        <div class="col-md-3">
                            <video width="200" height="150" controls>
                                <source src="assets/video/video2.mp4" type="video/mp4">
                            </video>
                        </div>
                        <div class="col-md-3">
                            <video width="200" height="150" controls>
                                <source src="assets/video/video3.mp4" type="video/mp4">
                            </video>
                        </div>
                        <div class="col-md-3">
                            <video width="200" height="150" controls>
                                <source src="assets/video/video4.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-3">
                            <video width="200" height="150" controls>
                                <source src="assets/video/video1.mp4" type="video/mp4">
                            </video>
                        </div>
                        <div class="col-md-3">
                            <video width="200" height="150" controls>
                                <source src="assets/video/video2.mp4" type="video/mp4">
                            </video>
                        </div>
                        <div class="col-md-3">
                            <video width="200" height="150" controls>
                                <source src="assets/video/video3.mp4" type="video/mp4">
                            </video>
                        </div>
                        <div class="col-md-3">
                            <video width="200" height="150" controls>
                                <source src="assets/video/video4.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                    <br>
                    
                </div>
                <div class="col-md-2">
                </div>
            </div>
        </div>
    </div>
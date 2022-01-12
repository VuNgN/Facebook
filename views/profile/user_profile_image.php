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
      </section>
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
          <button type="button" class="btn btn-link bg-light" datadata-ripple-color="dark" onclick="document.location.href='user_profile_image.php'">
            Ảnh
          </button>
          <button type="button" class="btn btn-link text-reset" datadata-ripple-color="dark" onclick="document.location.href='user_profile_video.php'">
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

  <!-- ảnhh  -->
  <div class="container mb-3">
    <div class="bg-white mb-5 shadow-2 rounded">
      <h2 class="pt-3" style="padding-left: 3rem"><strong>Ảnh</strong></h2>
      <div class="row">
        <div class="col-md-2">
        </div>
        <!-- main imgaess -->
        <div class="col-md-8">

          <?php
          // tat ca thông tin của user r
          $sql = "SELECT * from post, user_profile WHERE post.UserID = user_profile.UserID AND user_profile.UserID = " . $UserID . " GROUP BY post.PostID ORDER BY post.PostID DESC";
          $result_news = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result_news) > 0) {
            $row_news = mysqli_fetch_assoc($result_news); // biến row_newss
          }

          $sql_images_user = "SELECT * from images, post where images.PostID = post.PostID and post.UserID= " . $UserID .  ";";
          $result_images_user = mysqli_query($conn, $sql_images_user);
          if (mysqli_num_rows($result_images_user) > 0) {
            $count = 0;
            while ($row_img_content = mysqli_fetch_assoc($result_images_user)) {
              global $row_img_content;
              if ($count % 4 == 0) { //open
                echo '<div class="row">';
              }
          ?>
              <div class="col-md-3">
                <img alt="Bootstrap Image Preview" src=" <?php echo $row_img_content['images']; ?>" style="width: 200px; height: 150px;" />
              </div>
          <?php
              if ($count % 4 == 3 ||  $count == mysqli_num_rows($result_images_user) - 1) {
                echo '</div>'; // đóng của if div roww ????
              }
              $count++;
            }
          }

          ?>
          <br>
        </div>
        <!-- main imgaess -->
        <div class="col-md-2">
        </div>
      </div>
    </div>
  </div>
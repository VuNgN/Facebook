<?php
  include "template/header.php";
  $UserIDFriend = $_GET['UserIDFriend'];
  include "src/connectDB.php";

  $queryProfile = "SELECT * from user_profile where UserID=?";
  $stmt = mysqli_prepare($conn, $queryProfile);
  mysqli_stmt_bind_param($stmt, "s", $UserIDFriend);
  if(mysqli_stmt_execute($stmt)) {
      mysqli_stmt_bind_result($stmt, $UserId, $UserEmail, $UserPass, $UserGender, $UserFirstName, $UserLastName, $UserBirth, $UserAddress, $UserAva, $Reported, $Description, $VerifyLink, $Active, $VerifyDate, $LockTime);
      mysqli_stmt_fetch($stmt);
      // if (mysqli_stmt_fetch($stmt)){
      //     if(password_verify($pass, $UserPass)){
      //         $_SESSION['isLoginOk'] = $UserId;
      //         mysqli_close($conn);
      //         header("Location: ../../");
      //     } else {
      //       echo 'Du lieu khong khop';
      //       mysqli_close($conn);
      //     }
      // } else {
      //     echo 'Du lieu khong khop';
      //     mysqli_close($conn);
      // }
  } else {
      mysqli_close($conn);
      echo 'khong co du lieu';
  }    
?>
<main>
  <!-- Section: white bg -->
  <section class="bg-white mb-4 shadow-2">
    <div class="container">
      <!-- Section: images -->
      <section class="mb-10">
        <!-- Background image -->
        <div class="p-5 text-center bg-image shadow-1-strong rounded-bottom" style="
                background-image: url('assets/images_dev/sky.jpg');
                height: 400px;
              " onclick="clickImg('assets/images_dev/sky.jpg')"></div>

        <div class="d-flex justify-content-center">
          <img src=<?php echo "'".$UserAva."'" ?> alt="" class="
                  rounded-circle
                  shadow-3-strong
                  position-absolute
                  border border-white
                " id="avatarImg" style="width: 180px;height:180px; margin-top: -60px" onclick="clickImg('<?php echo $UserAva ?>')" />
        </div>
        <!-- Background image -->
      </section>
      <!-- Section: images -->

      <!-- Section: user data -->
      <section class="text-center border-bottom">
        <div class="row d-flex justify-content-center">
          <div class="col-md-6">
            <h2><strong><?php echo $UserFirstName.$UserLastName ?></strong></h2>
            <p class="text-muted">
              <?php echo $Description ?>
            </p>
          </div>
        </div>
      </section>
      <!-- Section: user data -->

      <!-- Section buttons -->
      <section class="py-2 d-flex justify-content-between">
        <!-- left -->
        <div>
          <button type="button" class="btn btn-link bg-light" datadata-ripple-color="dark">
            Bài viết
          </button>
          <button type="button" class="btn btn-link text-reset" datadata-ripple-color="dark">
            Giới thiệu
          </button>
          <button type="button" class="btn btn-link text-reset" datadata-ripple-color="dark">
            Bạn bè
          </button>
          <button type="button" class="btn btn-link text-reset" datadata-ripple-color="dark">
            Ảnh
          </button>
          <button type="button" class="btn btn-link text-reset" datadata-ripple-color="dark">
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
        <!-- left -->

        <!-- right -->
        <div style="display: flex">
          <?php
            require "src/connectDB.php";
            $sql_my_send  = "select * from friend_ship where (User1ID='".$UserID."' and User2ID='".$UserId."')";
            $sql_other_people_send = "select * from friend_ship where (User1ID='".$UserId."' and User2ID='".$UserID."')";
            $result_my_send = mysqli_query($conn, $sql_my_send);
            $result_other_people_send = mysqli_query($conn, $sql_other_people_send);
            if (mysqli_num_rows($result_my_send) > 0 && mysqli_num_rows($result_other_people_send) <= 0) {
              if (mysqli_fetch_assoc($result_my_send)['Active'] == 1) {
                echo "
                  <form class='mr-2' method='post' action='src/friend/process_friend.php'>
                    <button name='removeFriend' type='submit' value='".$UserId."' class='btn bg-light mr-2 hover_link' data-mdb-ripple-color='dark'>
                      <i class='fas fa-user-times'></i> Xóa bạn bè
                    </button>
                  </form>";
              } else {
                echo "
                  <form class='mr-2' method='post' action='src/friend/process_friend.php'>
                    <button name='cancelFriend' type='submit' value='".$UserId."' class='btn bg-light mr-2 hover_link' data-mdb-ripple-color='dark'>
                      <i class='fas fa-user-slash'></i> Hủy kết bạn
                    </button>
                  </form>";
              }
              
            } 
            else if (mysqli_num_rows($result_my_send) <= 0 && mysqli_num_rows($result_other_people_send) > 0) {
                if (mysqli_fetch_assoc($result_other_people_send)['Active'] == 0) {
                echo "
                <form class='mr-2' method='post' action='src/friend/process_friend.php'>
                  <button name='acceptFriend' type='submit' value='".$UserId."' class='btn bg-light mr-2 hover_link' data-mdb-ripple-color='dark'>
                    <i class='fas fa-user-check'></i> Đồng ý kết bạn
                  </button>
                  <button name='cancelFriend' type='submit' value='".$UserId."' class='btn bg-light mr-2 hover_link' data-mdb-ripple-color='dark'>
                    <i class='fas fa-user-times'></i> Hủy kết bạn
                  </button>
                </form>";
                }
                else {
                echo "
                  <form class='mr-2' method='post' action='src/friend/process_friend.php'>
                    <button name='removeFriend' type='submit' value='".$UserId."' class='btn bg-light mr-2 hover_link' data-mdb-ripple-color='dark'>
                      <i class='fas fa-user-times'></i> Xóa bạn bè
                    </button>
                  </form>";
                }
            }
            else {
              echo "
                <form class='mr-2' method='post' action='src/friend/process_friend.php'>
                  <button name='addFriend' type='submit' value='".$UserId."' class='btn bg-light mr-2 hover_link' data-mdb-ripple-color='dark'>
                    <i class='fas fa-user-plus'></i> Kết bạn
                  </button>
                </form>";
            }
          ?>
          <button type="button" class="btn btn-light bg-light mr-2" data-mdb-ripple-color="dark">
            <i class="fab fa-facebook-messenger"></i> Nhắn tin
          </button>
        </div>
        <!-- right -->
      </section>
      <!-- Section buttons -->
    </div>
  </section>
  <!-- Section: white bg -->

  <!-- Section grey bg -->
  <section>
    <div class="container">
      <div class="row">
        <!-- left -->
        <div class="col-md-5 mb-4 mb-md-0">
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title mt"><strong>Giới thiệu</strong></h5>
              <button type="button" class="btn mt-3 btn-light bg-light btn-block">
                <strong> Thêm tiểu sử</strong>
              </button>
              <ul class="list-unstyled text-muted mt-3">
                <li>
                  <i class="fas fa-house-damage me-2 mt-3"></i>Sống tại
                  <a href="https://vi.wikipedia.org/wiki/H%C3%A0_N%E1%BB%99i"><strong>Hà Nội</strong></a>
                </li>
                <li>
                  <i class="fas fa-map-marker-alt me-2 mt-3"></i>Đến từ
                  <a href="https://vi.wikipedia.org/wiki/H%C3%A0_N%E1%BB%99i"><strong>Hà Nội</strong></a>
                </li>
                <li>
                  <i class="fab fa-github me-2 mt-3"></i><a href="https://github.com/vantranthao">https://github.com/vantranthao</a>
                </li>
                <li>
                  <i class="fas fa-school me-2 mt-3"></i><a href="http://c3chuongmya.edu.vn/">THPT Chương Mỹ A</a>
                </li>
              </ul>

              <button type="button" class="btn btn-light bg-light btn-block mt-3">
                <strong> Chỉnh sửa chi tiết</strong>
              </button>
              <button type="button" class="btn btn-light bg-light btn-block mt-3">
                <strong>Thêm sở thích</strong>
              </button>

              <div class="lightbox mt-4">
                <div class="row gx-2">
                  <div class="col-lg-4 mb-3">
                    <img src="assets/images_dev/aot_01.jpg" alt="" class="w-100 shadow-1-strong rounded" />
                  </div>
                  <div class="col-lg-4 mb-3">
                    <img src="assets/images_dev/aot_02.jpg" alt="" class="w-100 shadow-1-strong rounded" />
                  </div>
                  <div class="col-lg-4 mb-3">
                    <img src="assets/images_dev/aot_03.jpg" alt="" class="w-100 shadow-1-strong rounded" />
                  </div>

                  <div class="col-lg-4 mb-3">
                    <img src="assets/images_dev/aot_02.jpg" alt="" class="w-100 shadow-1-strong rounded" />
                  </div>
                  <div class="col-lg-4 mb-3">
                    <img src="assets/images_dev/aot_03.jpg" alt="" class="w-100 shadow-1-strong rounded" />
                  </div>
                  <div class="col-lg-4 mb-3">
                    <img src="assets/images_dev/aot_01.jpg" alt="" class="w-100 shadow-1-strong rounded" />
                  </div>
                </div>
              </div>

              <button type="button" class="btn btn-light bg-light btn-block">
                <strong>Chỉnh sửa</strong>
              </button>
            </div>
          </div>
          <!-- ảnh feature -->
          <div class="card mb-3">
            <div class="card-body">
              <a href="" class="text-reset d-inline-block">
                <h5 class="card-title mt"><strong>Ảnh</strong></h5>
              </a>
              <a href="" class="btn btn-link d-inline-block py-1 px-3" style="float: right">Xem tất cả ảnh</a>
              <div class="lightbox mt-4">
                <div class="row gx-2">
                  <div class="col-lg-4 mb-3">
                    <img src="assets/images_dev/aot_01.jpg" alt="" class="w-100 h-100 shadow-1-strong rounded" />
                  </div>
                  <div class="col-lg-4 mb-3">
                    <img src="assets/images_dev/aot_02.jpg" alt="" class="w-100 h-100 shadow-1-strong rounded" />
                  </div>
                  <div class="col-lg-4 mb-3">
                    <img src="assets/images_dev/aot_03.jpg" alt="" class="w-100 h-100 shadow-1-strong rounded" />
                  </div>

                  <div class="col-lg-4 mb-3">
                    <img src="assets/images_dev/aot_02.jpg" alt="" class="w-100 h-100 shadow-1-strong rounded" />
                  </div>
                  <div class="col-lg-4 mb-3">
                    <img src="assets/images_dev/aot_03.jpg" alt="" class="w-100 h-100 shadow-1-strong rounded" />
                  </div>
                  <div class="col-lg-4 mb-3">
                    <img src="assets/images_dev/aot_01.jpg" alt="" class="w-100 h-100 shadow-1-strong rounded" />
                  </div>

                  <div class="col-lg-4 mb-3">
                    <img src="assets/images_dev/aot_01.jpg" alt="" class="w-100 h-100 shadow-1-strong rounded" />
                  </div>
                  <div class="col-lg-4 mb-3">
                    <img src="assets/images_dev/aot_02.jpg" alt="" class="w-100 h-100 shadow-1-strong rounded" />
                  </div>
                  <div class="col-lg-4 mb-3">
                    <img src="assets/images_dev/aot_03.jpg" alt="" class="w-100 h-100 shadow-1-strong rounded" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ảnh feature -->
          <!-- friends -->
          <div class="card mb-3">
            <div class="card-body">
              <div class="card_left d-inline-block">
                <a href="" class="text-reset">
                  <h5 class="card-title mt"><strong>Bạn bè</strong></h5>
                </a>
                <p class="friend_numbers">1420 người bạn</p>
              </div>
              <div class="card_right d-inline-block" style="float: right">
                <a href="" class="btn btn-link py-1 px-3">Xem tất cả bạn bè</a>
              </div>

              <div class="row gx-2">
                <div class="col-lg-4 text-center mb-4">
                  <img src="assets/images_dev/ava1.jpg" alt="" class="w-100 h-100 shadow-1-strong rounded" />
                  <p><small>Kelly Hel</small></p>
                </div>
                <div class="col-lg-4 text-center mb-4">
                  <img src="assets/images_dev/ava1.jpg" alt="" class="w-100 h-100 shadow-1-strong rounded" />
                  <p><small>Kelly Hel</small></p>
                </div>
                <div class="col-lg-4 text-center mb-4">
                  <img src="assets/images_dev/ava1.jpg" alt="" class="w-100 h-100 shadow-1-strong rounded" />
                  <p><small>Kelly Hel</small></p>
                </div>

                <div class="col-lg-4 text-center mb-4">
                  <img src="assets/images_dev/ava1.jpg" alt="" class="w-100 h-100 shadow-1-strong rounded" />
                  <p><small>Kelly Hel</small></p>
                </div>
                <div class="col-lg-4 text-center mb-4">
                  <img src="assets/images_dev/ava1.jpg" alt="" class="w-100 h-100 shadow-1-strong rounded" />
                  <p><small>Kelly Hel</small></p>
                </div>
                <div class="col-lg-4 text-center mb-4">
                  <img src="assets/images_dev/ava1.jpg" alt="" class="w-100 h-100 shadow-1-strong rounded" />
                  <p><small>Kelly Hel</small></p>
                </div>

                <div class="col-lg-4 text-center mb-4">
                  <img src="assets/images_dev/ava1.jpg" alt="" class="w-100 h-100 shadow-1-strong rounded" />
                  <p><small>Kelly Hel</small></p>
                </div>
                <div class="col-lg-4 text-center mb-4">
                  <img src="assets/images_dev/ava1.jpg" alt="" class="w-100 h-100 shadow-1-strong rounded" />
                  <p><small>Kelly Hel</small></p>
                </div>
                <div class="col-lg-4 text-center mb-4">
                  <img src="assets/images_dev/ava1.jpg" alt="" class="w-100 h-100 shadow-1-strong rounded" />
                  <p><small>Kelly Hel</small></p>
                </div>
              </div>
            </div>
          </div>
          <!-- friends -->
          <!-- footer -->
          <?php
          include "template/footer_link.php"
          ?>
          <!-- footer -->
        </div>
        <!-- left -->

        <!-- right -->
        <div class="col-md-7 mb-4 mb-md-0">
          <!-- Modal -->
          <div class="modal fade" id="buttonModalUserPost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">
                    <strong>Tạo bài viết</strong>
                  </h5>
                  <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">...</div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                    Close
                  </button>
                  <button type="button" class="btn btn-primary">
                    Save changes
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div class="card mb-4">
            <div class="card-body">
              <div class="d-flex">
                <a style="margin-right: 0.5rem;" href=""><img src="assets/images_dev/totoro.webp" alt="" style="height: 40px; margin-right: 8px" class="rounded-circle border" /></a>
                <button class="btn btn-light btn-block btn-rounded bg-light" data-mdb-toggle="modal" data-mdb-target="#buttonModalUserPost">
                  Bạn đang nghĩ gì?
                </button>
              </div>
              <hr>
              <div class="d-flex justify-content-between">
                <button class="btn btn-link btn-lg"><i class="fas fa-video"></i> Video trực tiếp</button>
                <button class="btn btn-link btn-lg"><i class="fas fa-images"></i> Ảnh/Video</button>
                <button class="btn btn-link btn-lg"><i class="far fa-grin-wink"></i> Cảm xúc</button>
              </div>
            </div>
          </div>

          <div class="card text-start|center|end">
            <div class="card-body">
              <div class="d-flex mb-2">
                <a href=""><img src="assets/images_dev/totoro.webp" alt="" style="height: 40px; margin-right: 8px" class="rounded-circle border" /></a>
                <div>
                  <a href="" class="text-dark mb-0"><strong>ThaoVan</strong></a>
                  <a href="" class="text-muted d-block" style="margin-top: -6px;"><small>10h</small></a>
                </div>
              </div>

              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni fuga unde eius ea suscipit numquam exercitationem possimus nostrum ex adipisci dicta quidem et optio quas deserunt non ipsum assumenda, expedita iure dolor qui tenetur. Recusandae omnis, optio blanditiis sunt vel dolore cupiditate veritatis corporis, cum consectetur molestias suscipit, officia perspiciatis?</p>

            </div>
            <a href="">
              <img src="assets/images_dev/anh.jpg" class="w-100" alt="">
            </a>
            
            <div class="action-comment">
              <div class="action-comment-above">
                <div class="action-index">
                  <span class="material-icons-round">
                    emoji_emotions
                  </span>
                </div>
                <div class="comment-index">
                  <div class="comment-index-item" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                    100 bình luận
                  </div>
                  <div class="share-index-item">
                    100 lượt chia sẻ
                  </div>
                </div>
              </div>
              <div class="action-comment-under">
                <div class="action-comment-under-item">
                  <div class="action-icon">
                    <span class="material-icons-outlined like-icon">
                      thumb_up
                    </span>
                  </div>
                  <div class="action-name">
                    <h6>Thích</h6>
                  </div>
                </div>
                <div class="action-comment-under-item">
                  <div class="action-icon">
                    <span class="material-icons-outlined comment-icon">
                      chat_bubble_outline
                    </span>
                  </div>
                  <div class="action-name" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                    <h6>Bình luận</h6>
                  </div>
                </div>
                <div class="action-comment-under-item">
                  <div class="action-icon">
                    <i class="far fa-share-square share-icon"></i>
                  </div>
                  <div class="action-name">
                    <h6>Chia sẻ</h6>
                  </div>
                </div>
              </div>
            </div>
            <!--COMMENT INPUT-->
            <div class="row">
              <div class="col-md-12 comment-input-form">
                <a class="icon" href="userProfile.html">
                  <img class="user-img" src="assets/images_dev/totoro.webp" alt="">
                </a>
                <div class="comment-input">
                  <input type="text" placeholder=" Viết bình luận" class="form-control">
                </div>
              </div>
            </div>


          </div>
        </div>
        <!-- right -->
      </div>
    </div>
  </section>
  <!-- Section grey bg -->
</main>

<script type="text/javascript" src="assets/js_mdb/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript"></script>
</body>

</html>
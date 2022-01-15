<?php
$UserIDFriend = $_GET['UserIDFriend'];
foreach ($friendInfo as $frdInfo) {
?>
  <main>
    <!-- Section: white bg -->
    <section class="bg-white mb-4 shadow-2">
      <div class="container">
        <!-- Section: images -->
        <section class="mb-10">
          <!-- Background image -->
          <div class="p-5 text-center bg-image shadow-1-strong rounded-bottom" style="
                background-image: url('assets/images/sky.jpg');
                height: 250px;
              " onclick="clickImg('assets/images/sky.jpg')"></div>

          <div class="d-flex justify-content-center">
            <img src=<?php echo "'" . $frdInfo['UserAva'] . "'" ?> alt="" class="
                  rounded-circle
                  shadow-3-strong
                  position-absolute
                  border border-white
                " id="avatarImg" style="width: 180px;height:180px; margin-top: -60px" onclick="clickImg('<?php echo $frdInfo['UserAva'] ?>')" />
          </div>
          <!-- Background image -->
        </section>
        <!-- Section: images -->

        <!-- Section: user data -->
        <section class="text-center border-bottom">
          <div class="row d-flex justify-content-center">
            <div class="col-md-6">
              <h2><strong><?php echo $frdInfo['UserFirstName'] . $frdInfo['UserLastName'] ?></strong></h2>
              <p class="text-muted">
                <?php echo $frdInfo['Description'] ?>
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
                <li><a class="dropdown-item" href="https://www.youtube.com/channel/UCEgdi0XIXXZ-qJOFPf4JSKw" target="_blank">Thể thao</a></li>
                <li><a class="dropdown-item" href="https://www.youtube.com/channel/UC-9-kyTW8ZkZNDHQJ6FgpwQ" target="_blank">Âm nhạc</a></li>
                <li><a class="dropdown-item" href="https://www.youtube.com/feed/trending?bp=6gQJRkVleHBsb3Jl" target="_blank">Giải trí</a></li>
              </ul>
            </div>
          </div>
          <!-- left -->

          <!-- right -->
          <div style="display: flex">
            <?php
            if ($isMySendFriend && !$isOtherSendFriend) {
              foreach ($isMySendFriend as $mysendF) {
                if ($mysendF['Active'] == 1) {
                  echo "
                  <form class='mr-2' method='post' action='index.php?controller=profile&action=processFriend'>
                    <button name='removeFriend' type='submit' value='" . $frdInfo['UserID'] . "' class='btn bg-light mr-2 hover_link' data-mdb-ripple-color='dark'>
                      <i class='fas fa-user-times'></i> Xóa bạn bè
                    </button>
                  </form>";
                } else {
                  echo "
                  <form class='mr-2' method='post' action='index.php?controller=profile&action=processFriend'>
                    <button name='cancelFriend' type='submit' value='" . $frdInfo['UserID'] . "' class='btn bg-light mr-2 hover_link' data-mdb-ripple-color='dark'>
                      <i class='fas fa-user-slash'></i> Hủy kết bạn
                    </button>
                  </form>";
                }
              }
            } else if (!$isMySendFriend && $isOtherSendFriend) {
              foreach ($isOtherSendFriend as $othersendF) {
                if ($othersendF['Active'] == 0) {
                  echo "
                <form class='mr-2' method='post' action='index.php?controller=profile&action=processFriend'>
                  <button name='acceptFriend' type='submit' value='" . $frdInfo['UserID'] . "' class='btn bg-light mr-2 hover_link' data-mdb-ripple-color='dark'>
                    <i class='fas fa-user-check'></i> Đồng ý kết bạn
                  </button>
                  <button name='cancelFriend' type='submit' value='" . $frdInfo['UserID'] . "' class='btn bg-light mr-2 hover_link' data-mdb-ripple-color='dark'>
                    <i class='fas fa-user-times'></i> Hủy kết bạn
                  </button>
                </form>";
                } else {
                  echo "
                  <form class='mr-2' method='post' action='index.php?controller=profile&action=processFriend'>
                    <button name='removeFriend' type='submit' value='" . $frdInfo['UserID'] . "' class='btn bg-light mr-2 hover_link' data-mdb-ripple-color='dark'>
                      <i class='fas fa-user-times'></i> Xóa bạn bè
                    </button>
                  </form>";
                }
              }
            } else {
              echo "
                <form class='mr-2' method='post' action='index.php?controller=profile&action=processFriend'>
                  <button name='addFriend' type='submit' value='" . $frdInfo['UserID'] . "' class='btn bg-light mr-2 hover_link' data-mdb-ripple-color='dark'>
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
                <ul class="list-unstyled text-muted mt-3">
                  <li>
                    <i class="fas fa-house-damage me-2 mt-3"></i>Sống tại
                    <a href="https://vi.wikipedia.org/wiki/H%C3%A0_N%E1%BB%99i"><strong><?php echo $frdInfo['UserAddress'] ?></strong></a>
                  </li>
                  <li>
                    <i class="fas fa-map-marker-alt me-2 mt-3"></i>Đến từ
                    <a href="https://vi.wikipedia.org/wiki/H%C3%A0_N%E1%BB%99i"><strong><?php echo $frdInfo['UserAddress'] ?></strong></a>
                  </li>
                  <li>
                    <i class="fab fa-github me-2 mt-3"></i><a href="https://github.com/vantranthao">https://github.com/VuNgN/facebook</a>
                  </li>
                </ul>
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
              </div>
            </div>
            <!-- ảnh feature -->
            <div class="card mb-3">
              <div class="card-body">
                <a href="" class="text-reset d-inline-block">
                  <h5 class="card-title mt"><strong>Ảnh</strong></h5>
                </a>
                <a href="" class="btn btn-link d-inline-block py-1 px-3" style="float: right">Xem tất cả ảnh</a>
                <?php
            $count = 0;
            if ($profileImg)
              foreach ($profileImg as $row_img) {
                // global $row_img;
                if ($count % 3 == 0) {
                  echo '<div class="row gx-2">'; // open
                }
            ?>
              <div class="col-lg-4 mb-3">
                <a href="<?php echo $row_img['images'] ?>" target="_blank">
                  <img src="<?php echo $row_img['images'] ?>" alt="" onclick="clickImg('<?php echo $row_img['images'] ?>')" class="w-100 shadow-1-strong rounded" style="height: 100px;" />
                </a>
              </div>
            <?php
                if ($count % 3 == 2 || $count == count($profileImg) - 1) {
                  echo '</div>'; // close
                }
                $count++;
              }
            ?>
              </div>
            </div>
            <!-- ảnh feature -->
            <!-- friends -->
            <div class="card mb-3">
              <div class="card-body">
                <?php
                  $count = 0;
                  $countFriend = 0;
                  if ($profileFriend)
                    foreach ($profileFriend as $rowFriends) {
                      $countFriend += $rowFriends["countFriend"]; 
                    }
                    ?>
                    <div class='card_left d-inline-block'>
                      <a href='' class='text-reset'>
                        <h5 class='card-title mt'><strong>Bạn bè</strong></h5>
                      </a>
                      <p class='friend_numbers'><?php echo $countFriend ?> người bạn</p>
                    </div>
                    <div class='card_right d-inline-block' style='float: right'>
                      <a href='' class='btn btn-link py-1 px-3'>Xem tất cả bạn bè</a>
                    </div>
                    <?php
                    foreach ($profileFriend as $rowFriends) {
                      if ($count % 3 == 0) {
                        echo '<div class="row">';
                      }
                      echo '<div class="col-md-4 text-center">';
                      echo '<img src="' . $rowFriends['UserAva'] . '" alt="" class="shadow-1-strong rounded" style="width: 75px; height: 75px;"/>';
                      echo '<p><small>' . $rowFriends['UserFirstName'] . " " . $rowFriends['UserLastName'] . '</small></p>';
                      echo '</div>';
                      if ($count % 3 == 2 ||  $count == count($profileFriend) - 1) {
                        echo '</div>';
                      }
                      $count++;
                    }
                  ?>
              </div>
            </div>
            <!-- friends -->
            <!-- footer -->
            <?php
            include "views/templates/footer_link.php"
            ?>
            <!-- footer -->
          </div>
          <!-- rightt -->
        <div class="col-md-7 mb-4 mb-md-0">
          <!--THINKING POSTT-->
          <!--Newss-->
          <?php
          //TRUY VẤN POST, POST_USERR
          if ($profilePost)
            foreach ($profilePost as $row_news) {
          ?>
            <div class="news <?php echo $row_news['PostID']?>">
                <div class="row">
                    <div class="heading">
                        <a class="user-ava" href="index.php?controller=profile&action=getFriendInfo&UserIDFriend=<?php echo $row_news['UserID']; ?>">
                            <img class="user-img" src="<?php echo ($row_news['UserAva']); ?>" alt="">
                        </a>
                        <div class="user-name-time">
                            <a href="index.php?controller=profile&action=getFriendInfo&UserIDFriend=<?php echo $row_news['UserID']; ?>" class="user-name text-decoration-none link-dark">
                                <b><?php echo $row_news['UserFirstName'] . " " . $row_news['UserLastName'] ?></b>
                            </a>
                            <h6 class="time">
                                <?php echo $row_news['PostTime'] ?>
                            </h6>
                        </div>
                        <div class="option ms-auto">
                            <div class="option-icon collapsibleOption">
                                <span class="material-icons-outlined" style="position: absolute;">
                                    more_horiz
                                </span>
                            </div>
                            <div class="collapse contentOption">
                                <div class="option-item">
                                    <div class="col-md-12 items">
                                        <span class="material-icons-outlined">history</span>
                                        <b>Xem lịch sử chỉnh sửa</b>
                                    </div>
                                    <div class="col-md-12 items">
                                        <span class="material-icons-outlined">bookmarks</span>
                                        <b>Lưu bài viết</b>
                                    </div>
                                    <a class="col-md-12 items link-dark" href="src/process_report.php?PostID=<?php echo $row_news['PostID']; ?>
                                        &&PostUserID=<?php echo $row_news['UserID']; ?>">
                                        <span class="material-icons-outlined">report</span>
                                        <b>Báo cáo bài viết</b>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="news-content">
                        <div class="content-caption">
                            <?php echo $row_news['PostCaption'] ?>
                        </div>
                        <div class="content-images">
                            <?php
                            if($Profile->getImgPost($row_news['PostID'])) 
                            foreach ($Profile->getImgPost($row_news['PostID']) as $row_img_content) {
                            ?>
                                <img src="<?php echo $row_img_content['images']; ?>" alt="" onclick="clickImg('<?php echo $row_img_content['images']; ?>')">
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="action-comment">
                        <div class="action-comment-above">
                            <div class="action-index">
                                <span class="material-icons-round">
                                    emoji_emotions
                                </span>
                            </div>
                            <!-- //ĐẾM LƯỢT BÌNH LUÂN -->
                            <div class="comment-index">

                                <?php
                                foreach ($Profile->countComment($row_news['PostID']) as $comment) {
                                ?>
                                    <div class="comment-index-item" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                                        <?php echo $comment['count(CommentID)']; ?> bình luận
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="share-index-item">
                                    100 lượt chia sẻ
                                </div>
                            </div>
                        </div>
                        <div class="action-comment-under">
                            <div class="action-comment-under-item">
                            <?php
                            if ($Profile->getLikeModel($row_news['PostID'])) {

                            ?>
                                <a class="action-comment-under-item text-decoration-none" href="index.php?controller=profile&action=likeProcess&PostID=<?php echo $row_news['PostID'] ?>&UserID=<?php echo $row_news['UserID'] ?>" style="">
                                    <div class="action-icon">
                                        <span class="material-icons">
                                            thumb_up
                                        </span>

                                    </div>
                                    <div class="action-name">
                                        <h6>Thích</h6>
                                    </div>
                                </a>
                            <?php } else {

                            ?>
                                <a class="action-comment-under-item text-decoration-none text-muted" href="index.php?controller=profile&action=likeProcess&PostID=<?php echo $row_news['PostID'] ?>&UserID=<?php echo $row_news['UserID'] ?>" style="">
                                    <div class="action-icon">
                                        <span class="material-icons">
                                            thumb_up
                                        </span>

                                    </div>
                                    <div class="action-name">
                                        <h6>Thích</h6>
                                    </div>
                                </a>

                            <?php  } ?>
                            </div>
                            <div class="action-comment-under-item">
                                <div class="action-icon">
                                    <span class="material-icons-outlined comment-icon">
                                        chat_bubble_outline
                                    </span>
                                </div>
                                <div class="action-name btn-comment <?php echo $row_news['PostID']?>">
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
                        <form id="comment-form" action="index.php?controller=Profile&action=addCommentFriend" method="post" autocomplete="off">
                            <div class="col-md-12 comment-input-form">
                                <?php
                                if ($getProfileImage)
                                foreach ($getProfileImage as $user_ava) {
                                ?>
                                    <a class="icon" href="index.php?controller=profile&action=index">
                                        <img class="user-img" src="<?php echo ($user_ava['UserAva']); ?>" alt="">
                                    </a>
                                <?php
                                }
                                ?>
                                <input class="ID" type="text" value="<?php echo $row_news['PostID']; ?>" name="PostID">
                                <input class="ID" type="text" value="<?php echo $UserID; ?>" name="UserID">
                                <input class="ID" type="text" value="<?php echo $row_news['UserID']; ?>" name="UserIDFriend">
                                <!--Người đăng nhập-->
                                <div class="comment-input">
                                    <input id="comment-input" name="txt-comment" type="text" placeholder=" Viết bình luận" class="form-control">
                                </div>
                                <button id="send-comment" name="btn-comment" type="submit">
                                    <span class="material-icons-round send-icon">
                                        reply
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!--COMMENTS-->
                    <ul class="comments <?php echo $row_news['PostID']?>" style="display:none">
                        <?php
                        //TRUY VẤN COMMENT, COMMENT_USER
                        if($Profile->viewComment($row_news['PostID']))
                        foreach ($Profile->viewComment($row_news['PostID']) as $row_comment) {
                            if ($row_comment['UserID'] == $UserID) {
                        ?>
                                <!--COMMENT OF USER LOGIN-->
                                <li class="comment-item myDIV">
                                    <a class="icon" href="index.php?controller=profile&action=index">
                                        <img class="user-img" src="<?php echo ($row_comment['UserAva']); ?>" alt="">
                                    </a>
                                    <div class="commentator-name">
                                        <a href="index.php?controller=profile&action=index" class="user-name text-decoration-none link-dark">
                                            <b><?php echo $row_comment['UserName']; ?></b>
                                        </a>
                                        <p class="comment-content">
                                            <?php echo $row_comment['CommentContent']; ?>
                                        </p>
                                    </div>
                                    <!--EDIT COMMENT-->
                                    <div id="edit-comment" class="hide">
                                        <div class="option-comment option-icon collapsible">
                                            <span id="btn-edit" class="material-icons-outlined option-comment option-icon" style="font-size:15px">
                                                edit
                                            </span>
                                        </div>
                                        <form class="content" id="form-edit-comment" action="index.php?controller=Profile&action=editComment" method="post">
                                            <input class="ID" type="text" value="<?php echo $row_comment['UserID']; ?>" name="CommentUserID">
                                            <input class="ID" type="text" value="<?php echo $UserID; ?>" name="UserID">
                                            <!--Người đăng nhập-->
                                            <input class="ID" type="text" value="<?php echo $row_comment['CommentID']; ?>" name="CommentID">
                                            <textarea id="input-edit-comment" name="txt-edit" id="" cols="30" rows="4"><?php echo $row_comment['CommentContent']; ?></textarea>
                                            <button id="btn-edit-comment" name="btn-edit" type="submit">Lưu</button>
                                        </form>
                                        <a href="index.php?controller=Profile&action=deleteComment&CommentID=<?php echo $row_comment['CommentID']; ?>" class="link-dark">
                                            <!--Người đăng nhập-->
                                            <span class="hide material-icons-outlined option-comment option-icon" style="font-size:15px">
                                                delete_forever
                                            </span>
                                        </a>
                                    </div>
                                </li>
                            <?php
                            } else {
                            ?>
                                <!--COMMENT OF USER FRIEND-->
                                <li class="comment-item myDIV">
                                    <a class="icon" href="user_profile_friend.php?UserIDFriend=<?php echo $row_comment['UserID']; ?>">
                                        <img class="user-img" src="<?php echo ($row_comment['UserAva']); ?>" alt="">
                                    </a>
                                    <div class="commentator-name">
                                        <a href="user_profile_friend.php?UserIDFriend=<?php echo $row_comment['UserID']; ?>" class="user-name text-decoration-none link-dark">
                                            <b><?php echo $row_comment['UserName']; ?></b>
                                        </a>
                                        <p class="comment-content">
                                            <?php echo $row_comment['CommentContent']; ?>
                                        </p>
                                    </div>
                                </li>

                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>


            </div>
          <?php
            } // to
          ?>
            </div>
          </div>
          <!-- right -->
        </div>
      </div>
    </section>
    <!-- Section grey bg -->
  </main>
<?php } ?>
<script type="text/javascript" src="assets/js/mdb/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript"></script>
</body>

</html>
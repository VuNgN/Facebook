<main>
  <!-- Section: white bgg -->
  <section class="bg-white mb-4 shadow-2">
    <div class="container">
      <!-- Section: imagess -->
      <section class="mb-10">
        <!-- Background imagee -->
        <div class="p-5 text-center bg-image shadow-1-strong rounded-bottom" style="
                background-image: url('assets/images/sky.jpg');
                height: 250px;
              " onclick="clickImg('assets/images/sky.jpg')"></div>
        <?php
        foreach ($profileInfo as $row_ava) {
        ?>
          <div class="d-flex justify-content-center">
            <img src="<?php echo $row_ava['UserAva'] ?>" alt="" class="
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
          <button type="button" class="btn btn-link bg-light" datadata-ripple-color="dark" onclick="document.location.href='index.php?controller=profile&action=index'">
            Bài viết
          </button>
          <button type="button" class="btn btn-link text-reset" datadata-ripple-color="dark" onclick="document.location.href='index.php?controller=profile&action=viewGioiThieu'">
            Giới thiệu
          </button>
          <button type="button" class="btn btn-link text-reset" datadata-ripple-color="dark" onclick="document.location.href='index.php?controller=profile&action=viewFriend'">
            Bạn bè
          </button>
          <button type="button" class="btn btn-link text-reset" datadata-ripple-color="dark" onclick="document.location.href='index.php?controller=profile&action=viewImage'">
            Ảnh
          </button>
          <button type="button" class="btn btn-link text-reset" datadata-ripple-color="dark" onclick="document.location.href='index.php?controller=profile&action=viewVideo'">
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

  <!-- Section grey bgg -->
  <section>
    <div class="container">
      <div class="row">
        <!-- leftt -->
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
                  <a href="https://vi.wikipedia.org/wiki/H%C3%A0_N%E1%BB%99i"><strong> <?php echo $row_ava['UserAddress'] ?> </strong></a>
                </li>
                <li>
                  <i class="fas fa-map-marker-alt me-2 mt-3"></i>Đến từ
                  <a href="https://vi.wikipedia.org/wiki/H%C3%A0_N%E1%BB%99i"><strong> <?php echo $row_ava['UserAddress'] ?> </strong></a>
                </li>
                <li>
                  <i class="fab fa-github me-2 mt-3"></i><a href="https://github.com/VuNgN/facebook">https://github.com/VuNgN/facebook</a>
                </li>
              </ul>
              <button type="button" class="btn btn-light bg-light btn-block mt-3">
                <strong>Thêm sở thích</strong>
              </button>

              <button type="button" class="btn btn-light bg-light btn-block">
                <strong>Chỉnh sửa</strong>
              </button>
            </div>
          </div>


        <?php
        }
        ?>
        <!-- chưa làm được phần ảnh này -->
        <!-- ảnh featuree -->
        <div class="card mb-3">
          <div class="card-body">
            <a href="" class="text-reset d-inline-block">
              <h5 class="card-title mt"><strong>Ảnh</strong></h5>
            </a>
            <a href="index.php?controller=profile&action=viewImage" class="btn btn-link d-inline-block py-1 px-3" style="float: right">Xem tất cả ảnh</a>
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
                  <img src="<?php echo $row_img['images'] ?>" alt="" onclick="clickImg(<?php echo $row_img['images'] ?>)" class="w-100 shadow-1-strong rounded" style="height: 100px;" />
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

        <!-- ảnh featuree -->
        <!-- friendss -->
        <div class="card mb-3">
          <div class="card-body">
            <div class="card_left d-inline-block">
              <a href="???trosanglinkbanbe" class="text-reset">
                <h5 class="card-title mt"><strong>Bạn bè</strong></h5>
              </a>

            </div>

            <div class="card_right d-inline-block" style="float: right">
              <a href="index.php?controller=profile&action=viewFriend" class="btn btn-link py-1 px-3">Xem tất cả bạn bè</a>
            </div>
            <?php
            $count = 0;
            if ($profileFriend)
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
        <!-- friendss -->
        <!-- footerr -->
        <?php
        include "views/templates/footer_link.php";
        ?>
        <!-- footerr -->
        </div>
        <!-- leftt -->

        <!-- rightt -->
        <div class="col-md-7 mb-4 mb-md-0">
          <!--THINKING POSTT-->
          <div class="card mb-4 thinking-post">
            <div class="card-body">
              <div class="d-flex">
                <a id="thinking-user" href="index.php?controller=profile&action=index">
                  <img src="<?php echo $row_ava['UserAva'] ?>" alt="" class="rounded-circle border" />
                </a>
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
          <!--Newss-->
          <?php
          //TRUY VẤN POST, POST_USERR
          if ($profilePost)
            foreach ($profilePost as $row_news) {
          ?>
            <div class="news <?php echo $row_news['PostID'] ?>">
              <div class="row">
                <!-- heading -->
                <div class="heading">
                  <a class="user-ava" href="index.php?controller=profile&action=index">
                    <img class="user-img" src="<?php echo $row_news['UserAva'] ?>" alt="">
                  </a>
                  <div class="user-name-time">
                    <a href="index.php?controller=profile&action=index" class="user-name text-decoration-none link-dark">
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
                        <div class="col-md-12 items btn-editPost">
                          <!-- bấm vào đây sửa bài viết -->
                          <span class="material-icons">mode_edit</span>
                          <b>Sửa bài viết</b>
                        </div>
                        <!--Sửa bài-->
                        <!--Xóa bài-->
                        <a class="col-md-12 items" href="index.php?controller=Profile&action=deletePost&PostID=<?php echo $row_news['PostID'] ?>">
                          <span class="material-icons">delete</span>
                          <b>Xóa bài viết</b> <!-- bấm vào đây xóa bài viết -->
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- news-content -->
                <div class="news-content">
                  <div class="content-caption">
                    <?php echo $row_news['PostCaption'] ?>
                      <form class="editPost" action="index.php?controller=Profile&action=editPost&PostID=<?php echo $row_news['PostID']?>"
                      style="width:100%;height:auto;display:none; flex-direction:column" method="post">
                        <textarea name="editContent" id="" cols="100" rows="10"><?php echo $row_news['PostCaption']?></textarea>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary editPostCloseBtn">
                            Đóng
                          </button>
                          <button type="submit" class="btn btn-primary" name="btn-sendPost">
                            Lưu
                          </button>
                        </div>
                      </form>
                  </div>
                  <?php
                  if ($Profile->getImgPost($row_news['PostID']))
                    foreach ($Profile->getImgPost($row_news['PostID']) as $row_img_content) {

                  ?>
                    <div class="content-images">
                      <img src="<?php echo $row_img_content['images']; ?>" alt="" onclick="clickImg('<?php echo $row_img_content['images']; ?>')">
                    </div>
                  <?php
                    }
                  ?>
                </div>

                <!-- action comment -->
                <div class="action-comment">
                  <div class="action-comment-above">
                    <div class="action-index">
                      <span class="material-icons-round">
                        emoji_emotions
                      </span>
                      <div class="share-index-item">
                          <?php echo $Profile->getLikeNumber($row_news['PostID']); ?>
                          lượt like
                      </div>
                    </div>
                    <div class="comment-index">

                      <?php
                      if ($Profile->countComment($row_news['PostID']))
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
                    <?php
                            if ($Profile->getLikeModel($row_news['PostID'])) {
                              
                              ?>
                                <a class="action-comment-under-item text-decoration-none" href="index.php?controller=profile&action=likeProcess&PostID=<?php echo $row_news['PostID'] ?>&UserID=<?php echo $row_news['UserID'] ?>" style="">
                                  <div class="action-comment-under-item">
                                    <div class="action-icon">
                                        <span class="material-icons">
                                            thumb_up
                                        </span>

                                    </div>
                                    <div class="action-name">
                                        <h6>Thích</h6>
                                    </div>
                                  </div>
                                </a>
                            <?php } else {

                            ?>
                                <a class="action-comment-under-item text-decoration-none text-muted" href="index.php?controller=profile&action=likeProcess&PostID=<?php echo $row_news['PostID'] ?>&UserID=<?php echo $row_news['UserID'] ?>" style="">
                                  <div class="action-comment-under-item">    
                                    <div class="action-icon">
                                        <span class="material-icons">
                                            thumb_up
                                        </span>

                                    </div>
                                    <div class="action-name">
                                        <h6>Thích</h6>
                                    </div>
                                  </div>
                                </a>

                            <?php  } ?>
                    <div class="action-comment-under-item btn-comment">
                      <div class="action-icon">
                        <span class="material-icons-outlined comment-icon">
                          chat_bubble_outline
                        </span>
                      </div>
                      <div class="action-name ">
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
                <!--COMMENT INPUTT-->
                <div class="row">
                  <form id="comment-form" action="index.php?controller=profile&action=addComment" method="post" autocomplete="off">
                    <div class="col-md-12 comment-input-form">
                      <a class="icon" href="index.php?controller=profile&action=index">
                        <img class="user-img" src="<?php echo $row_news['UserAva'] ?>" alt="">
                      </a>
                      <input class="ID" type="text" value="<?php echo $row_news['PostID']; ?>" name="PostID">
                      <input class="ID" type="text" value="<?php echo $UserID; ?>" name="UserID">
                      <!--Người đăng nhậpp-->
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

                <!--COMMENTSS-->
                <ul class="comments <?php echo $row_news['PostID']?>" style="display:none">
                  <?php
                  //TRUY VẤN COMMENT, COMMENT_USER
                  foreach ($Profile->viewComment($row_news['PostID']) as $row_comment) {
                    if ($row_comment['UserID'] == $UserID) {
                  ?>
                      <li class="comment-item myDIV">
                        <a class="icon" href="index.php?controller=profile&action=index">
                          <?php
                          //TRUY VẤN COMMENT, COMMENT_USER
                          foreach ($Profile->getAvatar($row_comment['UserID']) as $rowAvatar) {
                          }
                          ?>
                          <img class="user-img" src="<?php echo $row_news['UserAva'] ?>" alt="">
                        </a>
                        <div class="commentator-name">
                          <a href="index.php?controller=profile&action=index" class="user-name text-decoration-none link-dark">
                            <b><?php echo $row_comment['UserName']; ?></b>
                          </a>
                          <p class="comment-content">
                            <?php echo $row_comment['CommentContent']; ?>
                          </p>
                        </div>
                        <!--EDIT COMMENTT-->
                        <div id="edit-comment" class="hide">
                          <!-- sửa comment -->
                          <div class="option-comment option-icon collapsible">
                            <span id="btn-edit" class="material-icons-outlined option-comment option-icon" style="font-size:15px">
                              edit
                            </span>
                          </div>
                          <!-- form sửa comment -->
                          <form class="content" id="form-edit-comment" action="index.php?controller=profile&action=editComment" method="post">
                            <input class="ID" type="text" value="<?php echo $row_comment['UserID']; ?>" name="CommentUserID">
                            <input class="ID" type="text" value="<?php echo $UserID; ?>" name="UserID">
                            <!--Người đăng nhậpp-->
                            <input class="ID" type="text" value="<?php echo $row_comment['CommentID']; ?>" name="CommentID">
                            <textarea id="input-edit-comment" name="txt-edit" id="" cols="30" rows="4"><?php echo $row_comment['CommentContent']; ?></textarea>
                            <button id="btn-edit-comment" name="btn-edit" type="submit">Lưu</button>
                          </form>
                          <!-- form sửa comment -->

                          <!-- xóa comment -->
                          <a href="index.php?controller=profile&action=deleteComment&CommentID=<?php echo $row_comment['CommentID']; ?>" class="link-dark">
                            <span class="hide material-icons-outlined option-comment option-icon" style="font-size:15px">
                              delete_forever
                            </span>
                          </a>
                          <!-- xóa comment -->
                        </div>
                        <!-- đóng edit comment-->
                      </li>
                    <?php
                    } else {
                    ?>
                      <li class="comment-item myDIV">
                        <?php
                        foreach ($Profile->getAvatar($row_comment['UserID']) as $rowAvatar) {

                        ?>
                          <a class="icon" href="user_profile.php">
                            <?php
                            //TRUY VẤN COMMENT, COMMENT_USER
                            ?>
                            <img class="user-img" src="<?php echo $row_ava['UserAva'] ?>" alt="">
                          </a>
                        <?php } ?>
                        <div class="commentator-name">
                          <a href="user_profile.php" class="user-name text-decoration-none link-dark">
                            <b><?php echo $row_comment['UserName']; ?></b>
                          </a>
                          <p class="comment-content">
                            <?php echo $row_comment['CommentContent']; ?>
                          </p>
                        </div>
                        <!--delete COMMENTT-->
                        <div id="edit-comment" class="hide">
                          <a href="index.php?controller=profile&action=deleteComment&CommentID=<?php echo $row_comment['CommentID']; ?>" class="link-dark">
                            <span class="hide material-icons-outlined option-comment option-icon" style="font-size:15px">
                              delete_forever
                            </span>
                          </a>
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
          <!--THINKING POSTT-->
          <div class="col-md-9 mb-4 mb-md-0 thinking-post">
            <div class="modal fade" id="buttonModalUserPost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <form id="post-form" action="index.php?controller=Profile&action=addPost" method="post" autocomplete="off" enctype="multipart/form-data">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">
                        <strong>Tạo bài viết</strong>
                      </h5>
                      <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <input type="text" name="UserID" value="<?php echo $UserID ?>" hidden>
                    <textarea id="post-writing" cols="50" rows="5" class="modal-body" placeholder="Hãy viết gì đó..." name="txt-content"></textarea>
                    <div class="displayImg">
                      <div class="mb-3 p-2">
                        <label for="formFileMultiple" class="form-label">Chọn ảnh của bạn</label>
                        <input class="form-control" type="file" id="formFileMultiple" name="myFile">
                        <!-- <input class="form-control" type="file" id="formFileMultiple" name="myFile" multiple> -->
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                        Đóng
                      </button>
                      <button type="submit" class="btn btn-primary" name="btn-sendPost">
                        Lưu
                      </button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- rightt -->

    </div>
    </div>

  </section>
  <!-- Section grey bgg -->
</main>
<script>
  function clickImg(link) {
    window.open(link, "_blank");
  }
</script>

<?php
include "views/templates/footer.php";
?>
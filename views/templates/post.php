
<main>
        <!--MAIN-NEW-FEED-->
        <div id="main-news-feed">
        <?php
        //TRUY VẤN POST, POST_USER
        foreach($PostDetail as $detail) {
        ?>
                <div class="news <?php echo $detail['PostID']?>">
                <div class="row">
                    <div class="heading">
                        <a class="user-ava" href="index.php?controller=profile&action=getFriendInfo&UserIDFriend=<?php echo $detail['UserID']; ?>">
                            <img class="user-img" src="<?php echo ($detail['UserAva']); ?>" alt="">
                        </a>
                        <div class="user-name-time">
                            <a href="index.php?controller=profile&action=getFriendInfo&UserIDFriend=<?php echo $detail['UserID']; ?>" class="user-name text-decoration-none link-dark">
                                <b><?php echo $detail['UserName'] ?></b>
                            </a>
                            <h6 class="time">
                                <?php echo $detail['PostTime'] ?>
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
                                    <a class="col-md-12 items link-dark" href="index.php?controller=newsfeed&action=reportPost&PostID=<?php echo $detail['PostID']; ?>&PostUserID=<?php echo $detail['UserID']; ?>">
                                        <span class="material-icons-outlined">report</span>
                                        <b>Báo cáo bài viết</b>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="news-content">
                        <div class="content-caption">
                            <?php echo $detail['PostCaption'] ?>
                        </div>
                        <div class="content-images">
                            <?php
                            if($templates->getImgPost($detail['PostID'])) 
                            foreach ($templates->getImgPost($detail['PostID']) as $row_img_content) {
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
                                <div class="share-index-item">
                                    <?php echo $templates->getLikeNumber($detail['PostID']); ?>
                                    lượt like
                                </div>
                            </div>
                            <!-- //ĐẾM LƯỢT BÌNH LUÂN -->
                            <div class="comment-index">

                                <?php
                                foreach ($templates->countComment($detail['PostID']) as $comment) {
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
                            if ($templates->getLikeModel($detail['PostID'])) {
                                
                                ?>
                                <a class="action-comment-under-item text-decoration-none" href="index.php?controller=template&action=likeProcess&PostID=<?php echo $detail['PostID'] ?>&UserID=<?php echo $detail['UserID'] ?>" style="">
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
                                <a class="action-comment-under-item text-decoration-none text-muted" href="index.php?controller=template&action=likeProcess&PostID=<?php echo $detail['PostID'] ?>&UserID=<?php echo $detail['UserID'] ?>" style="">
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
                                <div class="action-name <?php echo $detail['PostID']?>">
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
                        <form id="comment-form" action="index.php?controller=template&action=addComment" method="post" autocomplete="off">
                            <div class="col-md-12 comment-input-form">
                                <?php
                                foreach ($row_user_ava as $user_ava) {
                                ?>
                                    <a class="icon" href="index.php?controller=profile&action=index">
                                        <img class="user-img" src="<?php echo ($user_ava['UserAva']); ?>" alt="">
                                    </a>
                                <?php
                                }
                                ?>
                                <input class="ID" type="text" value="<?php echo $detail['PostID']; ?>" name="PostID">
                                <input class="ID" type="text" value="<?php echo $UserID; ?>" name="UserID">
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
                    <ul class="comments <?php echo $detail['PostID']?>" style="display:none">
                        <?php
                        //TRUY VẤN COMMENT, COMMENT_USER
                        if($templates->getComment($detail['PostID']))
                        foreach ($templates->getComment($detail['PostID']) as $row_comment) {
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
                                        <form class="content" id="form-edit-comment" action="index.php?controller=newsfeed&action=editComment" method="post">
                                            <input class="ID" type="text" value="<?php echo $row_comment['UserID']; ?>" name="CommentUserID">
                                            <input class="ID" type="text" value="<?php echo $UserID; ?>" name="UserID">
                                            <!--Người đăng nhập-->
                                            <input class="ID" type="text" value="<?php echo $row_comment['CommentID']; ?>" name="CommentID">
                                            <textarea id="input-edit-comment" name="txt-edit" id="" cols="30" rows="4"><?php echo $row_comment['CommentContent']; ?></textarea>
                                            <button id="btn-edit-comment" name="btn-edit" type="submit">Lưu</button>
                                        </form>
                                        <a href="index.php?controller=newsfeed&action=deleteComment&CommentID=<?php echo $row_comment['CommentID']; ?>" class="link-dark">
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
                                    <a class="icon" href="index.php?controller=profile&action=getFriendInfo&UserIDFriend=<?php echo $row_comment['UserID']; ?>">
                                        <img class="user-img" src="<?php echo ($row_comment['UserAva']); ?>" alt="">
                                    </a>
                                    <div class="commentator-name">
                                        <a href="index.php?controller=profile&action=getFriendInfo&UserIDFriend=<?php echo $row_comment['UserID']; ?>" class="user-name text-decoration-none link-dark">
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
        }
        ?>
    </div>
</main>
<?php
?>
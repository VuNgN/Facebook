<div class="container-fluid" id="SideBar">
    <div class="row">

        <?php
        foreach ($row_user_ava as $user_ava) {
        ?>
            <a class="col-md-12 text-decoration-none link-dark sidebar-item" href="index.php?controller=profile&action=index">
                <div class="icon">
                    <img class="user-img" src="<?php echo ($user_ava['UserAva']); ?>" alt="">
                </div>
                <div class="text">
                    <b><?php echo $user_ava['UserName']; ?></b>
                </div>
            </a>
        <?php
        }
        ?>


    </div>
    <div class="row">
        <div class="col-md-12 sidebar-item">
            <div class="icon">
                <img class="img" src="assets/images/sidebar/friend.png" alt="">
            </div>
            <div class="text">
                <b>Bạn bè</b>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 sidebar-item">
            <div class="icon">
                <img class="img" src="assets/images/sidebar/save.png" alt="">
            </div>
            <div class="text">
                <b>Đã lưu</b>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 sidebar-item">
            <div class="icon">
                <img class="img" src="assets/images/sidebar/group.png" alt="">
            </div>
            <div class="text">
                <b>Nhóm</b>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 sidebar-item">
            <div class="icon">
                <img class="img" src="assets/images/sidebar/marketplace.png" alt="">
            </div>
            <div class="text">
                <b>Marketplace</b>
            </div>
        </div>
    </div>
    <div class="flex-shrink-0 p-3" id="sidebar">
        <div class="row">
            <div class="col-md-12 collapsed expand-more-row sidebar-item" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                <div class="icon-expand">
                    <span class="material-icons-round expand-icon">
                        expand_more
                    </span>
                </div>
                <div class="text">
                    <b>Xem thêm</b>
                </div>
            </div>
        </div>
        <div class="collapse expand-items" id="orders-collapse">
            <div class="row">
                <div class="col-md-12 sidebar-item">
                    <div class="icon">
                        <img class="img" src="assets/images/sidebar/campaign.png" alt="">
                    </div>
                    <div class="text">
                        <b>Chiến dịch gây quỹ</b>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 sidebar-item">
                    <div class="icon">
                        <img class="img" src="assets/images/sidebar/Game.png" alt="">
                    </div>
                    <div class="text">
                        <b>Chơi game</b>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 sidebar-item">
                    <div class="icon">
                        <img class="img" src="assets/images/sidebar/FacebookPay.png" alt="">
                    </div>
                    <div class="text">
                        <b>Facebook Pay</b>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 sidebar-item">
                    <div class="icon">
                        <img class="img" src="assets/images/sidebar/recent.png" alt="">
                    </div>
                    <div class="text">
                        <b>Gần đây nhất</b>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 sidebar-item">
                    <div class="icon">
                        <img class="img" src="assets/images/sidebar/recent-adv-manage.png" alt="">
                    </div>
                    <div class="text">
                        <b>Hoạt động quảng cáo gần đây</b>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 sidebar-item">
                    <div class="icon">
                        <img class="img" src="assets/images/sidebar/memory.png" alt="">
                    </div>
                    <div class="text">
                        <b>Kỷ niệm</b>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 sidebar-item">
                    <div class="icon">
                        <img class="img" src="assets/images/sidebar/messenger.png" alt="">
                    </div>
                    <div class="text">
                        <b>Messenger</b>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 sidebar-item">
                    <div class="icon">
                        <img class="img" src="assets/images/sidebar/messengerforchild.png" alt="">
                    </div>
                    <div class="text">
                        <b>Messenger nhí</b>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 sidebar-item">
                    <div class="icon">
                        <img class="img" src="assets/images/sidebar/event.png" alt="">
                    </div>
                    <div class="text">
                        <b>Sự kiện</b>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 sidebar-item">
                    <div class="icon">
                        <img class="img" src="assets/images/sidebar/emotional-health.png" alt="">
                    </div>
                    <div class="text">
                        <b>Sức khỏe cảm xúc</b>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 sidebar-item">
                    <div class="icon">
                        <img class="img" src="assets/images/sidebar/weather.png" alt="">
                    </div>
                    <div class="text">
                        <b>Thời tiết</b>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 sidebar-item">
                    <div class="icon">
                        <img class="img" src="assets/images/sidebar/page.png" alt="">
                    </div>
                    <div class="text">
                        <b>Trang</b>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 sidebar-item">
                    <div class="icon">
                        <img class="img" src="assets/images/sidebar/adv-manage.png" alt="">
                    </div>
                    <div class="text">
                        <b>Trình quảng lý quảng cáo</b>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 sidebar-item">
                    <div class="icon">
                        <img class="img" src="assets/images/sidebar/climate-science-centre.png" alt="">
                    </div>
                    <div class="text">
                        <b>Trung tâm khoa học khí hậu</b>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 sidebar-item">
                    <div class="icon">
                        <img class="img" src="assets/images/sidebar/adv-centre.png" alt="">
                    </div>
                    <div class="text">
                        <b>Trung tâm quảng cáo</b>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 sidebar-item">
                    <div class="icon">
                        <img class="img" src="assets/images/sidebar/emergency.png" alt="">
                    </div>
                    <div class="text">
                        <b>Ứng phó khẩn cấp</b>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 sidebar-item">
                    <div class="icon">
                        <img class="img" src="assets/images/sidebar/video-game.png" alt="">
                    </div>
                    <div class="text">
                        <b>Video chơi game</b>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 sidebar-item">
                    <div class="icon">
                        <img class="img" src="assets/images/sidebar/live-stream.png" alt="">
                    </div>
                    <div class="text">
                        <b>Video trực tiếp</b>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 sidebar-item">
                    <div class="icon">
                        <img class="img" src="assets/images/sidebar/work.png" alt="">
                    </div>
                    <div class="text">
                        <b>Làm việc</b>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 sidebar-item">
                    <div class="icon">
                        <img class="img" src="assets/images/sidebar/watch.png" alt="">
                    </div>
                    <div class="text">
                        <b>Watch</b>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 collapsed expand-more-row sidebar-item" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                    <div class="icon-expand">
                        <span class="material-icons-round expand-icon">
                            expand_less
                        </span>
                    </div>
                    <div class="text">
                        <b>Ẩn bớt</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <hr>
    </div>
    <div class="row">
        <h6>Lối tắt của bạn</h6>
        <div class="col-md-12 sidebar-item">
            <div class="icon"></div>
            <div class="text">
                <b>Nhóm</b>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 sidebar-item">
            <div class="icon"></div>
            <div class="text">
                <b>Nhóm</b>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 sidebar-item">
            <div class="icon"></div>
            <div class="text">
                <b>Nhóm</b>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 sidebar-item">
            <div class="icon"></div>
            <div class="text">
                <b>Nhóm</b>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 sidebar-item">
            <div class="icon"></div>
            <div class="text">
                <b>Nhóm</b>
            </div>
        </div>
    </div>
</div>
<!--FOOTER-->
<?php
include "views/templates/footer_link.php"
?>
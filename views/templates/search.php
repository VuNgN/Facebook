<main id="search-main">
    <div class="row search-results">
<?php
            if($users)
            foreach($users as $row_search){
                if($row_search['UserID'] == $UserID){
?>
        <a class="col-md-12 search-result-item" href="index.php?controller=profile&action=index">
            <div class="icon">
                <img class="user-img" src="<?php echo $row_search['UserAva']?>" alt="">
            </div>
            <div class="text">
                <b><?php echo $row_search['UserName'] ?></b>
            </div>
        </a>
        <hr style="margin: 0px">

<?php
                }
                else{
?>
        <a class="col-md-12 search-result-item" href="index.php?controller=profile&action=getFriendInfo&UserIDFriend=<?php echo $row_search['UserID'];?>">
            <div class="icon">
                <img class="user-img" src="<?php echo $row_search['UserAva']?>" alt="">
            </div>
            <div class="text">
                <b><?php echo $row_search['UserName'] ?></b>
            </div>
        </a>
        <hr style="margin: 0px">
<?php
                }
            }
?>
    </div>
</main>
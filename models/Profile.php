<?php
require_once 'configs/db.php';
class Profile
{
    private $UserID;

    function __construct($UserID)
    {
        $this->UserID = $UserID;
    }
    public function getProfileInfo()
    {
        $connection = $this->connectDb();
        $queryProfile = "SELECT * from user_profile where UserID='" . $this->UserID . "'";
        $result_ava = mysqli_query($connection, $queryProfile);
        if (mysqli_num_rows($result_ava) > 0) {
            $this->closeDb($connection);
            return mysqli_fetch_all($result_ava, MYSQLI_ASSOC);
        }
    }

    public function getProfileImage()
    {
        $connection = $this->connectDb();
        $sql_img = "SELECT * from images, post, user_profile where images.PostID = post.PostID and post.UserID = user_profile.UserID 
        and user_profile.UserID = '" . $this->UserID . "' LIMIT 6;"; // max 6
        $result_img = mysqli_query($connection, $sql_img);
        if (mysqli_num_rows($result_img) > 0) {
            $this->closeDb($connection);
            return mysqli_fetch_all($result_img, MYSQLI_ASSOC);
        }
    }

    public function getProfileFriend()
    {
        $connection = $this->connectDb();
        $queryFriends = "SELECT * FROM user_profile, friend_ship 
            WHERE (friend_ship.User1ID = UserID OR friend_ship.User2ID = UserID)
            AND UserID != '" . $this->UserID . "'
            AND (friend_ship.User1ID = '" . $this->UserID . "' OR friend_ship.User2ID = '" . $this->UserID . "')  
            GROUP BY UserID LIMIT 6;"; /*limit 6 nguoi bann*/
        $resultFriends = mysqli_query($connection, $queryFriends);

        if (mysqli_num_rows($resultFriends) > 0) {
            $this->closeDb($connection);
            return mysqli_fetch_all($resultFriends, MYSQLI_ASSOC);
        }
    }

    public function getPost()
    {
        $connection = $this->connectDb();
        $sql = "SELECT * from post, user_profile WHERE post.UserID = user_profile.UserID AND user_profile.UserID = '" . $this->UserID . "' GROUP BY post.PostID ORDER BY post.PostID DESC";
        //Người đăng nhậpp-->
        $result_news = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result_news) > 0) {
            $this->closeDb($connection);
            return mysqli_fetch_all($result_news, MYSQLI_ASSOC);
        }
    }
    public function getImgPost($postid)
    {
        $connection = $this->connectDb();
        $sql_img_content = "SELECT * FROM images INNER JOIN post ON post.PostID = images.PostID WHERE post.PostID=" . $postid . "";
        $result_img_content = mysqli_query($connection, $sql_img_content);
        if (mysqli_num_rows($result_img_content) > 0) {
            $this->closeDb($connection);
            return mysqli_fetch_all($result_img_content, MYSQLI_ASSOC);
        }
    }
    public function countComment($postId)
    {
        $connection = $this->connectDb();
        $sql_count_comment = "SELECT count(CommentID) FROM comment where PostID=" . $postId;
        $result_count_comment = mysqli_query($connection, $sql_count_comment);
        $this->closeDb($connection);
        return mysqli_fetch_all($result_count_comment, MYSQLI_ASSOC);
    }
    
    public function viewComment($postId) {
        $connection = $this->connectDb();
        $sql_comment = "SELECT * from view_comment WHERE PostID =" . $postId;
        $result_count_comment = mysqli_query($connection, $sql_comment);
        $this->closeDb($connection);
        return mysqli_fetch_all($result_count_comment, MYSQLI_ASSOC);
    }

    public function getAvatar($userid) {
        $connection = $this->connectDb();
        $queryAvatar = "SELECT * from user_profile WHERE UserID =" . $userid;
        $result_count_comment = mysqli_query($connection, $queryAvatar);
        $this->closeDb($connection);
        return mysqli_fetch_all($result_count_comment, MYSQLI_ASSOC);
    }
    public function addComment($arrComment){
        $connection = $this->connectDb();
        $sql_comment = "INSERT INTO comment(PostID, UserID, CommentContent)
                        VALUES('{$arrComment['postID']}', '{$arrComment['userID']}', '{$arrComment['content']}')";
        $result = mysqli_query($connection, $sql_comment);
        $this->closeDb($connection);
        return $result;
    }
    public function editComment($arrComment){
        $connection = $this->connectDb();
        $sql = "UPDATE comment SET CommentContent='{$arrComment['content']}' WHERE CommentID='{$arrComment['commentID']}'";
        $result = mysqli_query($connection, $sql);
        $this->closeDb($connection);
        return $result;
    }
    public function deleteComment($commentID){
        $connection = $this->connectDb();
        $sql = "DELETE FROM comment WHERE CommentID = $commentID";
        $result = mysqli_query($connection, $sql);
        $this->closeDb($connection);
        return $result;
    }
    public function connectDb()
    {
        $connection = mysqli_connect(
            DB_HOST,
            DB_USERNAME,
            DB_PASSWORD,
            DB_NAME
        );
        if (!$connection) {
            die("Không thể kết nối. Lỗi: " . mysqli_connect_error());
        }

        return $connection;
    }
    public function closeDb($connection = null)
    {
        mysqli_close($connection);
    }
}

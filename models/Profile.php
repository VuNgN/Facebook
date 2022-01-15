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
            AND friend_ship.Active=1
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

    public function viewComment($postId)
    {
        $connection = $this->connectDb();
        $sql_comment = "SELECT * from view_comment WHERE PostID =" . $postId;
        $result_count_comment = mysqli_query($connection, $sql_comment);
        $this->closeDb($connection);
        return mysqli_fetch_all($result_count_comment, MYSQLI_ASSOC);
    }

    public function getAvatar($userid)
    {
        $connection = $this->connectDb();
        $queryAvatar = "SELECT * from user_profile WHERE UserID =" . $userid;
        $result_count_comment = mysqli_query($connection, $queryAvatar);
        $this->closeDb($connection);
        return mysqli_fetch_all($result_count_comment, MYSQLI_ASSOC);
    }
    public function addComment($arrComment)
    {
        $connection = $this->connectDb();
        $sql_comment = "INSERT INTO comment(PostID, UserID, CommentContent)
                        VALUES('{$arrComment['postID']}', '{$arrComment['userID']}', '{$arrComment['content']}')";
        $result = mysqli_query($connection, $sql_comment);
        $this->closeDb($connection);
        return $result;
    }
    public function editComment($arrComment)
    {
        $connection = $this->connectDb();
        $sql = "UPDATE comment SET CommentContent='{$arrComment['content']}' WHERE CommentID='{$arrComment['commentID']}'";
        $result = mysqli_query($connection, $sql);
        $this->closeDb($connection);
        return $result;
    }
    public function deleteComment($commentID)
    {
        $connection = $this->connectDb();
        $sql = "DELETE FROM comment WHERE CommentID = $commentID";
        $result = mysqli_query($connection, $sql);
        $this->closeDb($connection);
        return $result;
    }
    public function addPost($arrPost)
    {
        //add post
        $connection = $this->connectDb();
        $sql = "INSERT INTO `post` (`UserID`, `PostTime`,`PostCaption`) VALUES ('" . $this->UserID . "', '" . date("Y-m-d h:i:s") . "','" . $arrPost['content'] . "');";
        mysqli_query($connection, $sql);
        //Lấy PostId cho ảnh
        $queryPostId = "SELECT MAX(PostID) as PostID from post where UserID=" . $this->UserID;
        $result_id = mysqli_query($connection, $queryPostId);
        if (mysqli_num_rows($result_id) > 0) {
            $row_id = mysqli_fetch_assoc($result_id);
            $PostID = $row_id['PostID'];
        }
        $statusMsg = ''; // tạo ra 1 biến để lưu lại trạng thái upload nhằm mục tiêu phản hồi lại cho người dùng

        // 1. Động tác thiết lập cho việc chuẩn bị upload
        $targetDir = "assets/uploads/"; // thư mục chỉ định, nằm trong cùng project này để lưu trữ tệp tải lên
        $fileName = basename($arrPost['img']["name"]); // $_FILE là 1 biến siêu toàn cục lưu trữ toàn bộ phần tử file trên form
        $uploadDir = "" . $targetDir . $fileName; // Đây là đường dẫn upload ảnh vào thư mục uploads (tên đầy đủ + đường dẫn sau khi việc upload hoàn thành)
        $targetFilePath = $targetDir . $fileName; // Đây là đường dẫn insert db (tên đầy đủ + đường dẫn sau khi việc upload hoàn thành)
        // nó là giá trị cần phải truyền vào hàm move_upload_file

        $fileType = pathinfo($uploadDir, PATHINFO_EXTENSION); // bắt định dạng tệp tin, ktra định dạng có hợp lệ hay k

        if (!empty($arrPost['img']["name"])) {
            $allowTypes = array('jpg', 'png', 'jpeg'); // allow 3 types img type
            if (in_array($fileType, $allowTypes)) { // phương thức in_array kiểm tra 1 giá trị có thuộc mảng hay không
                // nếu có -> xử lý upload cái tệp tin đang lưu ở thư mục tạm C:\xampp\tmp\$_FILES["myFile"]["tmp_name"]
                if (move_uploaded_file($arrPost['img']["tmp_name"], $uploadDir)) { // nghĩa là lấy từ nơi tạm đẩy vào nơi chính
                    // lưu đường dẫn vào csdl
                    $sql = "INSERT into images (PostID, images) VALUES ('" . $PostID . "', '" . $targetFilePath . "')";
                    $insert = mysqli_query($connection, $sql); // giống mysqli_query
                    if ($insert) { // ktra việc query thành công?
                        $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
                    } else { // prbolem
                        $statusMsg = "File upload failed, please try again.";
                    }
                } else {
                    $statusMsg = "Sorry, there was an error uploading your file.";
                }
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
            }
        }
        $this->closeDb($connection);
    }
    public function editPost($arrPost)
    {
        $connection = $this->connectDb();
        $sql = "UPDATE post SET PostCaption='{$arrPost['edit']}' WHERE PostID={$arrPost['PostID']}";
        $result = mysqli_query($connection, $sql);
        $this->closeDb($connection);
        return $result;
    }
    public function deletePost($PostID)
    {
        $connection = $this->connectDb();
        $sql1 = "DELETE FROM images WHERE PostID = $PostID";
        $sql3 = "DELETE FROM comment WHERE PostID = $PostID";
        $sql4 = "DELETE FROM like_action WHERE PostID = $PostID";
        $sql2 = "DELETE FROM post WHERE PostID = $PostID";
        $result1 = mysqli_query($connection, $sql1);
        $result3 = mysqli_query($connection, $sql3);
        $result4 = mysqli_query($connection, $sql4);
        $result2 = mysqli_query($connection, $sql2);
        $this->closeDb($connection);
        return $result1 && $result2 && $result3 && $result4;
    }
    // --------------------------------------------------------------------
    // FRIENDDDDDDD
    public function getFriendInfo($FriendID)
    {
        $connection = $this->connectDb();
        $queryProfile = "SELECT * from user_profile where UserID= " . $FriendID . "";
        $result = mysqli_query($connection, $queryProfile);
        if (mysqli_num_rows($result) > 0) {
            $this->closeDb($connection);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    }

    public function isMySendFriend($idfriend)
    {
        $connection = $this->connectDb();
        $sql_my_send  = "select * from friend_ship where (User1ID='" . $this->UserID . "' and User2ID='" . $idfriend . "')";
        $result_my_send = mysqli_query($connection, $sql_my_send);
        if (mysqli_num_rows($result_my_send) > 0) {
            $this->closeDb($connection);
            return mysqli_fetch_all($result_my_send, MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    public function isOtherSendFriend($idfriend)
    {
        $connection = $this->connectDb();
        $sql_other_people_send = "select * from friend_ship where (User1ID='" . $idfriend . "' and User2ID='" . $this->UserID . "')";
        $result_other_people_send = mysqli_query($connection, $sql_other_people_send);
        if (mysqli_num_rows($result_other_people_send) > 0) {
            $this->closeDb($connection);
            return mysqli_fetch_all($result_other_people_send, MYSQLI_ASSOC);
        } else {
            return false;
        }
    }
    public function addFriend($UserId)
    {
        $connection = $this->connectDb();
        $sql = "select * from friend_ship where (User1ID='" . $this->UserID . "' and User2ID='" . $UserId . "') or (User2ID='" . $this->UserID . "' and User1ID='" . $UserId . "')";
        $result1 = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result1) <= 0) {
            $sql2 = "insert into friend_ship values ('" . $this->UserID . "', '" . $UserId . "', 0)";
            $result2 = mysqli_query($connection, $sql2);
            $this->closeDb($connection);
        }
    }

    public function removeFriend($UserId)
    {
        $connection = $this->connectDb();
        $sql = "delete from friend_ship where (User1ID='" . $this->UserID . "' and User2ID='" . $UserId . "') or (User2ID='" . $this->UserID . "' and User1ID='" . $UserId . "')";
        $result1 = mysqli_query($connection, $sql);
        $this->closeDb($connection);
    }

    public function cancelFriend($UserId)
    {
        $connection = $this->connectDb();
        $sql = "delete from friend_ship where (User1ID='" . $this->UserID . "' and User2ID='" . $UserId . "') or (User2ID='" . $this->UserID . "' and User1ID='" . $UserId . "')";
        $result1 = mysqli_query($connection, $sql);
        $this->closeDb($connection);
    }

    public function acceptFriend($UserId)
    {
        $connection = $this->connectDb();
        $sql = "select * from friend_ship where (User1ID='" . $this->UserID . "' and User2ID='" . $UserId . "') or (User2ID='" . $this->UserID . "' and User1ID='" . $UserId . "')";
        $result1 = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result1) > 0) {
            $sql2 = "UPDATE friend_ship SET Active=1 WHERE (User1ID='" . $this->UserID . "' and User2ID='" . $UserId . "') or (User2ID='" . $this->UserID . "' and User1ID='" . $UserId . "')";
            $result2 = mysqli_query($connection, $sql2);
            $this->closeDb($connection);
        }
    }
    public function viewImg($userID)
    {
        $connection = $this->connectDb();
        $sql_images_user = "SELECT * from images, post where images.PostID = post.PostID and post.UserID= " . $userID .  ";";
        $result_images_user = mysqli_query($connection, $sql_images_user);
        if (mysqli_num_rows($result_images_user) > 0) {
            $this->closeDb($connection);
            return mysqli_fetch_all($result_images_user, MYSQLI_ASSOC);
        }
    }

    public function viewFriend ($userID) {
        $connection = $this->connectDb();
        $queryFriends = "SELECT * FROM user_profile, friend_ship 
                        WHERE (friend_ship.User1ID = UserID OR friend_ship.User2ID = UserID)
                        AND UserID != $userID
                        AND (friend_ship.User1ID = $userID OR friend_ship.User2ID = $userID) 
                        AND friend_ship.Active=1
                        GROUP BY UserID;";
        $resultFriends = mysqli_query($connection, $queryFriends);
        if (mysqli_num_rows($resultFriends) > 0) {
            $this->closeDb($connection);
            return mysqli_fetch_all($resultFriends, MYSQLI_ASSOC);
        }
    }
    public function getFriendImage($FriendID){
        $connection = $this->connectDb();
        $sql_img = "SELECT * from images, post, user_profile where images.PostID = post.PostID and post.UserID = user_profile.UserID 
        and user_profile.UserID = '" . $FriendID . "' LIMIT 6;"; // max 6
        $result_img = mysqli_query($connection, $sql_img);
        if (mysqli_num_rows($result_img) > 0) {
            $this->closeDb($connection);
            return mysqli_fetch_all($result_img, MYSQLI_ASSOC);
        }
    }
    public function getFriendsFriend($friendId)
    {
        $connection = $this->connectDb();
        $queryFriends = "SELECT *, count(User1ID) as countFriend FROM user_profile, friend_ship
            WHERE (friend_ship.User1ID = UserID OR friend_ship.User2ID = UserID) AND friend_ship.Active=1
            AND UserID != '" . $friendId . "'
            AND (friend_ship.User1ID = '" . $friendId . "' OR friend_ship.User2ID = '" . $friendId . "')  
            GROUP BY UserID LIMIT 6;"; /*limit 6 nguoi bann*/
        $resultFriends = mysqli_query($connection, $queryFriends);

        if (mysqli_num_rows($resultFriends) > 0) {
            $this->closeDb($connection);
            return mysqli_fetch_all($resultFriends, MYSQLI_ASSOC);
        }
    }
    public function getFriendPost($friendID){
        $connection = $this->connectDb();
        $sql = "SELECT * from post, user_profile WHERE post.UserID = user_profile.UserID AND user_profile.UserID = '" . $friendID . "' GROUP BY post.PostID ORDER BY post.PostID DESC";
        //Người đăng nhậpp-->
        $result_news = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result_news) > 0) {
            $this->closeDb($connection);
            return mysqli_fetch_all($result_news, MYSQLI_ASSOC);
        }
    }
    
    public function getLikeModel($postid) {
        $connection = $this->connectDb();
        $sql = "SELECT COUNT(PostID) from like_action where PostID= $postid and UserID= $this->UserID";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            $islike = (mysqli_fetch_assoc($result)['COUNT(PostID)']==1);
            $this->closeDb($connection);
            return $islike;
        }
    }

    public function likeProcess ($postId) {
        $isLiked = $this->getLikeModel($postId);
        $connection = $this->connectDb();
        if($isLiked) {
            $sql = "DELETE from like_action where PostID= $postId and UserID= $this->UserID";
            $result = mysqli_query($connection, $sql);
        } else {
            $sql1 = "INSERT into like_action (PostID, UserID) values(" .$postId. ", ".$this->UserID.")";
            $result = mysqli_query($connection, $sql1);
        }

        $this->closeDb($connection);
    }

    public function getLikeNumber($postid) {
        $connection = $this->connectDb();
        $sql = "SELECT COUNT(PostID) from like_action where PostID= $postid";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            $likeNumber = (mysqli_fetch_assoc($result)['COUNT(PostID)']);
            $this->closeDb($connection);
            return $likeNumber;
        }
    }
    // public function

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

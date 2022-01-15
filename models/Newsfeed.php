<?php
require_once 'configs/db.php';
class Newsfeed
{
    private $UserID;

    function __construct($UserID)
    {
        $this->UserID = $UserID;
    }
    public function index()
    {
        $connection = $this->connectDb();
        $querySelect = "SELECT * FROM post";
        $results = mysqli_query($connection, $querySelect);
        $posts = [];
        if (mysqli_num_rows($results) > 0) {
            $posts = mysqli_fetch_all($results, MYSQLI_ASSOC);
        }
        $this->closeDb($connection);

        return $posts;
    }
    public function getName()
    {
        $connection = $this->connectDb();
        $sql_user_ava = "SELECT CONCAT(UserFirstName, ' ', UserLastName) as UserName, UserAva FROM user_profile WHERE UserID =  '" . $this->UserID . "'";
        $result_user_ava = mysqli_query($connection, $sql_user_ava);
        $names = [];
        if (mysqli_num_rows($result_user_ava) > 0) {
            $names = mysqli_fetch_all($result_user_ava, MYSQLI_ASSOC);
        }
        $this->closeDb($connection);
        return $names;
    }
    public function getPost()
    {
        $connection = $this->connectDb();
        $sql = "SELECT PostID, Bang.UserID, UserName, PostCaption, PostTime, UserAva
                    from user_profile,
                        (SELECT *
                        FROM friend_ship INNER JOIN view_post
                        on UserID = User1ID or UserID = User2ID
                        WHERE (User1ID = '" . $this->UserID . "' or User2ID = '" . $this->UserID . "') AND Active = 1) as Bang
                    WHERE Bang.UserID != '" . $this->UserID . "' AND Bang.UserID = user_profile.UserID
                    ORDER BY PostTime DESC";                   //Người đăng nhập-->
        $result_news = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result_news) > 0) {
            $this->closeDb($connection);
            return mysqli_fetch_all($result_news, MYSQLI_ASSOC);
        }
    }
    public function getImgPost($postId)
    {
        $connection = $this->connectDb();
        $sql_img_content = "SELECT * FROM images INNER JOIN post ON post.PostID = images.PostID WHERE post.PostID=" . $postId;
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
    public function getComment($postId)
    {
        $connection = $this->connectDb();
        $sql_comment = "SELECT * from view_comment WHERE PostID =" . $postId;
        $result_comment = mysqli_query($connection, $sql_comment);
        if (mysqli_num_rows($result_comment) > 0) {
            $this->closeDb($connection);
            return mysqli_fetch_all($result_comment, MYSQLI_ASSOC);
        }
    }
    public function getFriend() {
        $connection = $this->connectDb();
        $sql_friend = "SELECT *
                    FROM(SELECT UserID, CONCAT(UserFirstName, ' ', UserLastName) as UserName, UserAva
                        FROM friend_ship INNER JOIN user_profile
                        on UserID = User1ID or UserID = User2ID
                        WHERE (User1ID = '" . $this->UserID . "' or User2ID = '" . $this->UserID . "') AND friend_ship.Active = 1) as Bang
                    WHERE UserID != '" . $this->UserID . "'"; //Người dùng đăng nhập
        $result_friend = mysqli_query($connection, $sql_friend);
        if (mysqli_num_rows($result_friend) > 0) {
            $this->closeDb($connection);
            return mysqli_fetch_all($result_friend, MYSQLI_ASSOC);
        }
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
    public function report($postId, $PostUserID){
        $connection = $this->connectDb();
        $sql_report_post = "UPDATE post SET Reported = 1 WHERE PostID = $postId";
        $sql_report_user = "UPDATE user_profile SET  Reported = Reported + 1 WHERE UserID = $PostUserID";
        $KQ1= mysqli_query($connection, $sql_report_post);
        $KQ2= mysqli_query($connection, $sql_report_user);
        $this->closeDb($connection);
        return ($KQ1 && $KQ2);
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

<?php
session_start();
$controller = isset($_GET['controller'])
? $_GET['controller'] : 'newsfeed';
echo $_SESSION['isLoginOk'];
if(!isset($_SESSION['isLoginOk'])) {
    $controller='login';
}
//lấy ra action
$action = isset($_GET['action']) ? $_GET['action'] :
    'index';
$controller = ucfirst($controller);
$fileController = $controller . "Controller.php";
$pathController = "controllers/$fileController";
if (!file_exists($pathController)) {
    $error = "Trang ban tim có vẻ khong tồn tại rồi bạn êiiii";
    header("location: views/templates/404page.php?error=$error");
}
require_once "$pathController";
$classController = $controller."Controller";
$object = new $classController();
if (!method_exists($object, $action)) {
    $error = "Trang ban tim có vẻ khong tồn tại rồi bạn êiiii";
    header("location: views/templates/404page.php?error=$error");
}
if ($controller === "Admin" || $controller === "Login"){
    $object->$action();
}
else {
    require_once "controllers/TemplateController.php";
    $templates = new TemplateController();
    $templates->header();
    $object->$action();
    $templates->footer();
}
?>

<?
    require_once $_SERVER["DOCUMENT_ROOT"].'/config/db.php';
    global $db;
    if ($db->connect_error) {
        die('Ошибка подключения (' . $mysqli->connect_errno . ')'.$mysqli->connect_error);
    }else{
        require_once $_SERVER["DOCUMENT_ROOT"].'/local/library/main.php'; 
        require_once $_SERVER["DOCUMENT_ROOT"].'/local/library/check.php';
    }
?>
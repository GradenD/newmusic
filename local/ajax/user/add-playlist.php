<?
    require_once $_SERVER["DOCUMENT_ROOT"].'/local/prolog.php';

    $ob = new User;
    $add = $ob->addUserPlaylist($_POST);
?>
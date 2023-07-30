<?
    require_once $_SERVER["DOCUMENT_ROOT"].'/local/prolog.php';

    $ob = new LoudingMusic;
    $load = $ob->loadUserMusic($_POST);
?>
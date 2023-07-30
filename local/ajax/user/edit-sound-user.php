<?
    require_once $_SERVER["DOCUMENT_ROOT"].'/local/prolog.php';

    $ob = new LoudingMusic;
    $edit = $ob->EditUserMusic($_POST);
?>
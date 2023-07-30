<?
    require_once $_SERVER["DOCUMENT_ROOT"].'/local/prolog.php';

    $ob = new LoudingMusic;
    $del = $ob->DellUserMusic($_POST["id"]);
?>
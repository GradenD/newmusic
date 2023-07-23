<?
    require_once $_SERVER["DOCUMENT_ROOT"].'/local/prolog.php';

    $ob = new Favorite;
    $favorite = $ob->favorite($_POST["type"], $_POST["id"]);
?>
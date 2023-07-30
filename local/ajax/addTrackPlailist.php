<?
    require_once $_SERVER["DOCUMENT_ROOT"].'/local/prolog.php';;
?>

<?
	$ob = new Album;
	$album = $ob->addTrackAlbum($_POST["id"], $_POST["play"], $_POST["autor"], $_POST["table"]);
?>
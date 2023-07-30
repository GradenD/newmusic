<?require_once $_SERVER["DOCUMENT_ROOT"].'/local/tmp/headerProfile.php';?>


<?
    if(!empty($_GET["id"]) || !empty($_GET["idUser"])){
        ?>
            <?require_once $_SERVER["DOCUMENT_ROOT"].'/users/globals/playlist/detali.php';?>
        <?
    }else{
        ?>
            <?require_once $_SERVER["DOCUMENT_ROOT"].'/users/globals/playlist/section.php';?>
        <?
    }
?>

<?require_once $_SERVER["DOCUMENT_ROOT"].'/local/tmp/footerProfile.php'?>
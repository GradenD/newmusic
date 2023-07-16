<?
    require_once $_SERVER["DOCUMENT_ROOT"].'/local/prolog.php';;
?>

<?
    $ob = new User;
    $login = $ob->login($_POST);
    
    echo "<pre>";
    print_r($login);
    echo "</pre>";

    if(!$login["STATUS"]){
        echo "error";
    }
?>
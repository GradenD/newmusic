<?
    require_once $_SERVER["DOCUMENT_ROOT"].'/local/prolog.php';;
    
    $ob = new User;
    $login = $ob->saveProfile($_POST);
    
    if(is_array($login)){
        echo "<br>";
        echo $login["MESSAGE"];;
        echo "<br>";
    }
?>
<?
    require_once $_SERVER["DOCUMENT_ROOT"].'/local/prolog.php';;
    
    $ob = new User;
    $login = $ob->login($_POST);
    
    if(is_array($login)){
        if(!$login["STATUS"]){
            echo "<br>";
            echo $login["MESSAGE"];
            echo "<br>";
        }else{
            echo "true";
        }
    }else{
        echo "<br>";
        echo "error";
        echo "<br>";
    }
?>
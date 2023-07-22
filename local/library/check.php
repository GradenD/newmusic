<?php
    $auth=false;
    $admin=false;
    global $db;
    global $auth;
    global $admin;  
    global $userArray; 
    if(isset($_COOKIE['email']) && isset($_COOKIE['SESSID'])){
        $email=$_COOKIE['email'];
        $session=$_COOKIE['SESSID'];
        $result=$db->query("SELECT * FROM user WHERE email='$email'");
        if($result){
            $usr=$result->fetch_assoc();
            if(!empty($usr)){
                if($session==md5($email.$usr['password'])){
                    $auth=true;
                    if($usr['role'] == '1'){
                        $admin=true;
                    }
                }
                
            }
        }
    }

    if($auth){
        $userArray = $usr;
    }

    if($userArray){
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        $url = $url[0];
        if($url == "/login/"){
            header("Location: /index.php");
        }
    }
?>
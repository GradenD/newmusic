<?php
    $auth=false;
    $admin=false;
    global $db;
    global $auth;
    global $admin;
    
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
        
        global $userArray;
        $userArray = $usr;

    }
?>
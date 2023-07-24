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
                $auth=true;
                if($usr['role'] == '1'){
                    $admin=true;
                }             
            }
        }
    }

    if($auth){

        $prifileName = "";
        if($usr["lastname"]){
            $prifileName = $usr["lastname"];
        }

        if($usr["name"]){
            $prifileName = $prifileName.' '.$usr["name"];
        }

        $usr["prifileName"] = $prifileName;

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
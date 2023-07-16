<?php
    function dump($arr){
        echo "<pre>".print_r($arr, true)."</pre>";
    }

    class User {

        public static function userCheck($email){

            global $db;
            $login = $db->query("SELECT * FROM user WHERE email='$email'"); 
            $myrow = $login->fetch_assoc();

            return $myrow;

        }

        public static function login($post){

            $email = $post["email"];
            $password = $post["password"];

            if($email && $password){

                $otvet = array(
                    "MESSAGE" => "",
                    "STATUS" => false,
                );

                $myrow = static::userCheck($email);

                if(!empty($myrow)){
    
                    $hash = md5($password . $salt);
                    
                    if($hash == $myrow['password']){
    
                        setcookie('email', $myrow['email'], time()+3600*24*365, '/');
                        setcookie('SESSID', md5($myrow['email'].$myrow['password']),time()+3600*24*365, '/');
    
                        $otvet["STATUS"] = true;
    
                    }else{
    
                        $otvet["MESSAGE"] = 'Неверный логин или пароль';
    
                    }
    
                }else{
    
                    $otvet["MESSAGE"] = 'Email не найден!';
    
                }

            }else{

                $otvet["MESSAGE"] = 'ERROR';

            }

            return $otvet;

        }

        public static function register($post){

            $name = $post;
            $email = $post;
            $password = $post;
            $confirm = $post;

            global $db;
            $myrow = static::userCheck($email);
            $otvet = array(
                "ID" => "",
                "MESSAGE" => "",
            );

            if (!empty($myrow['id'])){

                $otvet["MESSAGE"] = 'Email занят';

            }else{

                if ($password == $confirm){
                    if (preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $email)) {
                        $pass = md5($password . $salt);
                        $query = $db->prepare("
                            INSERT INTO user(name, email, password) VALUES (?, ?, ?)
                        ");
                        $query->bind_param("sss", $name, $email, $pass);
                        $query->execute();
                        if ($query){
                            $otvet["MESSAGE"] = 'Вы успешно зарегистрированны!';
                        }else{
                            $otvet["MESSAGE"] = 'При регистрации возникла ошибка!';
                        }
                    }else{
                        $otvet["MESSAGE"] = 'Адрес указан не правильно.';
                    }
                }else{
                    $otvet["MESSAGE"] = 'Пароли не совпадают!';
                }

            }

            return $otvet;
        }

    }

    class Music {

        public static $ripMusic = "/upload/music/";
        public static $ripPoster = "/upload/img/";

        public static function musicArray($limit){

            global $db;
            $q = $db->query("SELECT * FROM music_autor ORDER BY listening DESC LIMIT 10");

            if($q) {
                $music = array();

                $ripPoster = self::$ripPoster;
    
                $arr = [];
                while($r=$q->fetch_assoc()){
                    $arr[]=$r;
                } 
            }

            return $arr;

        }

        public static function autorArray($id){
            global $db;
            $q = $db->query("SELECT * FROM author WHERE id IN ($id);"); 
            $autor = [];
            if($q) {
                while($r=$q->fetch_assoc()){
                    $autor[$r["id"]]=$r;
                } 
            }

            return $autor;
        }

        public static function recomend($limit){

            $arr = static::musicArray($limit);
            $music = array();

            if($arr) {

                $ripMusic = self::$ripMusic;
                $ripPoster = self::$ripPoster;

                foreach($arr as $key => $value){

                    $autorArray[$key] = $value['autor'];
                
                }

                $idAutor = join(',', $autorArray);
                $autorArray = static::autorArray($idAutor);

                foreach($arr as $key => $value){
                    $emp = $autorArray[$value['autor']];
                    $music[] = array(
                        "id" => $value["id"],
                        "title" => $value["tytle"],
                        "artist" => $emp,
                        "mp3" => $ripMusic.$value["mp3"],
                        "poster" => $ripPoster.'music/'.$value["img"],
                    );

                }

            }

            return $music;
        }

    }
?>
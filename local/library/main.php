<?php
    function dump($arr){
        echo "<pre>".print_r($arr, true)."</pre>";
    }

    class User {

        public static function logout(){
            setcookie('email','', time()-3600, '/');
            setcookie('SESSID', '', time()-3600, '/');
        }

        public static function userCheck($email){

            global $db;
            $login = $db->query("SELECT * FROM user WHERE email='$email'"); 
            $myrow = $login->fetch_assoc();

            return $myrow;

        }

        public static function setCookieUser($myrow){
            setcookie('email', $myrow['email'], time()+3600*24*365, '/');
            setcookie('SESSID', md5($myrow['email'].$myrow['password']),time()+3600*24*365, '/');
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
    
                    $hash = md5($password);
                    
                    if($hash == $myrow['password']){
    
                        $setCookie = static::setCookieUser($myrow);
    
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

            $name = $post["name"];
            $email = $post["email"];
            $password = $post["password"];
            $confirm = $post["confirm-password"];

            global $db;
            $myrow = static::userCheck($email);

            $otvet = array(
                "MESSAGE" => "",
                "STATUS" => false,
            );

            if (!empty($myrow['id'])){

                $otvet["MESSAGE"] = 'Email занят';

            }else{

                if ($password == $confirm){
                    $pass = md5($password);
                    $query = $db->prepare("
                        INSERT INTO user(name, email, password) VALUES (?, ?, ?)
                    ");
                    $query->bind_param("sss", $name, $email, $pass);
                    $query->execute();
                    
                    if ($query){
                        $otvet["MESSAGE"] = 'Вы успешно зарегистрированны!';
                        $otvet["STATUS"] = true;
                        
                        $myrow = static::userCheck($email);
                        $setCookie = static::setCookieUser($myrow);                     
                    }else{
                        $otvet["MESSAGE"] = 'При регистрации возникла ошибка!';
                    }
                }else{
                    $otvet["MESSAGE"] = 'Пароли не совпадают!';
                }

            }

            return $otvet;
        }

    }

    class Album {

        public static $ripMusic = "/upload/music/";
        public static $ripPoster = "/upload/img/";

        public static function AlbumItogArray($albom, $autor){
            $ob = new Music;
            $autor = $ob->autorArray($autor); 

            $arr["albom"] = $albom;
            $arr["autor"] = $autor;
            return $arr;
        }

        public static function NewAlbum($l){
            global $db;
            $q = $db->query("SELECT * FROM album WHERE new=1 LIMIT $l");
            if($q) {
                while($r=$q->fetch_assoc()){
                    $albom[]=$r;
                    $autor[] = $r["autor"];
                } 
            }

            $arr = static::AlbumItogArray($albom, $autor);

            return $arr;
        }

        public static function IndexAlbum($l){
            global $db;
            $q = $db->query("SELECT * FROM album WHERE indexPage=1 LIMIT $l");
            if($q) {
                while($r=$q->fetch_assoc()){
                    $albom[]=$r;
                    $autor[] = $r["autor"];
                } 
            }

            $arr = static::AlbumItogArray($albom, $autor);

            return $arr;
        }

    }

    class Music {

        public static $ripMusic = "/upload/music/";
        public static $ripPoster = "/upload/img/";

        public static function sborkaMusic($arr){

            if($arr) {

                $ripMusic = self::$ripMusic;
                $ripPoster = self::$ripPoster;

                foreach($arr as $key => $value){

                    $autorArray[$key] = $value['autor'];
                
                }

                $autorArray = static::autorArray($autorArray);

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

        public static function MusicItogArray($q){
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

        public static function ChartMusicArray($limit){
            global $db;
            $q = $db->query("SELECT * FROM music_autor ORDER BY id DESC LIMIT $limit");

            if($q) {

                $arr = static::MusicItogArray($q);

            }

            return $arr;
        }

        public static function RecomendMusicArray($limit){
            global $db;
            $q = $db->query("SELECT * FROM music_autor ORDER BY id DESC LIMIT $limit");

            if($q) {

                $arr = static::MusicItogArray($q);

            }

            return $arr;
        }

        public static function TreadingMusicArray($limit){

            global $db;
            $q = $db->query("SELECT * FROM music_autor ORDER BY listening DESC LIMIT $limit");

            if($q) {

                $arr = static::MusicItogArray($q);

            }

            return $arr;

        }

        public static function NewMusicArray($limit){

            global $db;
            $q = $db->query("SELECT * FROM music_autor ORDER BY id DESC LIMIT $limit");
            if($q) {

                $arr = static::MusicItogArray($q);

            }

            return $arr;

        }

        public static function autorArray($autorArray){
            global $db;
            $id = join(',', $autorArray);
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

            $arr = static::RecomendMusicArray($limit);
            $music = array();

            $music = static::sborkaMusic($arr);

            return $music;
        }

        public static function treading($limit){

            $arr = static::TreadingMusicArray($limit);
            $music = array();

            $music = static::sborkaMusic($arr);

            return $music;
        }

        public static function newMusic($limit){

            $arr = static::NewMusicArray($limit);
            $music = array();

            $music = static::sborkaMusic($arr);

            return $music;
        }

    }
?>
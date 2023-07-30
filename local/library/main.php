<?php
    function dump($arr){
        echo "<pre>".print_r($arr, true)."</pre>";
    }

    class LoudingMusic {

        public static function loadUserMusic($post){
            
            global $db;
            global $usrId;

            global $userArray;
            $usrId = $userArray["id"];

            $tytle = $_POST['tytleTrack'];
            $artist = $_POST['artist'];
            $poster = $_POST['poster-otvet'];

            $url = '/upload/music/'.$_POST['url'];
            $poster = '/upload/img/music/'.$poster;

            if(!empty($_POST['music_autor'])){
                $query=$db->query("
                    INSERT INTO music_autor (tytle, autor, mp3, img) VALUES ('$tytle', '$artist', '$url', '$poster')
                ");
            }else{
                $query=$db->query("
                    INSERT INTO music_profile (user, url, img, tytle, autor) VALUES ('$usrId', '$url', '$poster', '$tytle', '$artist')
                ");
            }
        
            if ($query){
                echo "Complite!";
            }else{
                echo 'ERROR!';
            }

        }

        public static function EditUserMusic($post){

            global $db;

            $id = $post["id"];
            $tytle = $_POST['tytleTrack'];
            $artist = $_POST['artist'];
            $poster = $_POST['poster-otvet'];

            $poster = '/upload/img/music/'.$poster;

            if(!empty($_POST['music_autor'])){
                $c=$db->query("UPDATE `music_autor` SET tytle='$tytle', autor='$artist', img='$poster' WHERE id='$id' ");
            }else{
                $c=$db->query("UPDATE `music_profile` SET tytle='$tytle', autor='$artist', img='$poster' WHERE id='$id' ");
            }
        }

        public static function DellUserMusic($id){

            global $db;
            $c=$db->query("DELETE FROM `music_profile` WHERE id='$id'");

        }

    }

    class Autor {

        public static function AutorAll(){

            global $db;
            global $userArray;
            $usrId = $userArray["id"];

            $arr = array();

            $q = $db->query("SELECT * FROM author");
            while($r=$q->fetch_assoc()){
                $arr[]= $r;
            }

            return $arr;

        }

    }

    class User {

        public static $ripMusic = "/upload/music/";
        public static $ripPoster = "/upload/img/";

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

        public static function musicUsers($limit){

            $ripMusic = self::$ripMusic;
            $ripPoster = self::$ripPoster;

            global $db;
            global $userArray;
            $usrId = $userArray["id"];
            $arr = array();

            $q = $db->query("SELECT * FROM music_profile WHERE user='$usrId'");
            $music = $q->num_rows;;
            if($music > 0){
                while($r=$q->fetch_assoc()){
                    $arr[]= array(
                        "id" => $r["id"],
                        "user" => true,
                        "tytle" => $r["tytle"],
                        "artist" => $r['autor'],
                        "mp3" => $r["url"],
                        "poster" => $r["img"],
                        "typeTrack" => "user",
                    );
                }
            }

            $ob = new Favorite;
            $musicAutor = $ob->favoriteArray("track");
            if($musicAutor){
                $arr = array_merge($musicAutor, $arr);
            }

            return $arr;

        }

        public static function albumUsers($limit, $favorite = true){

            $ripMusic = self::$ripMusic;
            $ripPoster = self::$ripPoster;

            global $db;
            global $userArray;
            $usrId = $userArray["id"];
            $arr = array();

            $q = $db->query("SELECT * FROM album_user WHERE user='$usrId'");
            $i = 0;
            if($q) {
                while($r=$q->fetch_assoc()){
                    $arr[$i]=$r;
                    $arr[$i]["type"] = "album_user";
                    $i++;
                }
            }

            if($favorite){

                $ob = new Favorite;
                $musicAutor = $ob->favoriteArray("album");
                if($musicAutor){
    
                    $arrNew = array_merge($musicAutor["albom"], $arr);
                    $musicAutor["albom"] = $arrNew;
    
                    $arr = $musicAutor;
    
                }else{
                    $arr["albom"] = $arr;
                }
                
            }else{
                $arr["albom"] = $arr;
            }

            return $arr;

        }

        public static function saveProfile($post){

            $name = $post["name"];
            $lastName = $post["lastName"];

            global $db;
            global $userArray;
            $usrId = $userArray["id"];

            $otvet = array(
                "MESSAGE" => "",
                "STATUS" => false,
            );

            if($usrId){

                $c=$db->query("UPDATE `user` SET name='$name', lastname='$lastName' WHERE id='$usrId' ");

                $otvet["STATUS"] = true;
                $otvet["MESSAGE"] = "Профиль сохранен!";

            }else{

                $otvet["MESSAGE"] = "Произошла ошибка";

            }

            return $otvet;
        }

        public static function changePasword($post){

            $newPas = $post['new-password'];
            $confirm = $post['new-password-confirm'];
            $password = $post['old-password'];

            $hash = md5($password);

            global $db;
            global $userArray;
            $usrId = $userArray["id"];

            $otvet = array(
                "MESSAGE" => "",
                "STATUS" => false,
            );

            if($usrId){

                if($newPas == $confirm){

                    if($hash == $userArray['password']){

                        $new = md5($newPas);
                        $c=$db->query("UPDATE `user` SET password='$new' WHERE id='$usrId' ");
    
                        $otvet["STATUS"] = true;
                        $otvet["MESSAGE"] = "Профиль сохранен!";
    
                    }else{
    
                        $otvet["MESSAGE"] = "Пароль не верный!";
    
                    }

                }else{
                    $otvet["MESSAGE"] = "Пароли не совпадают!";
                }

            }else{

                $otvet["MESSAGE"] = "Произошла ошибка";

            }

            return $otvet;
        }

        public static function countUsersTrack(){

            global $db;
            global $userArray;
            $usrId = $userArray["id"];

            $q = $db->query("SELECT * FROM music_profile WHERE user='$usrId'");

            $count = $q->num_rows;

            $ob = new Favorite;
            $musicAutor = $ob->favoriteArray("track");
            if(is_array($musicAutor)){
                $x = count($musicAutor);
                $count = $count + $x;
            }

            return $count;
        }

        public static function countUsersAlbum(){

            global $db;
            global $userArray;
            $usrId = $userArray["id"];

            $q = $db->query("SELECT * FROM album_user WHERE user='$usrId'");

            $count = $q->num_rows;

            $ob = new Favorite;
            $musicAutor = $ob->favoriteArray("album");
            if(is_array($musicAutor)){
                $x = count($musicAutor);
                $count = $count + $x;
            }

            return $count;

        }

        public static function addUserPlaylist($post){

            global $db;
            global $usrId;

            global $userArray;
            $usrId = $userArray["id"];

            $tytle = $_POST['tytlePlaylist'];
            $artist = $_POST['artist'];
            $poster = $_POST['poster-otvet'];

            $poster = '/upload/img/music/'.$poster;
        
            $query=$db->query("
                INSERT INTO album_user (tytle, autor, user, img) VALUES ('$tytle', '$artist', '$usrId', '$poster')
            ");
            if ($query){
                echo "Complite!";
            }else{
                echo 'ERROR!';
            }

        }

    }

    class Favorite {

        public static function editFavorite($type, $arrProfile){

            global $db;
            global $userArray;
            $usrId = $userArray["id"];

            if($arrProfile){
                
                $str = implode(",", $arrProfile);

                if($type == "track"){
                    $action = $db->query("UPDATE `user` SET likeMusic='$str' WHERE id='$usrId'");
                }

                if($type == "album"){
                    $action = $db->query("UPDATE `user` SET likeAlbum='$str' WHERE id='$usrId'");
                }
            
            }

        }

        public static function typeFavoriteArray($type){

            global $userArray; 

            if($type == "album"){
                $arr = $userArray["likeAlbum"];
            }

            if($type == "track"){
                $arr = $userArray["likeMusic"];
            }

            if($arr){
                $arr = explode(',', $arr);
            }
            

            if(!is_array($arr)){
                $arr = array();
            }

            return $arr;
        }

        public static function favorite($type, $id){

            global $userArray;

            $arr = static::typeFavoriteArray($type);

            if(!empty($arr)){
                $key = array_search($id, $arr);
                if ($key == "") {
                    $arr[] = $id;
                }else{
                    unset($arr[$key]);
                }

            }else{

                $arr[] = $id;

            }

            $ob = new User;
            $music = static::editFavorite($type, $arr);

        }

        public static function favoriteArray($type){

            global $db;
            global $userArray;
            $usrId = $userArray["id"];

            $arr = static::typeFavoriteArray($type);

            if($type == "track"){
                $ob = new Music; 
                $music = $ob->musicArray($arr);
            }

            if($type == "album"){
                $ob = new Album; 
                $music = $ob->AlbumId($arr);
            }

            return $music ;
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

        public static function trackAlbum($id, $table = "album"){

            if($table == "album"){
                $type = "music_autor";
            }

            if($table == "album_user"){
                $type = "music_profile";
            }

            global $db;
            $ob = new Music;
            $music = $ob->musicArray($id, $type);

            return $music;

        }

        public static function sborkaAlbum($q, $table="album"){
            $autor = array(); 
            if($q) {
                while($r=$q->fetch_assoc()){
                    $albom[]=$r;
                    if($table == "album"){
                        $autor[] = $r["autor"];
                    }
                } 
            }

            $arr = static::AlbumItogArray($albom, $autor);

            return $arr;
        }

        public static function IdAlbum($id, $table = "album"){
            global $db;
            $q = $db->query("SELECT * FROM $table WHERE id=$id");

            $arr = static::sborkaAlbum($q, $table);
            if(!empty($arr["autor"])){
                if(is_array($arr["autor"])){
                    $arr["albom"][0]["autor"] = $arr["autor"][$arr["albom"][0]["autor"]];
                }
            }
            $itog["albom"] = $arr["albom"][0];

            if($table = "album"){
                $itog["track"] = $itog["albom"]["music_autor"];
            }

            if($table = "album_user"){
                $itog["track"] = $itog["albom"]["music_profile"];
            }

            $itog["track"] = static::trackAlbum($itog["track"], $table);

            /* пользовательский альбом и треки с основы */
            if($table = "album_user" && $itog["albom"]["music_autor"]){
                $track = $itog["albom"]["music_autor"];
                $track = static::trackAlbum($track, "album");
                if(!empty($track)){
                    if(is_array($track)){
                        $itog["track"] = array_merge($track, $itog["track"]);
                    }
                }
            }

            return $itog; 
        }

        public static function AllAlbum($l){
            global $db;
            $q = $db->query("SELECT * FROM album LIMIT $l");

            $arr = static::sborkaAlbum($q);

            return $arr;
        }

        public static function NewAlbum($l){
            global $db;
            $q = $db->query("SELECT * FROM album WHERE new=1 LIMIT $l");

            $arr = static::sborkaAlbum($q);

            return $arr;
        }

        public static function AlbumId($user){
            global $db;

            $arr = array();
            if($user){
                $id = join(',', $user);
                $q = $db->query("SELECT * FROM album WHERE id IN ($id);");
    
                if($q) {
                    while($r=$q->fetch_assoc()){
                        $albom[]=$r;
                        $autor[] = $r["autor"];
                    } 
                }
    
                $arr = static::AlbumItogArray($albom, $autor);
            }

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

        public static function addTrackAlbum($id, $play, $autor = "autor", $table = "album"){
            global $db;

            if($autor == "autor"){
                $pole = "music_autor";
            }

            if($autor == "user"){
                $pole = "music_profile";
            }

            $arr = static::IdAlbum($play);
            //dump($arr["albom"]);
            if($arr){
                if(!empty($arr["albom"][$pole])){
                    if(is_array($arr["albom"][$pole])){
                        $arr = explode(',', $arr["albom"][$pole]);
                    }else{
                        $tracks[] = $arr["albom"][$pole]; 
                    }
                    $tracks[] = $id;
                }else{
                    $tracks = $id;
                }
            }
            //dump($tracks);
            if(is_array($tracks)){
                $tracks = join(',', $tracks);
            }

            //dump($tracks);

            $c=$db->query("UPDATE `$table` SET `$pole`='$tracks' WHERE id='$play' ");
        }

    }

    class Music {

        public static $ripMusic = "/upload/music/";
        public static $ripPoster = "/upload/img/";

        public static function sborkaMusic($arr, $typeTrack = "autor", $autor = true){
            $music = array();
            if($arr) {

                $ripMusic = self::$ripMusic;
                $ripPoster = self::$ripPoster;

                foreach($arr as $key => $value){

                    $autorArray[$key] = $value['autor'];
                
                }

                if($autor){
                    $autorArray = static::autorArray($autorArray);
                }

                foreach($arr as $key => $value){

                    if($autor){
                        $emp = $autorArray[$value['autor']];
                    }else{
                        $emp["name"] = $value["autor"];
                    }

                    if(!empty($value["mp3"])){
                        $url = $value["mp3"];
                    }
                    if(!empty($value["url"])){
                        $url = $value["url"];
                    }

                    $music[] = array(
                        "id" => $value["id"],
                        "title" => $value["tytle"],
                        "artist" => $emp,
                        "mp3" => $url,
                        "poster" => $value["img"],
                        "typeTrack" => $typeTrack,
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
                $i = 0;
                while($r=$q->fetch_assoc()){
                    $arr[$i]=$r;
                    $i++;
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
            $autor = array();
            if($autorArray){
                $id = join(',', $autorArray);
                $q = $db->query("SELECT * FROM author WHERE id IN ($id);"); 
                $autor = [];
                if($q) {
                    while($r=$q->fetch_assoc()){
                        $autor[$r["id"]]=$r;
                    } 
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

        public static function musicArrayItog($id, $type){

            global $db;

            if(is_array($id)){
                $id = join(',', $id);
            }

            $arr = array();

            if($id){
                $q = $db->query("SELECT * FROM $type WHERE id IN ($id);");
                if($q) {
    
                    $arr = static::MusicItogArray($q);
    
                }
            }

            return $arr;
        }

        public static function musicArray($id, $type = "music_autor"){
            $arr = static::musicArrayItog($id, $type);

            $music = array();
            if($type == "music_autor"){

                $music = static::sborkaMusic($arr);

            }else{
                $music = static::sborkaMusic($arr, $type, $autor = false);
            }

            return $music;
        }

    }
?>
<?
    require_once $_SERVER["DOCUMENT_ROOT"].'/local/prolog.php';

    $table = "";
    $id = "";

    if(!empty($_REQUEST["id"])){
      $id = $_REQUEST["id"];
    }

    if(!empty($_REQUEST["type"])){
      $table = $_REQUEST["type"];
    }

    if($table == "album"){
      $ob = new Album;
      $playlist = $ob->IdAlbum($id, $table);
    }
    dump($playlist);
    if(!empty($playlist["track"])){
        ?>
            <script>
                var playlist = $( '.playlist' );
                var player = playlist.find('audio, video')[0].player;
                <?
                    foreach ($playlist["track"] as $key => $value) {
                        if(!empty($value["artist"]["name"])){
                            $artist = $value["artist"]["name"];
                        }else{
                            $artist = "";
                        }
                        if(!empty($value["mp3"])){
                            ?>
                                var obj = {
                                    meta: {
                                        author: "<?=$artist?>",
                                        authorlink : ""
                                    },
                                    src: "<?=$value["mp3"]?>",
                                    thumb: {
                                        src: "<?=$value["poster"]?>",
                                    },
                                    title: "<?=$value["title"]?>",
                                    link: "",
                                    id: "<?=$value["id"]?>",
                                };
                                player.mepAdd(obj, true);
                            <?
                        }
                    }
                    
                ?>
            </script>
        <?
    }
?>
<div class="row m-b">
    <?
        $ob = new USer;
        $music = $ob->albumUsers(100);
        //dump($music);
        if($music){
            foreach ($music["albom"] as $key => $value) {
                $autor = "";
                if(!empty($music["autor"])){
                    if(!empty($music["autor"][$value["autor"]])){
                        if(is_array($music["autor"][$value["autor"]])){
                            $autor = $music["autor"][$value["autor"]];
                        }
                    }
                }

                $typeId = "id";
                if(!empty($value["type"])){
                    if($value["type"]){
                        $typeId = "idUser";
                    }
                }
                ?>

                    <div class="col-xs-4 col-sm-4 col-md-3">
                        <div class="item r" data-id="item-2" data-src="http://api.soundcloud.com/tracks/259445397/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                            <div class="item-media ">
                                <a href="/users/globals/playlist/?<?=$typeId?>=<?=$value["id"]?>" class="item-media-content" style="background-image: url('<?=$value["img"]?>"></a>
                                <div class="item-overlay center">
                                    <button data-album data-id="<?=$value["id"]?>" data-type="<?=$typeId?>"  class="btn-playpause">Play</button>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="item-title text-ellipsis">
                                    <a href="/users/globals/playlist/?<?=$typeId?>=<?=$value["id"]?>"><?=$value["tytle"]?></a>
                                </div>
                                <?
                                    if($autor){
                                        ?>
                                            <div class="item-author text-sm text-ellipsis hide">
                                                <a href="artist.detail.html" class="text-muted"><?=$autor["name"]?></a>
                                            </div>
                                        <?
                                    }
                                ?>
                                <div class="item-meta text-sm text-muted">
                                <span class="item-meta-stats text-xs ">
                                    <i class="fa fa-play text-muted"></i> 30 
                                    <i class="fa fa-heart m-l-sm text-muted"></i> 10
                                </span>
                                </div>
                
                
                            </div>
                        </div>
                    </div>
                <?
            }
        }
    ?>

</div>
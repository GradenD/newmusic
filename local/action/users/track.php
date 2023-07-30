<div class="row item-list item-list-by m-b">
    <?

        $ob = new User;
        $music = $ob->musicUsers(10);

        if($music){

            foreach ($music as $key => $value) {
                //dump($value);
                if(is_array($value['artist'])){
                    $artist = $value['artist']['name'];
                }else{
                    $artist = $value['artist'];
                }

                $tytle = "";
                if(!empty($value['title'])){
                    $tytle = $value['title'];
                }

                if(!empty($value['tytle'])){
                    $tytle = $value['tytle'];
                }

                $type = "";
                if(!empty($value["typeTrack"])){
                    $type = $value["typeTrack"];
                }
                ?>
                    <div class="col-xs-12" data-parent="<?=$value["id"]?>">            
                        <div class="item r" data-id="<?=$value["id"]?>" data-src="<?=$value["mp3"]?>">
                            <div class="item-media ">
                                <a href="track.detail.html" class="item-media-content" style="background-image: url('<?=$value["poster"]?>');"></a>
                                <div class="item-overlay center">
                                    <button  class="btn-playpause">Play</button>
                                </div>
                            </div>
                            <div data-info class="item-info">
                                <div class="item-overlay bottom text-right">
                                    <?
                                        if(empty($value['user'])){
                                            ?>
                                                <a href="#" class="btn-favorite">
                                                    <i class="fa fa-heart-o"></i>
                                                </a>
                                            <?
                                        }
                                    ?>
                                    <a href="javascript:void(0);" data-id="<?=$value["id"]?>" data-autor="<?=$type?>" class="btn-more" data-toggle="dropdown">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </a>
                                    <div class="dropdown-menu pull-right black lt"></div>
                                </div>
                                <div class="item-title text-ellipsis">
                                    <a href="track.detail.html"> <?=$artist?> - <?=$tytle?></a>
                                </div>
                                <div class="item-author text-sm text-ellipsis hide">
                                    <a href="artist.detail.html" class="text-muted">Postiljonen</a>
                                </div>
                                <div class="item-meta text-sm text-muted">
                                    <span class="item-meta-category">
                                        <a href="browse.html" class="label">Soul</a>
                                    </span>
                                    <span class="item-meta-date text-xs">02.04.2016</span>
                                </div>
                
                                <div class="item-except visible-list text-sm text-muted h-2x m-t-sm">
                                    Litatem tantae pecuniae? Utram tandem linguam nescio? Sed hoc sane concedamus.
                                </div>

                                <?
                                    if(!empty($value['user'])){
                                        if($value['user']){
                                            ?>
                                                <div class="item-action visible-list m-t-sm">
                                                    <a href="javascript:void(0)" data-edit="music" data-id="<?=$value["id"]?>" class="btn btn-xs white">Edit</a>
                                                    <a href="javascript:void(0)" data-del="music" data-id="<?=$value["id"]?>" class="btn btn-xs white" data-toggle="modal" data-target="#delete-modal">Delete</a>
                                                </div>
                                            <?
                                        }
                                    }
                                ?>

                            </div>

                            <div data-editblock class="item-info edit-block d-none"></div>

                        </div>
                    </div>
                <?

            }

        }

    ?>

</div>
<a href="#" class="btn btn-sm white rounded">Show More</a>
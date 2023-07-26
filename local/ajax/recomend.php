<?
    require_once $_SERVER["DOCUMENT_ROOT"].'/local/prolog.php';;
?>

<div class="d-flex block-column">

    <h2 class="widget-title h4 m-b">Recommand for you</h2>
	<div class="row item-list item-list-md m-b">
        <?
            $ob = new Music;
            $recomend = $ob->recomend(10);
            //dump($recomend);
			if($recomend){
				foreach ($recomend as $key => $value) {
					?>
						<div class="col-sm-6">
							<div class="item r" data-id="<?=$key?>" data-src="<?=$value["mp3"]?>">
								<div class="item-media ">
									<a href="track.detail.html" class="item-media-content" style="background-image: url('<?=$value["poster"]?>');"></a>
									<div class="item-overlay center">
										<button  class="btn-playpause">Play</button>
									</div>
								</div>
								<div class="item-info">
									<div class="item-overlay bottom text-right">
										<a href="javascript:void(0);" data-type="track" data-id="<?=$value["id"]?>" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
										<a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
										<div class="dropdown-menu pull-right black lt"></div>
									</div>
									<div class="item-title text-ellipsis">
										<a href="track.detail.html"><?=$value["title"]?></a>
									</div>
									<div class="item-author text-sm text-ellipsis ">
										<a href="artist.detail.html" class="text-muted"><?=$value["artist"]["name"]?></a>
									</div>
					
					
								</div>
							</div>
						</div>
					<?
				}
			}
        ?>
    </div>

</div>
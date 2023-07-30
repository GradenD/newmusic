<?require_once $_SERVER["DOCUMENT_ROOT"].'/local/tmp/headerProfile.php';?>

<?    
    if(!empty($_GET["id"])){
        if($_GET["id"]){
            $id = $_GET["id"];
            $table = "album";
        }
    }    

    if(!empty($_GET["idUser"])){
        if($_GET["idUser"]){
            $id = $_GET["idUser"];
            $table = "album_user";
        }
    }

	$ob = new Album;
	$album = $ob->IdAlbum($id, $table);

    $count = 0;
    if(!empty($album["track"])){
        if(is_array($album["track"])){
            $count = count($album["track"]);
        }
    }

    $autor = "";
    if(is_array($album["albom"]["autor"])){
        $autor = $album["albom"]["autor"]["name"];
    }else{
        $autor = $album["albom"]["autor"];
    }
?>

<div class="pos-rlt">
  <div class="page-bg" data-stellar-ratio="2" style="background-image: url('<?=$album["albom"]["img"]?>');"></div>
</div>
<div class="page-content">
  <div class="padding b-b">
    <div class="row-col">
        <div class="col-sm w w-auto-xs m-b">
          <div class="item w r">
            <div class="item-media">
              <div class="item-media-content" style="background-image: url('<?=$album["albom"]["img"]?>');"></div>
            </div>
          </div>
        </div>
        <div class="col-sm">
          <div class="p-l-md no-padding-xs">
            <div class="page-title">
              <h1 class="inline"><?=$album["albom"]["tytle"]?></h1>
            </div>
            <div class="item-meta">
              <a class="btn btn-xs rounded white">Pop</a> <a class="btn btn-xs rounded white">Happy</a>
            </div>
          </div>
        </div>
    </div>
  </div>

  <div class="row-col">
    <div class="col-lg-9 b-r no-border-md">
      <div class="padding">

          <h6 class="m-b">
            <span class="text-muted">by</span> 
            <a href="artist.detail.html" data-pjax class="item-author _600"><?=$autor?></a> 
            <span class="text-muted text-sm">- <?=$count?> song</span>
          </h6>
          <div id="tracks" class="row item-list item-list-xs item-list-li m-b">

                <?
                    if($count > 0 ){
                        if($album["track"]){
                            foreach ($album["track"] as $key => $value) {
                                ?>
    
                                    <div class="col-xs-12">
                                        <div class="item r" data-id="<?=$value["id"]?>" data-src="<?=$value["mp3"]?>">
                                            <div class="item-media ">
                                                <a href="track.detail.html" class="item-media-content" style="background-image: url('<?=$value["poster"]?>');"></a>
                                                <div class="item-overlay center">
                                                    <button  class="btn-playpause">Play</button>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-overlay bottom text-right">
                                                    <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                                    <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis">
                                                    <a href="track.detail.html"><?=$value["title"]?></a>
                                                </div>
                                                <div class="item-author text-sm text-ellipsis hide">
                                                    <a href="artist.detail.html" class="text-muted"><?=$value["artist"]["name"]?></a>
                                                </div>
                                
                                
                                            </div>
                                        </div>
                                    </div>
    
                                <?
                            }
                        }
                    }else{
                        ?>
                            В данном альбоме нет треков
                        <?
                    }
                ?>
                
          </div>
          
          

      </div>
    </div>
    <div class="col-lg-3 w-xxl w-auto-md">
      <div class="padding" style="bottom: 60px;" data-ui-jp="stick_in_parent">
      	<h6 class="text text-muted">5 Likes</h6>
      	<div class="row item-list item-list-sm m-b">
      		    <div class="col-xs-12">
      		    	<div class="item r" data-id="item-12" data-src="http://api.soundcloud.com/tracks/174495152/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
      					<div class="item-media ">
      						<a href="track.detail.html" class="item-media-content" style="background-image: url('images/b11.jpg');"></a>
      					</div>
      					<div class="item-info">
      						<div class="item-title text-ellipsis">
      							<a href="track.detail.html">Happy ending</a>
      						</div>
      						<div class="item-author text-sm text-ellipsis ">
      							<a href="artist.detail.html" class="text-muted">Postiljonen</a>
      						</div>
      		
      		
      					</div>
      				</div>
      			</div>
      		    <div class="col-xs-12">
      		    	<div class="item r" data-id="item-5" data-src="http://streaming.radionomy.com/JamendoLounge">
      					<div class="item-media ">
      						<a href="track.detail.html" class="item-media-content" style="background-image: url('images/b4.jpg');"></a>
      					</div>
      					<div class="item-info">
      						<div class="item-title text-ellipsis">
      							<a href="track.detail.html">Live Radio</a>
      						</div>
      						<div class="item-author text-sm text-ellipsis ">
      							<a href="artist.detail.html" class="text-muted">Radionomy</a>
      						</div>
      		
      		
      					</div>
      				</div>
      			</div>
      		    <div class="col-xs-12">
      		    	<div class="item r" data-id="item-11" data-src="http://api.soundcloud.com/tracks/218060449/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
      					<div class="item-media ">
      						<a href="track.detail.html" class="item-media-content" style="background-image: url('images/b10.jpg');"></a>
      					</div>
      					<div class="item-info">
      						<div class="item-title text-ellipsis">
      							<a href="track.detail.html">Spring</a>
      						</div>
      						<div class="item-author text-sm text-ellipsis ">
      							<a href="artist.detail.html" class="text-muted">Pablo Nouvelle</a>
      						</div>
      		
      		
      					</div>
      				</div>
      			</div>
      		    <div class="col-xs-12">
      		    	<div class="item r" data-id="item-8" data-src="http://api.soundcloud.com/tracks/236288744/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
      					<div class="item-media ">
      						<a href="track.detail.html" class="item-media-content" style="background-image: url('images/b7.jpg');"></a>
      					</div>
      					<div class="item-info">
      						<div class="item-title text-ellipsis">
      							<a href="track.detail.html">Simple Place To Be</a>
      						</div>
      						<div class="item-author text-sm text-ellipsis ">
      							<a href="artist.detail.html" class="text-muted">RYD</a>
      						</div>
      		
      		
      					</div>
      				</div>
      			</div>
      		    <div class="col-xs-12">
      		    	<div class="item r" data-id="item-10" data-src="http://api.soundcloud.com/tracks/237514750/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
      					<div class="item-media ">
      						<a href="track.detail.html" class="item-media-content" style="background-image: url('images/b9.jpg');"></a>
      					</div>
      					<div class="item-info">
      						<div class="item-title text-ellipsis">
      							<a href="track.detail.html">The Open Road</a>
      						</div>
      						<div class="item-author text-sm text-ellipsis ">
      							<a href="artist.detail.html" class="text-muted">Postiljonen</a>
      						</div>
      		
      		
      					</div>
      				</div>
      			</div>
      	</div>
      	<h6 class="text text-muted">Go mobile</h6>
      	<div class="btn-groups">
              <a href="" class="btn btn-sm dark lt m-r-xs" style="width: 135px">
                <span class="pull-left m-r-sm">
                  <i class="fa fa-apple fa-2x"></i>
                </span>
                <span class="clear text-left l-h-1x">
                  <span class="text-muted text-xxs">Download on the</span>
                  <b class="block m-b-xs">App Store</b>
                </span>
              </a>
              <a href="" class="btn btn-sm dark lt" style="width: 133px">
                <span class="pull-left m-r-sm">
                  <i class="fa fa-play fa-2x"></i>
                </span>
                <span class="clear text-left l-h-1x">
                  <span class="text-muted text-xxs">Get it on</span>
                  <b class="block m-b-xs m-r-xs">Google Play</b>
                </span>
              </a>
          </div>
          <div class="b-b m-y"></div>
          <div class="nav text-sm _600">
          	<a href="#" class="nav-link text-muted m-r-xs">About</a>
          	<a href="#" class="nav-link text-muted m-r-xs">Contact</a>
          	<a href="#" class="nav-link text-muted m-r-xs">Legal</a>
          	<a href="#" class="nav-link text-muted m-r-xs">Policy</a>
          </div>
          <p class="text-muted text-xs p-b-lg">&copy; Copyright 2016</p>
      </div>
    </div>
  </div>
</div>

<?require_once $_SERVER["DOCUMENT_ROOT"].'/local/tmp/footerProfile.php'?>
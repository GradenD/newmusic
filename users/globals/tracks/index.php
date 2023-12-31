<?require_once $_SERVER["DOCUMENT_ROOT"].'/local/tmp/headerProfile.php';?>

<div class="row-col">
    <div class="col-lg-9 b-r no-border-md">
        <div class="padding">
        

        <div class="page-title m-b">
            <h1 class="inline m-a-0">Треки</h1>
            <div class="dropdown inline">
                <button class="btn btn-sm no-bg h4 m-y-0 v-b dropdown-toggle text-primary" data-toggle="dropdown">Все</button>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item active">
                        Все
                    </a>
                    <a href="#" class="dropdown-item">
                        acoustic
                    </a>
                    <a href="#" class="dropdown-item">
                        ambient
                    </a>
                    <a href="#" class="dropdown-item">
                        blues
                    </a>
                    <a href="#" class="dropdown-item">
                        classical
                    </a>
                    <a href="#" class="dropdown-item">
                        country
                    </a>
                    <a href="#" class="dropdown-item">
                        electronic
                    </a>
                    <a href="#" class="dropdown-item">
                        emo
                    </a>
                    <a href="#" class="dropdown-item">
                        folk
                    </a>
                    <a href="#" class="dropdown-item">
                        hardcore
                    </a>
                    <a href="#" class="dropdown-item">
                        hip hop
                    </a>
                    <a href="#" class="dropdown-item">
                        indie
                    </a>
                    <a href="#" class="dropdown-item">
                        jazz
                    </a>
                    <a href="#" class="dropdown-item">
                        latin
                    </a>
                    <a href="#" class="dropdown-item">
                        metal
                    </a>
                    <a href="#" class="dropdown-item">
                        pop
                    </a>
                    <a href="#" class="dropdown-item">
                        pop punk
                    </a>
                    <a href="#" class="dropdown-item">
                        punk
                    </a>
                    <a href="#" class="dropdown-item">
                        reggae
                    </a>
                    <a href="#" class="dropdown-item">
                        rnb
                    </a>
                    <a href="#" class="dropdown-item">
                        rock
                    </a>
                    <a href="#" class="dropdown-item">
                        soul
                    </a>
                    <a href="#" class="dropdown-item">
                        world
                    </a>
                </div>
            </div>
        </div>
        <div data-ui-jp="jscroll" class="jscroll-loading-center" data-ui-options="{autoTrigger: true,loadingHtml: '<i class=\'fa fa-refresh fa-spin text-md text-muted\'></i>',padding: 50,nextSelector: 'a.jscroll-next:last'}">
            <?        
                $ob = new Music;
                $newMusic = $ob->newMusic(100);
            ?>
      		<div class="row">

                <?
                    if($newMusic){

                        foreach ($newMusic as $key => $value) {
                            ?>

                                <div class="col-xs-4 col-sm-4 col-md-3">
                                    <div class="item r" data-id="<?=$key?>" data-src="<?=$value["mp3"]?>">
                                        <div class="item-media ">
                                            <a href="track.detail.html" class="item-media-content" style="background-image: url('<?=$value["poster"]?>');"></a>
                                            <div class="item-overlay center">
                                                <button  class="btn-playpause">Play</button>
                                            </div>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-overlay bottom text-right">
                                                <span data-type="track" data-id="<?=$value["id"]?>" class="btn-favorite"><i class="fa fa-heart-o"></i></span>
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

            <div class="text-center">
                <a href="scroll.item.html" class="btn btn-sm white rounded jscroll-next">Show More</a>
            </div>
        </div>

      </div>
    </div>
    <div class="col-lg-3 w-xxl w-auto-md">
      <div class="padding" style="bottom: 60px;" data-ui-jp="stick_in_parent">
      	<h6 class="text text-muted">5 Likes</h6>
      	<div class="row item-list item-list-sm m-b">
      		    <div class="col-xs-12">
      		    	<div class="item r" data-id="item-6" data-src="http://api.soundcloud.com/tracks/236107824/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
      					<div class="item-media ">
      						<a href="track.detail.html" class="item-media-content" style="background-image: url('images/b5.jpg');"></a>
      					</div>
      					<div class="item-info">
      						<div class="item-title text-ellipsis">
      							<a href="track.detail.html">Body on me</a>
      						</div>
      						<div class="item-author text-sm text-ellipsis ">
      							<a href="artist.detail.html" class="text-muted">Rita Ora</a>
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

<?require_once $_SERVER["DOCUMENT_ROOT"].'/local/tmp/footerProfile.php'?>
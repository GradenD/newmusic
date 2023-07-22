<?require_once $_SERVER["DOCUMENT_ROOT"].'/local/tmp/header.php'?>

<div class="black dk">
    <div class="row no-gutter item-info-overlay">


		<div class="col-sm-6 text-white">

			<?
				$ob = new Album;
				$new = $ob->NewAlbum(5);
				//dump($new);
				if($new){
					?>
						<div class="owl-carousel owl-theme owl-dots-sm owl-dots-bottom-left " data-ui-jp="owlCarousel" data-ui-options="{items: 1,loop: true,autoplay: true,nav: true}">
							<?
								foreach ($new["albom"] as $key => $value) {
									$autor = $new["autor"][$value["autor"]];
									?>
										<div class="item r" data-id="item-115" data-src="http://api.soundcloud.com/tracks/239793212/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">

											<div class="item-media primary">
												<a href="track.detail.html" class="item-media-content" style="background-image: url('images/albums/<?=$value["img"]?>');"></a>
												<div class="item-overlay center">
													<button class="btn-playpause">Play</button>
												</div>
											</div>

											<div class="item-info">
												<div class="item-overlay bottom text-right">
													<a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
													<a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
													<div class="dropdown-menu pull-right black lt"></div>
												</div>
												<div class="item-title text-ellipsis">
													<a href="track.detail.html">Новый альбом от <?=$autor["name"]?></a>
												</div>
												<div class="item-author text-sm text-ellipsis">
													<a href="artist.detail.html" class="text-muted"><?=$autor["name"]?></a>
												</div>
											</div>
											
										</div>
									<?
								}
							?>
						</div>
					<?
				}
			?>

      	</div>

		<?
			$ob = new Album;
			$IndexAlbum = $ob->IndexAlbum(4);
			//dump($IndexAlbum);
			if($IndexAlbum){
				foreach ($IndexAlbum["albom"] as $key => $value) {
					$autor = $IndexAlbum["autor"][$value["autor"]];
					?>
						<div class="col-sm-3 col-xs-6">
							<div class="item r" data-id="item-1" data-src="http://api.soundcloud.com/tracks/269944843/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
								<div class="item-media ">
									<a href="track.detail.html" class="item-media-content" style="background-image: url('images/albums/<?=$value["img"]?>');"></a>
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
										<a href="track.detail.html"><?=$value["tytle"]?></a>
									</div>
									<div class="item-author text-sm text-ellipsis ">
										<a href="artist.detail.html" class="text-muted"><?=$autor["name"]?></a>
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

  	<?        
    	$ob = new Music;
    	$treading = $ob->treading(9);
  	?>
  
  	<div class="row-col">
    	<div class="col-lg-9 b-r no-border-md">
      		<div class="padding">
        		<h2 class="widget-title h4 m-b">Treading</h2>
				<?
					if($treading){
						?>
							<div class="owl-carousel owl-theme owl-dots-center" data-ui-jp="owlCarousel" data-ui-options="{margin: 20,responsiveClass:true,responsive:{0:{items: 2},543:{items: 3}}}">
								<?
									foreach ($treading as $key => $value) {
										?>
											<div class="">
												<div class="item r" data-id="<?=$key?>" data-src="<?=$value["mp3"]?>">
													<div class="item-media item-media-4by3">
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
														<div class="item-author text-sm text-ellipsis ">
															<a href="artist.detail.html" class="text-muted"><?=$value["artist"]["name"]?></a>
														</div>				
													</div>
												</div>
											</div>
										<?
									}
								?>
 							</div>
						<?
					}
				?>


		<?      
			$ob = new Music;
			$newMusic = $ob->newMusic(8);
		?>


        <h2 class="widget-title h4 m-b">New</h2>
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
											<a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
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


		<div data-blockrecomend class="d-flex block-column"></div>

      </div>
    </div>
    <div class="col-lg-3 w-xxl w-auto-md">
      <div class="padding" style="bottom: 60px;" data-ui-jp="stick_in_parent">
      	<h6 class="text text-muted">5 Likes</h6>
      	<div class="row item-list item-list-sm m-b">
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
      		    	<div class="item r" data-id="item-7" data-src="http://api.soundcloud.com/tracks/245566366/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
      					<div class="item-media ">
      						<a href="track.detail.html" class="item-media-content" style="background-image: url('images/b6.jpg');"></a>
      					</div>
      					<div class="item-info">
      						<div class="item-title text-ellipsis">
      							<a href="track.detail.html">Reflection (Deluxe)</a>
      						</div>
      						<div class="item-author text-sm text-ellipsis ">
      							<a href="artist.detail.html" class="text-muted">Fifth Harmony</a>
      						</div>
      		
      		
      					</div>
      				</div>
      			</div>
      		    <div class="col-xs-12">
      		    	<div class="item r" data-id="item-4" data-src="http://api.soundcloud.com/tracks/230791292/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
      					<div class="item-media ">
      						<a href="track.detail.html" class="item-media-content" style="background-image: url('images/b3.jpg');"></a>
      					</div>
      					<div class="item-info">
      						<div class="item-title text-ellipsis">
      							<a href="track.detail.html">What A Time To Be Alive</a>
      						</div>
      						<div class="item-author text-sm text-ellipsis ">
      							<a href="artist.detail.html" class="text-muted">Judith Garcia</a>
      						</div>
      		
      		
      					</div>
      				</div>
      			</div>
      		    <div class="col-xs-12">
      		    	<div class="item r" data-id="item-9" data-src="http://api.soundcloud.com/tracks/264094434/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
      					<div class="item-media ">
      						<a href="track.detail.html" class="item-media-content" style="background-image: url('images/b8.jpg');"></a>
      					</div>
      					<div class="item-info">
      						<div class="item-title text-ellipsis">
      							<a href="track.detail.html">All I Need</a>
      						</div>
      						<div class="item-author text-sm text-ellipsis ">
      							<a href="artist.detail.html" class="text-muted">Pablo Nouvelle</a>
      						</div>
      		
      		
      					</div>
      				</div>
      			</div>
      		    <div class="col-xs-12">
      		    	<div class="item r" data-id="item-3" data-src="http://api.soundcloud.com/tracks/79031167/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
      					<div class="item-media ">
      						<a href="track.detail.html" class="item-media-content" style="background-image: url('images/b2.jpg');"></a>
      					</div>
      					<div class="item-info">
      						<div class="item-title text-ellipsis">
      							<a href="track.detail.html">I Wanna Be In the Cavalry</a>
      						</div>
      						<div class="item-author text-sm text-ellipsis ">
      							<a href="artist.detail.html" class="text-muted">Jeremy Scott</a>
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

<?require_once $_SERVER["DOCUMENT_ROOT"].'/local/tmp/footer.php'?>
<?require_once $_SERVER["DOCUMENT_ROOT"].'/local/tmp/headerProfile.php'?>

<?
    global $userArray;

    $menu = "";
    if(!empty($_GET["user"])){
        $menu = $_GET["user"];
    }

    $ob = new User;
    $musicCount = $ob->countUsersTrack();
?>

<!-- ############ PAGE START-->
<div class="page-content">
    <div class="padding b-b">
        <div class="row-col">
            <div class="col-sm w w-auto-xs m-b">
            <div class="item w rounded">
                <div class="item-media">
                <div class="item-media-content" style="background-image: url('/images/a3.jpg');"></div>
                </div>
            </div>
            </div>
            <div class="col-sm">
            <div class="p-l-md no-padding-xs">
                <h1 class="page-title">
                    <span class="h1 _800"><?=$userArray["prifileName"]?></span>
                </h1>
                <p class="item-desc text-ellipsis text-muted" data-ui-toggle-class="text-ellipsis">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quamquam tu hanc copiosiorem etiam soles dicere. Nihil illinc huc pervenit. Verum hoc idem saepe faciamus. Quid ad utilitatem tantae pecuniae? Utram tandem linguam nescio? Sed hoc sane concedamus.</p>
                <div class="item-action m-b">
                    <a href="#" class="btn btn-sm rounded primary">Upload</a>
                    <?/*<a href="#" class="btn btn-sm rounded white">Edit Profile</a>*/?>
                </div>
                <div class="block clearfix m-b">
                    <span>0</span> <span class="text-muted">Альбомов</span>, 
                    <span><?=$musicCount?></span> <span class="text-muted">Треков</span>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="row-col">
        <div class="col-lg-9 b-r no-border-md">
        <div class="padding p-y-0 m-b-md">

            <div class="nav-active-border b-primary bottom m-b-md m-t">
                <ul class="nav l-h-2x" data-ui-jp="taburl">
                    <li class="nav-item m-r inline">
                        <a class="nav-link <?if($menu == "track"){?>active<?}?>" href="#" data-toggle="tab" data-target="#track">Треки</a>
                    </li>
                    <li class="nav-item m-r inline">
                        <a class="nav-link <?if($menu == "playlist"){?>active<?}?>" href="#" data-toggle="tab" data-target="#playlist">Плейлисты</a>
                    </li>
                    <li class="nav-item m-r inline">
                        <a class="nav-link <?if($menu == "like"){?>active<?}?>" href="#" data-toggle="tab" data-target="#like">Мне нравится</a>
                    </li>
                    <li class="nav-item m-r inline">
                        <a class="nav-link <?if($menu == "profile"){?>active<?}?>" href="#" data-toggle="tab" data-target="#profile">Профиль</a>
                    </li>
                    <li class="nav-item m-r inline">
                        <a class="nav-link <?if($menu == "change-pasword"){?>active<?}?>" href="#" data-toggle="tab" data-target="#change-pasword">Смена пароля</a>
                    </li>
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane <?if($menu == "track"){?>active<?}?>" id="track">
                    <div class="row item-list item-list-by m-b">
                        <?

                            $ob = new User;
                            $music = $ob->musicUsers(10);

                            if($music){

                                foreach ($music as $key => $value) {
                                   // dump($value);
                                    if(is_array($value['artist'])){
                                        $artist = $value['artist']['name'];
                                    }else{
                                        $artist = $value['artist'];
                                    }
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
                                                        <a href="#" class="btn-favorite">
                                                            <i class="fa fa-heart-o"></i>
                                                        </a>
                                                        <a href="#" class="btn-more" data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-h"></i>
                                                        </a>
                                                        <div class="dropdown-menu pull-right black lt"></div>
                                                    </div>
                                                    <div class="item-title text-ellipsis">
                                                        <a href="track.detail.html"> <?=$artist?> - <?=$value['title']?></a>
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
                                    
                                                    <div class="item-action visible-list m-t-sm">
                                                        <a href="#" class="btn btn-xs white">Edit</a>
                                                        <a href="#" class="btn btn-xs white" data-toggle="modal" data-target="#delete-modal">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?

                                }

                            }

                        ?>

                    </div>
                    <a href="#" class="btn btn-sm white rounded">Show More</a>
                </div>

                <div class="tab-pane <?if($menu == "playlist"){?>active<?}?>" id="playlist">
                    <div class="row m-b">

                        <div class="col-xs-4 col-sm-4 col-md-3">
                            <div class="item r" data-id="item-2" data-src="http://api.soundcloud.com/tracks/259445397/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                <div class="item-media ">
                                    <a href="track.detail.html" class="item-media-content" style="background-image: url('/images/b1.jpg');"></a>
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
                                        <a href="track.detail.html">Fireworks</a>
                                    </div>
                                    <div class="item-author text-sm text-ellipsis hide">
                                        <a href="artist.detail.html" class="text-muted">Kygo</a>
                                    </div>
                                    <div class="item-meta text-sm text-muted">
                                    <span class="item-meta-stats text-xs ">
                                        <i class="fa fa-play text-muted"></i> 30 
                                        <i class="fa fa-heart m-l-sm text-muted"></i> 10
                                    </span>
                                    </div>
                    
                    
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab-pane <?if($menu == "like"){?>active<?}?>" id="like">
                    <div class="row m-b">

                        <div class="col-xs-4 col-sm-4 col-md-3">
                            <div class="item r" data-id="item-10" data-src="http://api.soundcloud.com/tracks/237514750/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                <div class="item-media ">
                                    <a href="track.detail.html" class="item-media-content" style="background-image: url('/images/b9.jpg');"></a>
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
                                        <a href="track.detail.html">The Open Road</a>
                                    </div>
                                    <div class="item-author text-sm text-ellipsis hide">
                                        <a href="artist.detail.html" class="text-muted">Postiljonen</a>
                                    </div>
                                    <div class="item-meta text-sm text-muted">
                                    <span class="item-meta-stats text-xs ">
                                        <i class="fa fa-play text-muted"></i> 860 
                                        <i class="fa fa-heart m-l-sm text-muted"></i> 240
                                    </span>
                                    </div>
                    
                    
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab-pane <?if($menu == "profile"){?>active<?}?>" id="profile">
                    <form id="form-auth" method="post" action="javascript:void(0);">

                        <div class="form-group row">
                            <div class="col-sm-3 form-control-label text-muted">Имя</div>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Имя" name="name" value="<?=$userArray["name"]?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3 form-control-label text-muted">Фамилия</div>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Фамилия" name="lastName" value="<?=$userArray["lastname"]?>" class="form-control">
                            </div>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-lg dark p-x-lg">Сохранить</button>
                        <br>
                        <div class="otvet"></div>

                    </form>
                </div>

                <div class="tab-pane <?if($menu == "change-pasword"){?>active<?}?>" id="change-pasword">
                    <form id="form-pasword" method="post" action="javascript:void(0);">

                        <div class="form-group row">
                            <div class="col-sm-3 form-control-label text-muted">Пароль</div>
                            <div class="col-sm-9">
                                <input type="password" placeholder="Пароль" name="new-password" class="form-control">
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3 form-control-label text-muted">Повторите пароль</div>
                            <div class="col-sm-9">
                                <input type="password" placeholder="Повторите пароль" name="new-password-confirm" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3 form-control-label text-muted">Старый пароль</div>
                            <div class="col-sm-9">
                                <input type="password" placeholder="Старый пароль" name="old-password" class="form-control">
                            </div>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-lg dark p-x-lg">Сохранить</button>
                        <br>
                        <div class="otvet"></div>

                    </form>
                </div>
            </div>

        </div>
    </div>

    <div class="col-lg-3 w-xxl w-auto-md">
      <div class="padding" style="bottom: 60px;" data-ui-jp="stick_in_parent">
      	<h6 class="text text-muted">5 Likes</h6>
      	<div class="row item-list item-list-sm m-b">
      		    <div class="col-xs-12">
      		    	<div class="item r" data-id="item-3" data-src="http://api.soundcloud.com/tracks/79031167/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
      					<div class="item-media ">
      						<a href="track.detail.html" class="item-media-content" style="background-image: url('/images/b2.jpg');"></a>
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
      		    <div class="col-xs-12">
      		    	<div class="item r" data-id="item-1" data-src="http://api.soundcloud.com/tracks/269944843/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
      					<div class="item-media ">
      						<a href="track.detail.html" class="item-media-content" style="background-image: url('/images/b0.jpg');"></a>
      					</div>
      					<div class="item-info">
      						<div class="item-title text-ellipsis">
      							<a href="track.detail.html">Pull Up</a>
      						</div>
      						<div class="item-author text-sm text-ellipsis ">
      							<a href="artist.detail.html" class="text-muted">Summerella</a>
      						</div>
      		
      		
      					</div>
      				</div>
      			</div>
      		    <div class="col-xs-12">
      		    	<div class="item r" data-id="item-12" data-src="http://api.soundcloud.com/tracks/174495152/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
      					<div class="item-media ">
      						<a href="track.detail.html" class="item-media-content" style="background-image: url('/images/b11.jpg');"></a>
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
      		    	<div class="item r" data-id="item-11" data-src="http://api.soundcloud.com/tracks/218060449/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
      					<div class="item-media ">
      						<a href="track.detail.html" class="item-media-content" style="background-image: url('/images/b10.jpg');"></a>
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
      		    	<div class="item r" data-id="item-6" data-src="http://api.soundcloud.com/tracks/236107824/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
      					<div class="item-media ">
      						<a href="track.detail.html" class="item-media-content" style="background-image: url('/images/b5.jpg');"></a>
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

<!-- .modal -->
<div id="delete-modal" class="modal fade animate black-overlay" data-backdrop="false">
  <div class="row-col h-v">
    <div class="row-cell v-m">
      <div class="modal-dialog modal-sm">
        <div class="modal-content flip-y">
          <div class="modal-body text-center">          
            <p class="p-y m-t"><i class="fa fa-remove text-warning fa-3x"></i></p>
            <p>Are you sure to delete this item?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default p-x-md" data-dismiss="modal">No</button>
            <button type="button" class="btn red p-x-md" data-dismiss="modal">Yes</button>
          </div>
        </div><!-- /.modal-content -->
      </div>
    </div>
  </div>
</div>
<!-- / .modal -->

<!-- ############ PAGE END-->

<script>

    $( document ).ready(function() {

        $(document).on("submit", '#form-auth',function() {
            var form = $(this);
            $.ajax({
                type: "POST",
                url: "/local/ajax/user/saveProfile.php",
                data: $(this).serialize(),
                success: function (data) {
                    form.find(".otvet").html(data);
                },
            });
        });

        $(document).on("submit", '#form-pasword',function() {
            var form = $(this);
            $.ajax({
                type: "POST",
                url: "/local/ajax/user/changePasword.php",
                data: $(this).serialize(),
                success: function (data) {
                    form.find(".otvet").html(data);
                },
            });
        });

    });

</script>

<?require_once $_SERVER["DOCUMENT_ROOT"].'/local/tmp/footerProfile.php'?>
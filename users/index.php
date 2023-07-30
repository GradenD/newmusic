<?require_once $_SERVER["DOCUMENT_ROOT"].'/local/tmp/headerProfile.php'?>

<?
    global $userArray;

    $menu = "";
    if(!empty($_GET["user"])){
        $menu = $_GET["user"];
    }

    $ob = new User;
    $musicCount = $ob->countUsersTrack();
    $albumCount = $ob->countUsersAlbum();
?>

<!-- ############ PAGE START-->
<div data-page class="page-content">
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
                <?/*<p class="item-desc text-ellipsis text-muted" data-ui-toggle-class="text-ellipsis">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quamquam tu hanc copiosiorem etiam soles dicere. Nihil illinc huc pervenit. Verum hoc idem saepe faciamus. Quid ad utilitatem tantae pecuniae? Utram tandem linguam nescio? Sed hoc sane concedamus.</p>
                <div class="item-action m-b">
                    <a href="#" class="btn btn-sm rounded primary">Upload</a>
                    <a href="#" class="btn btn-sm rounded white">Edit Profile</a>
                </div>*/?>
                <div class="block clearfix m-b">
                    <span><?=$albumCount?></span> <span class="text-muted">Альбомов</span>, 
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
                <ul data-menu class="nav l-h-2x" data-ui-jp="taburl">
                    <li class="nav-item m-r inline">
                        <a class="nav-link <?if($menu == "track"){?>active<?}?>" href="javascript:void(0)" data-menu data-toggle="tab" data-target="#track">Треки</a>
                    </li>
                    <li class="nav-item m-r inline">
                        <a class="nav-link <?if($menu == "playlist"){?>active<?}?>" href="javascript:void(0)" data-menu data-toggle="tab" data-target="#playlist">Плейлисты</a>
                    </li>
                    <li class="nav-item m-r inline">
                        <a class="nav-link <?if($menu == "like"){?>active<?}?>" href="javascript:void(0)" data-menu data-toggle="tab" data-target="#like">Мне нравится</a>
                    </li>
                    <li class="nav-item m-r inline">
                        <a class="nav-link <?if($menu == "upload"){?>active<?}?>" href="javascript:void(0)" data-menu data-toggle="tab" data-target="#upload">Загрузить трек</a>
                    </li>
                    <li class="nav-item m-r inline">
                        <a class="nav-link <?if($menu == "add-playlist"){?>active<?}?>" href="javascript:void(0)" data-menu data-toggle="tab" data-target="#add-playlist">Создать плейлист</a>
                    </li>
                    <li class="nav-item m-r inline">
                        <a class="nav-link <?if($menu == "profile"){?>active<?}?>" href="javascript:void(0)" data-menu data-toggle="tab" data-target="#profile">Профиль</a>
                    </li>
                    <li class="nav-item m-r inline">
                        <a class="nav-link <?if($menu == "change-pasword"){?>active<?}?>" href="javascript:void(0)" data-menu data-toggle="tab" data-target="#change-pasword">Смена пароля</a>
                    </li>
                </ul>
            </div>

            <div class="tab-content" data-tab>
                <div class="tab-pane <?if($menu == "track"){?>active<?}?>" id="track">
                    <?require_once $_SERVER["DOCUMENT_ROOT"].'/local/action/users/track.php'?>
                </div>

                <div class="tab-pane <?if($menu == "playlist"){?>active<?}?>" id="playlist">
                    <?require_once $_SERVER["DOCUMENT_ROOT"].'/local/action/users/playlist.php'?>
                </div>

                <div class="tab-pane <?if($menu == "like"){?>active<?}?>" id="like">
                    <?require_once $_SERVER["DOCUMENT_ROOT"].'/local/action/users/like.php'?>
                </div>

                <div class="tab-pane <?if($menu == "profile"){?>active<?}?>" id="profile">
                    <?require_once $_SERVER["DOCUMENT_ROOT"].'/local/action/users/profile.php'?>
                </div>

                <div class="tab-pane <?if($menu == "change-pasword"){?>active<?}?>" id="change-pasword">
                    <?require_once $_SERVER["DOCUMENT_ROOT"].'/local/action/users/change-pasword.php'?>
                </div>

                <div class="tab-pane <?if($menu == "upload"){?>active<?}?>" id="upload">
                    <?require_once $_SERVER["DOCUMENT_ROOT"].'/local/action/users/upload.php'?>
                </div>

                <div class="tab-pane <?if($menu == "add-playlist"){?>active<?}?>" id="add-playlist">
                    <?require_once $_SERVER["DOCUMENT_ROOT"].'/local/action/users/add-playlist.php'?>
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
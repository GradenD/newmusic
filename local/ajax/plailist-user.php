<?
    require_once $_SERVER["DOCUMENT_ROOT"].'/local/prolog.php';;
?>

<?
	$ob = new User;

	global $userArray;

	if($userArray["role"] == 1){
		$check = true;
	}else{
		$check = false;
	}

	$album = $ob->albumUsers(100, $check);

	if($album){
		foreach ($album["albom"] as $key => $value) {
			if(!empty($value["type"])){
				$typeAlbum = $value["type"];
			}else{
				$typeAlbum = "album";
			}
			?>
				<a data-addplay data-play="<?=$value["id"]?>" data-table="<?=$typeAlbum?>" data-autor="<?=$_POST["autor"]?>" data-track="<?=$_POST["id"]?>" class="dropdown-item" href="javascript:void(0)">
					<i class="fa fa-check fa-fw text-left"></i>
					<span><?=$value["tytle"]?></span>
				</a>
				<div class="dropdown-divider"></div>
			<?
		}
	}
?>
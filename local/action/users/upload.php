<form id="form-add" method="post" class="upload-form" action="javascript:void(0);">
<?
    global $userArray;
?>
        <div class="form-group row">
            <div class="col-sm-9">
                <input id="file-sounds" type="file" accept=".mp3" name="file-sounds" data-file data-fileurl="info-file" data-filekey="info-file" class="inputfile" />
                <label class="btn btn-lg dark p-x-lg" for="file-sounds">Выберите трек</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3 form-control-label text-muted">Название трека</div>
            <div class="col-sm-9">
                <input id="info-file" data-key="info-file" type="text" placeholder="Название трека" name="tytleTrack" value="" class="form-control" require>
                <input type="hidden"  data-keyurl="info-file" name="url">
            </div>
        </div>

        <?
            if($userArray["role"] == 1){
                $ob = new Autor;
                $arrAutor = $ob->AutorAll("album");
                if($arrAutor){
                    ?>
                        <div class="form-group row">
                            <div class="col-sm-3 form-control-label text-muted">Исполнитель</div>
                            <div class="col-sm-9">
                                <select class="form-select" name="artist" aria-label="Default select example">
                                    <?
                                        foreach ($arrAutor as $key => $value) {
                                            ?>
                                                <option selected value="<?=$value["id"]?>"><?=$value["name"]?></option>
                                            <?
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    <?
                }
            }else{
                ?>
                    <div class="form-group row">
                        <div class="col-sm-3 form-control-label text-muted">Исполнитель</div>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Исполнитель" name="artist" value="" class="form-control" require>
                        </div>
                    </div>
                <?
            }
        ?>

        <div data-imgupload class="foto-form form-block">
            <div class="title">Постер</div>
            <div class="foto-container">
                <div id="foto-preview" data-preview class="foto-preview"></div>
                <label for="file-photo" class="pole-foto-input">
                    <div class="btn-photo-block">
                        <div class="button_type-black button">
                            Выберите постер
                        </div>
                        <div class="info-text">или перетащите в область</div>
                    </div>
                </label>
                <input id="file-photo" data-addposter name="photo" type="file" data-file data-filekey="info-file-poster" class="inputfile">
            </div>
        </div>

        <?
            if($userArray["role"] == 1){
                ?>
                    <br>
                    <label class="md-check">
                        <input name="music_autor" type="checkbox"><i class="primary"></i> Основной плейлист
                    </label>
                    <br>
                <?
            }
        ?>

        <input type="hidden" data-key="info-file-poster" name="poster-otvet">

        <br>
        <button type="submit" class="btn btn-lg dark p-x-lg">Загрузить</button>
        <br>
        <div class="otvet"></div>

    </form>

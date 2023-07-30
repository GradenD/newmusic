<form id="form-add-paylist" method="post" class="upload-form" action="javascript:void(0);">

        <div class="form-group row">
            <div class="col-sm-3 form-control-label text-muted">Название альбома</div>
            <div class="col-sm-9">
                <input id="info-file" type="text" placeholder="Название альбома" name="tytlePlaylist" value="" class="form-control" require>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3 form-control-label text-muted">Автор</div>
            <div class="col-sm-9">
                <input type="text" placeholder="Автор" name="artist" value="" class="form-control" require>
            </div>
        </div>

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

        <input type="hidden" data-key="info-file-poster" name="poster-otvet">

        <br>
        <button type="submit" class="btn btn-lg dark p-x-lg">Создать</button>
        <br>
        <div class="otvet"></div>

    </form>

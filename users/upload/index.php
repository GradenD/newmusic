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
<div class="page-content">
    <form id="form-add" method="post" class="upload-form" action="javascript:void(0);">

        <div class="form-group row">
            <div class="col-sm-9">
                <input type="file" accept=".mp3" name="file-sounds" id="file-sounds" class="inputfile" />
                <label class="btn btn-lg dark p-x-lg" for="file-sounds">Выберите трек</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3 form-control-label text-muted">Название трека</div>
            <div class="col-sm-9">
                <input id="info-file" type="text" placeholder="Название трека" name="tytleTrack" value="" class="form-control" require>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3 form-control-label text-muted">Исполнитель</div>
            <div class="col-sm-9">
                <input type="text" placeholder="Исполнитель" name="artist" value="" class="form-control" require>
            </div>
        </div>

        <div class="foto-form form-block">
            <div class="title">Постер</div>
            <div class="foto-container">
                <div id="foto-preview" class="foto-preview"></div>
                <label for="file-photo" class="pole-foto-input">
                    <div class="btn-photo-block">
                        <div class="button_type-black button">
                            Выберите постер
                        </div>
                        <div class="info-text">или перетащите в область</div>
                    </div>
                </label>
                <input id="file-photo" name="photo" type="file" class="inputfile">
            </div>
        </div>

        <br>
        <button type="submit" class="btn btn-lg dark p-x-lg">Загрузить</button>
        <br>
        <div class="otvet"></div>

    </form>
</div>
<!-- ############ PAGE END-->

<script>

    $( document ).ready(function() {

        $("#file-sounds").change(function(){
            var files = this.files;
            for (var i = 0; i < files.length; i++) {
                readSOUNDS(files[i]);
            }
        });

        function readSOUNDS(file) {
            $('#info-file').val(file.name);
        }

        $(document).on("submit", '#form-auth',function() {
            var form = $(this);

            // var poster
            var file_poster= $('#file-photo').prop('files')[0];
            var form_poster = new FormData();
            // var sound
            var file_sound= $('#file-sounds').prop('files')[0];
            var form_sound = new FormData();

            if(file_sound != undefined){
                //poster
                form_poster.append('file', file_poster);
                $.ajax({
                    url: '/local/library/load-poster.php',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_poster,
                    type: 'post'
                });
                //sound
                form_sound.append('file', file_sound);
                $.ajax({
                    url: '/local/library/load-sounds.php',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_sound,
                    type: 'post'
                });
            }else{
                form.find(".otvet").html("Выберите аудиозапись!");
            }

        });

        $(document).on('change', '#file-photo', function(e) {
            let tgt = e.target || window.event.srcElement,
            files = tgt.files;

            document.querySelector('#foto-preview').innerHTML = '';
            if(files && files.length) {

                for(let i = 0; i < files.length; i++) {

                    let $self = files[i],
                        fr = new FileReader();

                    fr.onload = function(e) {
                        document.querySelector('#foto-preview').insertAdjacentHTML('beforeEnd', `<div class="load-img">
                                                                <img src="${e.srcElement.result}"/>
                                                                <div class="del-img" data-id="`+i+`">
                                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.43475 11.4342C3.12233 11.7466 3.12233 12.2532 3.43475 12.5656C3.74717 12.878 4.25371 12.878 4.56612 12.5656L8.00044 9.13126L11.4348 12.5656C11.7472 12.878 12.2537 12.878 12.5661 12.5656C12.8785 12.2532 12.8785 11.7466 12.5661 11.4342L9.13181 7.99989L12.5661 4.56558C12.8785 4.25316 12.8785 3.74662 12.5661 3.4342C12.2537 3.12179 11.7472 3.12179 11.4348 3.4342L8.00044 6.86852L4.56613 3.4342C4.25371 3.12179 3.74717 3.12179 3.43475 3.4342C3.12233 3.74662 3.12234 4.25316 3.43475 4.56558L6.86907 7.99989L3.43475 11.4342Z" fill="#363330"/>
                                                                    </svg>
                                                                </div>
                                                            </div>`);
                    }
                    fr.readAsDataURL(files[i]);

                };

            }
        });


    });

</script>

<?require_once $_SERVER["DOCUMENT_ROOT"].'/local/tmp/footerProfile.php'?>
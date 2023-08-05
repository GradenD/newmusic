$( document ).ready(function() {

    if ($("[data-blockrecomend]").length > 0) {

        $.ajax({
            type: "POST",
            url: "/local/ajax/recomend.php",
            data: $(this).serialize(),
            success: function (data) {
                $("[data-blockrecomend]").html(data);
            },
        });

    }

    if ($("[data-logout]").length > 0) {
        $("[data-logout]").click(function(){
            $.ajax({
                type: "POST",
                url: "/local/ajax/user/logout.php",
                data: $(this).serialize(),
                success: function (data) {
                    console.log("reload");
                    location.reload();
                },
            });
        });
    }

    $(document).on("click", '.btn-favorite',function() {
        var id = $(this).data("id");
        var type = $(this).data("type");
        $.ajax({
            type: "POST",
            url: "/local/ajax/user/favorite.php",
            data: {
                id: id,
                type: type,
            },
            success: function (data) {
            },
        });
    });

    function removeFileFromFileList(index){
        const dt = new DataTransfer();
        const input = document.getElementById('file-photo');
        const { files } = input;

        for (let i = 0; i < files.length; i++) {
          const file = files[i];
          if (index == i){
            dt.items.add(file); // here you exclude the file. thus removing it.
          }
        }

        input.files = dt.files; // Assign the updates list
    }

    $(document).on("click", '[data-del="music"]',function() {
        var id = $(this).data("id");
        var form = $(this);
        $.ajax({
            type:'POST',
            url:'/local/ajax/user/delMusic.php',
            data:{
                id: id,
            },
            success:function(data){
                form.parents('[data-parent="'+id+'"]').remove();
            }
        });
    });


    $(document).on("click", '[data-edit="music"]',function() {
        var id = $(this).data("id");
        var form = $(this);
        $.ajax({
            type:'POST',
            url:'/local/ajax/user/editMusic.php',
            data:{
                id: id,
            },
            success:function(data){
                form.parents('[data-parent="'+id+'"]').find("[data-editblock]").removeClass("d-none");
                form.parents('[data-parent="'+id+'"]').find("[data-editblock]").html(data);
            }
        });
    });


    $(document).on("click", '.del-img',function() {
        console.log($(this).parents("[data-imgupload]").length);
        var input = $(this).parents("[data-imgupload]").find('[data-file]').data("filekey");
        console.log(input);
        $(this).parents("form").find('[data-key="'+input+'"]').val("");
        var id = $(this).data(id);
        removeFileFromFileList(id);

        $(this).parents(".load-img").remove();
    });

    $(document).on("change", '[data-file]',function() {
        var files = this.files;
        var input = $(this).data("filekey");
        for (var i = 0; i < files.length; i++) {
            $(this).parents("form").find('[data-key="'+input+'"]').val(files[i].name);
            var url = "";
            if($(this).data("fileurl")){
                var url = $(this).data("fileurl"); 
                if(url){
                    $(this).parents("form").find('[data-keyurl="'+url+'"]').val(files[i].name);
                }
            }
        }
    });

    $(document).on("submit", '#form-edit',function() {
        var form = $(this);

        // var poster
        var file_poster= $(this).find("[data-addposter]").prop('files')[0];
        var form_poster = new FormData();

        form_poster.append('file', file_poster);
        $.ajax({
            url: '/local/library/load-poster.php',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_poster,
            type: 'post',
        });

        $.ajax({
            type:'POST',
            url:'/local/ajax/user/edit-sound-user.php',
            data:$(this).serialize(),
            success:function(data){
                form.find(".otvet").html(data);
            }
        });

        $("[data-editblock]").addClass("d-none");
        $("[data-editblock]").html("");
        location.reload();
    });

    $(document).on("submit", '#form-add',function() {
        console.log("submit");
        var form = $(this);

        // var poster
        var file_poster= $(this).find("[data-addposter]").prop('files')[0];
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
                type: 'post',
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
                type: 'post',
            });

            $.ajax({
                type:'POST',
                url:'/local/ajax/user/add-sound-user.php',
                data:$(this).serialize(),
                success:function(data){
                    form.find(".otvet").html(data);
                    location.reload();
                }
            });

        }else{
            form.find(".otvet").html("Выберите аудиозапись!");
        }

    });

    $(document).on("click", '[data-addtrackplaylist]',function() {
        var id = $(this).data("id");
        var autor = $(this).data("autor");
        var form = $(this);
        $.ajax({
            type:'POST',
            url:'/local/ajax/plailist-user.php',
            data:{
                id: id,
                autor: autor, 
            },
            success:function(data){
                $("#addPlaylistTrack").find(".modal-body").html(data);
            }
        });
    });

    $(document).on("click", '[data-addplay]',function() {
        var play = $(this).data("play");
        var id = $(this).data("track");
        var autor = $(this).data("autor");
        var table = $(this).data("table");
        var form = $(this);
        $.ajax({
            type:'POST',
            url:'/local/ajax/addTrackPlailist.php',
            data:{
                id: id,
                play: play,
                autor: autor,
                table: table,
            },
            success:function(data){
                form.toggleClass("active");
            }
        });
    });

    $(document).on("submit", '#form-add-paylist',function() {
        var form = $(this);

        // var poster
        var file_poster= $(this).find("[data-addposter]").prop('files')[0];
        var form_poster = new FormData();

        form_poster.append('file', file_poster);
        $.ajax({
            url: '/local/library/load-poster.php',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_poster,
            type: 'post',
        });

        $.ajax({
            type:'POST',
            url:'/local/ajax/user/add-playlist.php',
            data:$(this).serialize(),
            success:function(data){
                form.find(".otvet").html(data);
            }
        });

        location.reload();
    });

    $(document).on('change', '[data-addposter]', function(e) {
        let tgt = e.target || window.event.srcElement,
        files = tgt.files;

        //document.querySelector('#foto-preview').innerHTML = '';
        var preview = $(this).parents("[data-imgupload]").find("[data-preview]");
        preview.html("");
        if(files && files.length) {

            for(let i = 0; i < files.length; i++) {

                let $self = files[i],
                    fr = new FileReader();

                fr.onload = function(e) {
                    /*document.querySelector('#foto-preview').insertAdjacentHTML('beforeEnd', `<div class="load-img">
                                                            <img src="${e.srcElement.result}"/>
                                                            <div class="del-img" data-id="`+i+`">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.43475 11.4342C3.12233 11.7466 3.12233 12.2532 3.43475 12.5656C3.74717 12.878 4.25371 12.878 4.56612 12.5656L8.00044 9.13126L11.4348 12.5656C11.7472 12.878 12.2537 12.878 12.5661 12.5656C12.8785 12.2532 12.8785 11.7466 12.5661 11.4342L9.13181 7.99989L12.5661 4.56558C12.8785 4.25316 12.8785 3.74662 12.5661 3.4342C12.2537 3.12179 11.7472 3.12179 11.4348 3.4342L8.00044 6.86852L4.56613 3.4342C4.25371 3.12179 3.74717 3.12179 3.43475 3.4342C3.12233 3.74662 3.12234 4.25316 3.43475 4.56558L6.86907 7.99989L3.43475 11.4342Z" fill="#363330"/>
                                                                </svg>
                                                            </div>
                                                        </div>`);*/
                    var content = `<div class="load-img">
                        <img src="${e.srcElement.result}"/>
                        <div class="del-img" data-id="`+i+`">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.43475 11.4342C3.12233 11.7466 3.12233 12.2532 3.43475 12.5656C3.74717 12.878 4.25371 12.878 4.56612 12.5656L8.00044 9.13126L11.4348 12.5656C11.7472 12.878 12.2537 12.878 12.5661 12.5656C12.8785 12.2532 12.8785 11.7466 12.5661 11.4342L9.13181 7.99989L12.5661 4.56558C12.8785 4.25316 12.8785 3.74662 12.5661 3.4342C12.2537 3.12179 11.7472 3.12179 11.4348 3.4342L8.00044 6.86852L4.56613 3.4342C4.25371 3.12179 3.74717 3.12179 3.43475 3.4342C3.12233 3.74662 3.12234 4.25316 3.43475 4.56558L6.86907 7.99989L3.43475 11.4342Z" fill="#363330"/>
                            </svg>
                        </div>
                    </div>`;
                    preview.append(content);
                }
                fr.readAsDataURL(files[i]);

            };

        }
    });

    $(document).on("click", '[data-album-player] .btn-playpause',function() {
        var id = $(this).data("id");
        $.ajax({
            type:'POST',
            url:'/local/ajax/scriptPlaylistEdit.php',
            data:{
                id: id,
                type: "album",
            },
            success:function(data){
                $("#playlistScriptEdit").html(data);
            }
        });
    });


    $.ajax({
        type:'POST',
        url:'/local/ajax/scriptPlaylist.php',
        data:$(this).serialize(),
        success:function(data){
            $("#playlistScript").html(data);
        }
    });


});
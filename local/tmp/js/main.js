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

    if ($("#form-auth").length > 0) {

        $('#form-auth').submit(function(){
            $.ajax({
                type: "POST",
                url: "/local/ajax/user/login.php",
                data: $(this).serialize(),
                success: function (data) {
                    if(data == "true"){
                        location. reload()
                    }else{
                        $("#otvet").html(data);
                    }
                },
            });
        });

    }

    if ($("[data-logout]").length > 0) {
        $.ajax({
            type: "POST",
            url: "/local/ajax/user/logout.php",
            data: $(this).serialize(),
            success: function (data) {
                location.reload();
            },
        });
    }

});
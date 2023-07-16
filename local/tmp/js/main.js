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
                    $("#otvet").html(data);
                },
            });
        });

    }

});
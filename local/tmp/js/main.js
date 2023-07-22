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

});
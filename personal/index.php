<?require_once $_SERVER["DOCUMENT_ROOT"].'/local/tmp/header.php'?>

<?
    global $userArray;
    if(!$userArray){
?>

<div class="content-center d-flex">

    <div class="padding">
        <div class="navbar">
        <div class="pull-center">
            <!-- brand -->
            <a href="/" class="navbar-brand md">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="32" height="32">
                    <circle cx="24" cy="24" r="24" fill="rgba(255,255,255,0.2)"/>
                    <circle cx="24" cy="24" r="22" fill="#1c202b" class="brand-color"/>
                    <circle cx="24" cy="24" r="10" fill="#ffffff"/>
                    <circle cx="13" cy="13" r="2"  fill="#ffffff" class="brand-animate"/>
                    <path d="M 14 24 L 24 24 L 14 44 Z" fill="#FFFFFF" />
                    <circle cx="24" cy="24" r="3" fill="#000000"/>
                </svg>
            
                <img src="images/logo.png" alt="." class="hide">
                <span class="hidden-folded inline"><?=$logoTitle?></span>
            </a>
            <!-- / brand -->
        </div>
        </div>
    </div>
    <div class="b-t">
        <div class="center-block w-xxl w-auto-xs p-y-md text-center">
        <div class="p-a-md">
            <div class="m-y text-sm">
                Регистрация
            </div>

            <form id="form-register" method="post" name="form" action="javascript:void(0);">
                <div class="form-group">
                    <input type="text" name="name"  class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="password" name="confirm-password" class="form-control" placeholder="Password" required>
                </div>
                <div class="m-b-md text-sm">
                    <span class="text-muted">By clicking Sign Up, I agree to the</span> 
                    <a href="#">Terms of service</a> 
                    <span class="text-muted">and</span> 
                    <a href="#">Policy Privacy.</a>
                </div>
                <button type="submit" class="btn btn-lg black p-x-lg">Регистрация</button>
                <div id="otvet"></div>
            </form>

            <div class="p-y-lg text-center">
            <div>Уже есть аккаунт? <a href="/login/" class="text-primary _600">Авторизация</a></div>
            </div>
        </div>
        </div>
    </div>

</div>

<script>
    $( document ).ready(function() {
        if ($("#form-register").length > 0) {

            $('#form-register').submit(function(){
                console.log("click");
                $.ajax({
                    type: "POST",
                    url: "/local/ajax/user/register.php",
                    data: $(this).serialize(),
                    success: function (data) {
                        if(data == "true"){
                            location.reload();
                        }else{
                            $("#otvet").html(data);
                        }
                    },
                });
            });

        }
    });
</script>

<?
    }else{
        ?>

div class="content-center d-flex">

<div class="padding">
    <div class="navbar">
    <div class="pull-center">
        <!-- brand -->
        <a href="/" class="navbar-brand md">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="32" height="32">
                <circle cx="24" cy="24" r="24" fill="rgba(255,255,255,0.2)"/>
                <circle cx="24" cy="24" r="22" fill="#1c202b" class="brand-color"/>
                <circle cx="24" cy="24" r="10" fill="#ffffff"/>
                <circle cx="13" cy="13" r="2"  fill="#ffffff" class="brand-animate"/>
                <path d="M 14 24 L 24 24 L 14 44 Z" fill="#FFFFFF" />
                <circle cx="24" cy="24" r="3" fill="#000000"/>
            </svg>
        
            <img src="images/logo.png" alt="." class="hide">
            <span class="hidden-folded inline"><?=$logoTitle?></span>
        </a>
        <!-- / brand -->
    </div>
    </div>
</div>
<div class="b-t">
    <div class="center-block w-xxl w-auto-xs p-y-md text-center">
    <div class="p-a-md">
        <div>Вы зарегистрированы!<a href="/" class="text-primary _600"> Главная</a></div>
    </div>
    </div>
</div>

</div>
        <?
    }
?>

<?require_once $_SERVER["DOCUMENT_ROOT"].'/local/tmp/footer.php'?>
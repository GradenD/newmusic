<?require_once $_SERVER["DOCUMENT_ROOT"].'/local/tmp/header.php'?>

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
                    <span class="hidden-folded inline">pulse</span>
                </a>
                <!-- / brand -->
            </div>
        </div>
    </div>
    <div class="b-t">
        <div class="center-block w-xxl w-auto-xs p-y-md text-center">
            <div class="p-a-md">
            <div class="m-y text-sm">
                Остался один шаг до Музыки
            </div>
            <form id="form-auth" method="post"  name="form" action="javascript:void(0);">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="password" required>
                </div>      
                <div class="m-b-md">        
                    <label class="md-check">
                        <input type="checkbox"><i class="primary"></i> Запомнить меня
                    </label>
                </div>
                <button type="submit" class="btn btn-lg black p-x-lg">Войти</button>
                <div id="otvet"></div>
            </form>
            <div class="m-y">
                <a href="forgot-password.html" class="_600">Забыли пароль?</a>
            </div>
            <div>           
                Еще не регистрировались? 
                <a href="/personal/" class="text-primary _600">Регистрация</a>
            </div>
            </div>
        </div>
    </div>
</div>

<?require_once $_SERVER["DOCUMENT_ROOT"].'/local/tmp/footer.php'?>
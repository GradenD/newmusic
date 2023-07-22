<?
    require_once $_SERVER["DOCUMENT_ROOT"].'/local/prolog.php';
    global $userArray;
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8" />
  <title>Курсовой проект</title>
  <meta name="description" content="Music, Musician, Bootstrap" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="/images/logo.png">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="/images/logo.png">
  
  <!-- style -->
  <link rel="stylesheet" href="/local/tmp/css/animate.css/animate.min.css" type="text/css" />
  <link rel="stylesheet" href="/local/tmp/css/glyphicons/glyphicons.css" type="text/css" />
  <link rel="stylesheet" href="/local/tmp/css/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="/local/tmp/css/material-design-icons/material-design-icons.css" type="text/css" />
  <link rel="stylesheet" href="/local/tmp/css/bootstrap/dist/css/bootstrap.min.css" type="text/css" />

  <!-- build:css css/styles/app.min.css -->
  <link rel="stylesheet" href="/local/tmp/css/styles/app.css" type="text/css" />
  <link rel="stylesheet" href="/local/tmp/css/styles/style.css" type="text/css" />
  <link rel="stylesheet" href="/local/tmp/css/styles/font.css" type="text/css" />
  
  <link rel="stylesheet" href="/local/tmp/libs/owl.carousel/dist/assets/owl.carousel.min.css" type="text/css" />
  <link rel="stylesheet" href="/local/tmp/libs/owl.carousel/dist/assets/owl.theme.css" type="text/css" />
  <link rel="stylesheet" href="/local/tmp/libs/mediaelement/build/mediaelementplayer.min.css" type="text/css" />
  <link rel="stylesheet" href="/local/tmp/libs/mediaelement/build/mep.css" type="text/css" />
  <link rel="stylesheet" href="/local/tmp/css/main.css" type="text/css" />

  <!-- jQuery -->
  <script src="/local/tmp/libs/jquery/dist/jquery.js"></script>

  <!-- endbuild -->
</head>
<body class="black" data-ui-class="black">
    <div class="app dk" id="app">

        <div id="content" class="app-content white bg" role="main">
            <div class="app-header white lt box-shadow-z1">
                <div class="navbar" data-pjax>
                    <a data-toggle="collapse" data-target="#navbar" class="navbar-item pull-right hidden-md-up m-r-0 m-l">
                        <i class="material-icons">Меню</i>
                    </a>
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
                    
                        <img src="/images/logo.png" alt="." class="hide">
                        <span class="hidden-folded inline"><?=$logoTitle?></span>
                    </a>
                    <!-- / brand -->
            
                    <!-- nabar right -->
                    <ul class="nav navbar-nav pull-right">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="modal" data-target="#search-modal">
                                <i class="material-icons">search</i>
                            </a>
                        </li>
                        <?/*<li class="nav-item">
                        <a class="nav-link" href="">
                            <span class="hidden-xs-down btn btn-sm rounded primary _600">
                                Upload
                            </span>
                            <span class="hidden-sm-up btn btn-sm btn-icon rounded primary">
                                <i class="material-icons">file_upload</i>
                            </span>
                        </a>
                        </li>*/?>
                        <li class="nav-item dropdown">
                            <?
                                if($userArray){
                                    ?>
                                        <a href="#" class="nav-link clear" data-toggle="dropdown">
                                            <span class="avatar w-32">
                                                <img src="/images/a3.jpg" alt="...">
                                            </span>
                                        </a>
                                        <div class="dropdown-menu w dropdown-menu-scale pull-right">
                                            <a class="dropdown-item" href="/users/">
                                                <span>Профиль</span>
                                            </a>
                                            <a class="dropdown-item" href="profile.html#tracks">
                                                <span>Треки</span>
                                            </a>
                                            <a class="dropdown-item" href="profile.html#playlists">
                                                <span>Плейлист</span>
                                            </a>
                                            <a class="dropdown-item" href="profile.html#likes">
                                                <span>Мне нравится</span>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="docs.html">
                                                Поддержка
                                            </a>
                                            <a data-logout class="dropdown-item" href="javascript:void(0);">Выйти</a>
                                        </div>
                                    <?
                                }else{
                                    ?>
                                        <a href="/login/" class="nav-link clear">
                                            <span class="avatar w-32">
                                                <img src="/images/a3.jpg">
                                            </span>
                                        </a>
                                    <?
                                }
                            ?>
                        </li>
                    </ul>
                    <!-- / navbar right -->
            
                    <!-- navbar collapse -->
                    <div class="collapse navbar-toggleable-sm l-h-0 text-center" id="navbar">
                        <!-- link and dropdown -->
                        <ul class="nav navbar-nav nav-md inline text-primary-hover" data-ui-nav>
                            <li class="nav-item">
                                <a href="home.html" class="nav-link">
                                <span class="nav-text">Главное</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="browse.html" class="nav-link">
                                <span class="nav-text">Популярное</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown pos-stc">
                                <a href="chart.html" class="nav-link">
                                <span class="nav-text">Чарт</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="artist.html" class="nav-link">
                                <span class="nav-text">Исполнители</span>
                                </a>
                            </li>
                        </ul>
                        <!-- / link and dropdown -->
                    </div>
                    <!-- / navbar collapse -->
                </div>
            </div>
            <div class="app-footer app-player grey bg">
                <div class="playlist" style="width:100%"></div>
            </div>
            <div class="app-body" id="view">

                <div class="page-content">

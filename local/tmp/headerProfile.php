<?
    require_once $_SERVER["DOCUMENT_ROOT"].'/local/prolog.php';
    global $userArray;

    $url = $_SERVER['REQUEST_URI'];
    $url = explode('?', $url);
    $url = $url[0];
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
        <!-- aside -->
        <div id="aside" class="app-aside modal fade nav-dropdown">
            <!-- fluid app aside -->
            <div class="left navside grey dk" data-layout="column">

                <div class="navbar no-radius">
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

                <div data-flex class="hide-scroll">
                    <nav class="scroll nav-stacked nav-active-primary">
                        
                        <ul class="nav" data-ui-nav>
                        <li class="nav-header hidden-folded">
                            <span class="text-xs text-muted">Меню</span>
                        </li>
                        <?/*<li>
                            <a href="player.html">
                            <span class="nav-icon">
                                <i class="material-icons">
                                play_circle_outline
                                </i>
                            </span>
                            <span class="nav-text">Discover</span>
                            </a>
                        </li>*/?>
                        <li>
                            <a href="/users/globals/tracks/">
                                <span class="nav-icon">
                                    <i class="material-icons">
                                    sort
                                    </i>
                                </span>
                                <span class="nav-text">Треки</span>
                            </a>
                        </li>
                        <li>
                            <a href="/users/globals/chart/">
                                <span class="nav-icon">
                                    <i class="material-icons">
                                    trending_up
                                    </i>
                                </span>
                                <span class="nav-text">Чарт</span>
                            </a>
                        </li>
                        <li>
                            <a href="artist.html">
                                <span class="nav-icon">
                                    <i class="material-icons">
                                    portrait
                                    </i>
                                </span>
                                <span class="nav-text">Исполнители</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="modal" data-target="#search-modal">
                                <span class="nav-icon">
                                    <i class="material-icons">
                                    search
                                    </i>
                                </span>
                                <span class="nav-text">Поиск</span>
                            </a>
                        </li>
                        
                        
                        <li class="nav-header hidden-folded m-t">
                            <span class="text-xs text-muted">Моя коллекция</span>
                        </li>
                        <li>
                            <a href="profile.html#tracks">
                                <?/*<span class="nav-label">
                                    <b class="label">8</b>
                                </span>*/?>
                                <span class="nav-icon">
                                    <i class="material-icons">
                                    list
                                    </i>
                                </span>
                                <span class="nav-text">Треки</span>
                            </a>
                        </li>
                        <li>
                            <a href="profile.html#playlists">
                                <span class="nav-icon">
                                    <i class="material-icons">
                                    queue_music
                                    </i>
                                </span>
                                <span class="nav-text">Плейлист</span>
                            </a>
                        </li>
                        <li>
                            <a href="profile.html#likes">
                                <span class="nav-icon">
                                    <i class="material-icons">
                                    favorite_border
                                    </i>
                                </span>
                                <span class="nav-text">Мне нравится</span>
                            </a>
                        </li>
                        </ul>
                    </nav>
                </div>

                <div data-flex-no-shrink>
                    <div class="nav-fold dropup">
                        <a data-toggle="dropdown">
                            <span class="pull-left">
                                <img src="images/a3.jpg" alt="..." class="w-32 img-circle">
                            </span>
                            <span class="clear hidden-folded p-x p-y-xs">
                                <span class="block _500 text-ellipsis">Rachel Platten</span>
                            </span>
                        </a>
                        <div class="dropdown-menu w dropdown-menu-scale ">
                            <a class="dropdown-item" href="profile.html#profile">
                                <span>Profile</span>
                            </a>
                            <a class="dropdown-item" href="profile.html#tracks">
                                <span>Tracks</span>
                            </a>
                            <a class="dropdown-item" href="profile.html#playlists">
                                <span>Playlists</span>
                            </a>
                            <a class="dropdown-item" href="profile.html#likes">
                                <span>Likes</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="docs.html">
                                Need help?
                            </a>
                            <a class="dropdown-item" href="signin.html">Sign out</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
  <!-- / -->
        <div id="content" class="app-content white bg box-shadow-z2" role="main">
            <div class="app-header hidden-lg-up white lt box-shadow-z1">
                <div class="navbar">
                <!-- brand -->
                <a href="index.html" class="navbar-brand md">
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
                <!-- nabar right -->
                <ul class="nav navbar-nav pull-right">
                <li class="nav-item">
                    <!-- Open side - Naviation on mobile -->
                    <a data-toggle="modal" data-target="#aside" class="nav-link">
                    <i class="material-icons">menu</i>
                    </a>
                    <!-- / -->
                </li>
                </ul>
                <!-- / navbar right -->
            </div>
        </div>
        <div class="app-footer app-player grey bg">
            <div class="playlist" style="width:100%"></div>
        </div>

        <div class="page-content">
<?require_once 'tmp/header.php'?>

<div class="container">
    <div class="page-container background-page padding-page">
        <div class="top-block d-grid">

            <div class="grid-item d-flex">
                <div class="controler-block d-flex">
                    <div class="title-block d-flex">
                        <h1>Главное</h1>
                    </div>
                    <div class="nav-navigation d-flex">
                        <ul class="d-flex">
                            <li class="active">Все</li>
                            <li>Новые релизы</li>
                            <li>Чарт</li>
                        </ul>
                    </div>
                </div>
                <div class="player-container-volna d-flex">
                    <div class="volna-block d-flex">
                        <div class="play-block-volna d-flex">
                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414"><path fill="none" d="M0 0h24v24H0z"/><path d="M6.857 2.571L22.286 12 6.857 21.429V2.571z" fill="#fff"/></svg>
                            <span>Моя волна</span>
                        </div>
                        <div class="setings-block-volna d-flex">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.5 7C17.4274 7 17.5 6.92742 17.5 6C17.5 5.07258 17.4274 5 16.5 5H3.5C2.57258 5 2.5 5.07258 2.5 6C2.5 6.92742 2.57258 7 3.5 7H16.5ZM15 10C15 10.9274 14.9274 11 14 11H6C5.07258 11 5 10.9274 5 10C5 9.07258 5.07258 9 6 9H14C14.9274 9 15 9.07258 15 10ZM12.5 14C12.5 14.9274 12.4274 15 11.5 15H8.5C7.57258 15 7.5 14.9274 7.5 14C7.5 13.0726 7.57258 13 8.5 13H11.5C12.4274 13 12.5 13.0726 12.5 14Z" fill="white" fill-opacity="0.9"/>
                            </svg>
                            <span>Настроить</span>
                        </div>
                    </div>
                </div>
                <div class="animation-block">
                    <div data-url="/tmp/mp4/fallback-black.mp4" class="audio-animation">
                        <video autoplay muted loop id="myVideo">
                            <source src="/tmp/mp4/fallback-black.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>

            <div class="grid-item d-flex action-block"></div>

        </div>
    </div>
</div>

<?require_once 'tmp/footer.php'?>
<?php
$current_user = UserRepository::getCurrentUser();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" href="/public/css/search-header.css">
    <link rel="stylesheet" href="/public/css/profile-main.css">
    <title>Profil użytkownika</title>
</head>

<body>
    <div class="background"></div>
    <header>
        <?php include("header.php"); ?>
    </header>
    <main>
        <div class="side-panel">
            <div class="menu">
                <a href="/profile" class="gold-focus gold-hover">Profil</a>
                <hr>
                <a href="/pending" class="gold-focus gold-hover">Oczekujące</a>
                <hr>
                <a href="/finished" class="gold-focus gold-hover">Zakończone</a>
                <hr>
                <a href="/favourites" class="gold-focus gold-hover" style="display: <?= $current_user->isMerchant() ? "none" : "initial"; ?>">
                    Ulubione
                </a>
                <a href="/create_offer" class="gold-focus gold-hover" style="display: <?= $current_user->isMerchant() ? "initial" : "none"; ?>">
                    Nowa Oferta
                </a>
                <hr>
                <a href="/work_in_progress" class="gold-focus gold-hover">Opinie</a>
                <hr>
                <a href="/logout" class="gold-focus gold-hover">Wyloguj się</a>
            </div>
        </div>
        <div class="about">
            <div class="user-info">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <circle cx="12" cy="8" r="2.1" opacity=".3" class="svg-color" />
                    <path d="M12 14.9c-2.97 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1z" opacity=".3" class="svg-color" />
                    <path d="M12 13c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4zm6.1 5.1H5.9V17c0-.64 3.13-2.1 6.1-2.1s6.1 1.46 6.1 2.1v1.1zM12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6.1a2.1 2.1 0 1 1 0 4.2 2.1 2.1 0 0 1 0-4.2z" />
                </svg>
                <h2>
                    <?= $current_user->name . " " . $current_user->surname; ?>
                </h2>
                <p><?= $current_user->email; ?></p>
            </div>
            <div class="statistics">
                <div>
                    <p>Oczekujące</p>
                    <p>2</p>
                </div>
                <div>
                    <p>Zakończone</p>
                    <p>2</p>
                </div>
                <div>
                    <p>Ulubione</p>
                    <p>3</p>
                </div>
                <div>
                    <p>Opinie</p>
                    <p>1</p>
                </div>
            </div>
            <div class="pending">
                <div class="top">
                    <p>Oczekujące </p>
                    <a href="/pending">Więcej</a>
                </div>
                <div class="ticket-container">
                    <div class="ticket">
                        <img src="/public/resources/svg/sam_baines/981306_amf_amf format_file_file format_format_icon.svg" alt="">
                        <div>
                            <p>przyklad.stl</p>
                            <svg class="ticket-bule">
                                <circle cx="10" cy="10" r="10" />
                            </svg>
                        </div>
                    </div>
                    <div class="ticket">
                        <img src="/public/resources/svg/sam_baines/981306_amf_amf format_file_file format_format_icon.svg" alt="">
                        <div>
                            <p>przyklad.stl</p>
                            <svg class="ticket-bule">
                                <circle cx="10" cy="10" r="10" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="finished">
                <div class="top">
                    <p>Zakończone</p>
                    <a href="/finished">Więcej</a>
                </div>
                <div class="ticket-container">
                    <div class="ticket">
                        <img src="/public/resources/svg/sam_baines/981306_amf_amf format_file_file format_format_icon.svg" alt="">
                        <div>
                            <p>przyklad.stl</p>
                            <svg class="ticket-bule">
                                <circle cx="10" cy="10" r="10" />
                            </svg>
                        </div>
                    </div>
                    <div class="ticket">
                        <img src="/public/resources/svg/sam_baines/981306_amf_amf format_file_file format_format_icon.svg" alt="">
                        <div>
                            <p>przyklad.stl</p>
                            <svg class="ticket-bule">
                                <circle cx="10" cy="10" r="10" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
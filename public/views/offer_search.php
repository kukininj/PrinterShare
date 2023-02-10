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
    <link rel="stylesheet" href="/public/css/search-main.css">

    <script src="/public/js/search.js" defer></script>
    <title>Wyszukiwarka</title>
</head>

<body>
    <div class="background"></div>
    <header>
        <?php include("widgets/header.php"); ?>
    </header>
    <main>
        <form id="filter_form" class="filter">
            <div class="option">
                <p>Typ drukarki</p>
                <select name="printer_type" id="">
                    <option value="FFF">FFF</option>
                    <option value="CFF">CFF</option>
                    <option value="SLA">SLA</option>
                    <option value="DLP">DLP</option>
                </select>
            </div>
            <div class="option">
                <p>Średnica dyszy</p>
                <input size="5" type="number" name="diameter" id="diameter" min="0.1" max="1.0" step="0.1" value="0.3">
            </div>
        </form>
        <div class="results" id="results_container">
            <div class="offer">
                <img src="" alt="" srcset="/public/resources/svg/sam_baines/981320_cartesian_enclosed_fdm_printer_icon.svg">
                <div class="offer-info">
                    <div class="top">
                        <h2 class="offer-title">Tytuł ogłoszenia</h2>
                        <p class="offer-pricing">21zł + 37gr/min</p>
                    </div>
                    <div class="bottom">
                        <p class="offer-area">Wadowice</p>
                        <p class="offer-date">06.02.2023</p>
                    </div>
                </div>
            </div>
            <div class="offer">
                <img src="" alt="" srcset="/public/resources/svg/sam_baines/981320_cartesian_enclosed_fdm_printer_icon.svg">
                <div class="offer-info">
                    <div class="top">
                        <h2 class="offer-title">Tytuł ogłoszenia</h2>
                        <p class="offer-pricing">21zł + 37gr/min</p>
                    </div>
                    <div class="bottom">
                        <p class="offer-area">Wadowice</p>
                        <p class="offer-date">06.02.2023</p>
                    </div>
                </div>
            </div>
            <div class="offer">
                <img src="" alt="" srcset="/public/resources/svg/sam_baines/981320_cartesian_enclosed_fdm_printer_icon.svg">
                <div class="offer-info">
                    <div class="top">
                        <h2 class="offer-title">Tytuł ogłoszenia</h2>
                        <p class="offer-pricing">21zł + 37gr/min</p>
                    </div>
                    <div class="bottom">
                        <p class="offer-area">Wadowice</p>
                        <p class="offer-date">06.02.2023</p>
                    </div>
                </div>
            </div>
            <div class="offer">
                <img src="" alt="" srcset="/public/resources/svg/sam_baines/981320_cartesian_enclosed_fdm_printer_icon.svg">
                <div class="offer-info">
                    <div class="top">
                        <h2 class="offer-title">Tytuł ogłoszenia</h2>
                        <p class="offer-pricing">21zł + 37gr/min</p>
                    </div>
                    <div class="bottom">
                        <p class="offer-area">Wadowice</p>
                        <p class="offer-date">06.02.2023</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
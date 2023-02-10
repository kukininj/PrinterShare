<?php

$id_offer = $_GET['id_offer'] ?? false;

if ($id_offer === false || !is_numeric($id_offer)) {
    header('location: /search');
    return;
}

$id_offer = intval($id_offer);

// null means anonymous user
$current_user = UserRepository::getCurrentUser();
$offer = OfferRepository::getOfferByID($id_offer);
$merchant = $offer->getMerchant();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" href="/public/css/search-header.css">
    <link rel="stylesheet" href="/public/css/offer-main.css">
    <link rel="stylesheet" href="/public/css/inputs.css">
    <title><?= $offer->title; ?></title>
</head>

<body>
    <div class="background"></div>
    <header>
        <?php include('widgets/header.php'); ?>
    </header>
    <main>
        <div class="offer">
            <div class="picture">
                <img id="picture" src="<?= $offer->picture; ?>" alt="/public/resources/svg/sam_baines/981320_cartesian_enclosed_fdm_printer_icon.svg">
            </div>
            <div class="offer-content">
                <div class="top">
                    <h2 id="offer_title"><?= $offer->title; ?></h2>
                    <p id="offer_pricing"><?= $offer->getPricingString(); ?></p>
                    <p id="offer_diameter">średnica dyszy: <?= $offer->diameter; ?></p>
                    <p id="offer_type">typ drukarki: <?= $offer->printer_type->value; ?></p>
                </div>
                <div class="bottom">
                    <p id="offer_area">Kraków</p>
                    <p id="offer_date"><?= $offer->date_added->format('Y-m-d G:i:s'); ?></p>
                </div>
                <a class="generic-button gold-bg" id="order_button" href="#order_overlay">Zamów</a>
            </div>
        </div>
        <div class="sidebar">
            <div class="merchant-preview">
                <h2>Sprzedawca</h2>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <circle cx="12" cy="8" r="2.1" opacity=".3" class="svg-color" />
                    <path d="M12 14.9c-2.97 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1z" opacity=".3" class="svg-color" />
                    <path d="M12 13c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4zm6.1 5.1H5.9V17c0-.64 3.13-2.1 6.1-2.1s6.1 1.46 6.1 2.1v1.1zM12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6.1a2.1 2.1 0 1 1 0 4.2 2.1 2.1 0 0 1 0-4.2z" />
                </svg>
                <div class="merchant-info">
                    <h2>
                        <?= $merchant->name . " " . $merchant->surname; ?>
                    </h2>
                    <p><?= $merchant->email; ?></p>
                </div>
            </div>
        </div>
    </main>
    <div id="order_overlay" class="overlay">
        <div class="popup">
            <h2 id="offer_title"><?= $offer->title; ?></h2>
            <p id="offer_pricing"><?= $offer->getPricingString(); ?></p>
            <p id="offer_diameter">średnica dyszy: <?= $offer->diameter; ?></p>
            <p id="offer_type">typ drukarki: <?= $offer->printer_type->value; ?></p>
            <form action="/order" method="post" class="order-form">
                <input type="text" name="id_user" hidden value="<?= $current_user->id_user; ?>">
                <input type="text" name="id_offer" hidden value="<?= $offer->id_offer; ?>">
                <div class="input_box">
                    <input type="file" name="model" id="">
                </div>
                <textarea name="notes" id="" cols="30" rows="10"></textarea>
                <div class="buttons">
                    <a href="#" class="generic-button gold-focus gold-hover">Anuluj</a>
                    <button type="submit" class="generic-button gold-bg">Wyślij</button>
                </div>
            </form>

        </div>
    </div>
    <div id="success" class="overlay">

        <div class="popup">
            <h2>Zamówienie złożone pomyślnie</h2>
            <a href="#" class="generic-button gold-focus gold-hover">Ok</a>
        </div>
    </div>
    <script>
        let offer = <?php
                    echo json_encode($offer);
                    ?>;
    </script>
</body>

</html>
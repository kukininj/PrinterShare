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
    <link rel="stylesheet" href="/public/css/inputs.css">
    <title>Nowa Oferta</title>
</head>

<body>
    <div class="background"></div>
    <header>
        <?php include("header.php") ?>
    </header>
    <main>
        <form action="create_offer" method="post" class="default-form">
            <div class="input_box">
                <p>Tytuł ogłoszenia:</p>
                <input type="text" name="title">
            </div>
            <div class="input_box">
                <p>Cena za godzinę(zł):</p>
                <input size="4" type="number" name="hour_price" min="0.00" max="10000.00" step="0.01" value="37" />
            </div>
            <div class="input_box">
                <p>Cena za kg(zł):</p>
                <input size="4" type="number" name="kg_price" min="0.00" max="10000.00" step="0.01" value="21" />
            </div>
            <div class="select_box">
                <p>Typ drukarki:</p>
                <select name="printer_type" id="">
                    <option selected value="FFF">FFF</option>
                    <option value="CFF">CFF</option>
                    <option value="SLA">SLA</option>
                    <option value="DLP">DLP</option>
                </select>
            </div>
            <div class="input_box">
                <p>Średnica dyszy:</p>
                <input size="4" type="number" name="diameter" min="0.1" max="1.0" step="0.1" value="0.3" />
            </div>
            <div class="input_box">
                <p>Obrazek:</p>
                <input type="file" name="picture">
            </div>
            <button type="submit">Zatwierdź</button>
        </form>
    </main>
</body>

</html>
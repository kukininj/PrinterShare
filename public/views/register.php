<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" href="/public/css/login.css">
    <title>Rejestracja</title>
</head>

<body>
    <div class="background"></div>
    <main>
        <svg class="logo" style="enable-background:new 0 0 96 96;" version="1.1" viewBox="0 0 96 96"
            xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <style type="text/css">
                .st1 {
                    fill: none;
                    stroke: #FFBE52;
                    stroke-linecap: round;
                    stroke-linejoin: round;
                    stroke-miterlimit: 10;
                    stroke-width: 2;
                }

                .st2 {
                    fill: none;
                    stroke: #FFBE52;
                    stroke-width: 2;
                    stroke-linejoin: round;
                    stroke-miterlimit: 10;
                }
            </style>
            <path class="st1" d="M50,20c-2,0-7,5-7,5v18l10,25h4h4l10-25V20c0,0-4.9,5-7,5C62,25,52,20,50,20z" />
            <path class="st1"
                d="M28,4c-2,0-7,5-7,5v22l10,25h4h4l1.2-3L36,43V23l10-9l3,0V4c0,0-4.9,5-7,5C40,9,30,4,28,4z" />
            <path class="st2" d="M30,82H15c0,0-4,0.2-4,4v1c0,2.2,1.8,4,4,4h70" />
            <line class="st2" x1="35" x2="35" y1="62" y2="76" />
            <path class="st1" d="M57,74v1.1c0,2.2-1.8,3.9-3.9,3.9H36c0,0-3-0.1-3,3c0,3.5,3,3,3,3h42" />
            <line class="st1" x1="55" x2="55" y1="30" y2="51" />
            <line class="st1" x1="49" x2="49" y1="30" y2="40" />
            <line class="st1" x1="27" x2="27" y1="13" y2="28" />
            <line class="st1" x1="35" x2="35" y1="67" y2="62" />
            <line class="st1" x1="79" x2="86" y1="91" y2="91" />
        </svg>
        <form class="login_box" action="/register" method="post">
            <div class="input_box">
                <p>Imie</p>
                <input type="text" name="name" placeholder="Jan" />
                <p>nazwisko</p>
                <input type="text" name="surname" placeholder="kowalski" />
            </div>
            <div class="input_box">
                <p>e-mail</p>
                <input type="email" name="email" placeholder="jan.kowalski@jk.pl" />
            </div>
            <div class="input_box">
                <p>Hasło</p>
                <input type="password" name="password" placeholder="¯\_(ツ)_/¯" />
            </div>
            <div class="merchant_checkbox">
                <p>Czy chcesz zostać sprzedawcą?</p>
                <input type="checkbox" name="merchant">
                <select class="area_pick" name="area_name">
                    <option value="Kraków">Kraków</option>
                </select>
            </div>
            <input type="submit" value="Zarejestruj się">
        </form>
        <img class="text_logo" src="/public/resources/svg/logo.svg" alt="" srcset="">
    </main>
</body>

</html>
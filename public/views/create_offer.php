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
        <img src="/public/resources/svg/logo.svg" alt="PrinterShare" srcset="">
        <form action="/search" class="searchbar">
            <div class="search">
                <input name="querry" size="4" placeholder="Czego szukasz?" type="text" class="gold-focus gold-hover" />
            </div>
            <hr class="vertical" />
            <div class="area ">
                <svg viewBox="0 0 46 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g filter="url(#filter0_d_40_95)">
                        <path opacity="0.3"
                            d="M23.3875 7.5C18.2125 7.5 14.0125 11.7 14.0125 16.875C14.0125 22.2188 19.4875 30.3938 23.3875 35.4C27.3437 30.3563 32.7625 22.275 32.7625 16.875C32.7625 11.7 28.5625 7.5 23.3875 7.5ZM23.3875 21.5625C22.1443 21.5625 20.952 21.0686 20.0729 20.1896C19.1938 19.3105 18.7 18.1182 18.7 16.875C18.7 15.6318 19.1938 14.4395 20.0729 13.5604C20.952 12.6814 22.1443 12.1875 23.3875 12.1875C24.6307 12.1875 25.8229 12.6814 26.702 13.5604C27.5811 14.4395 28.075 15.6318 28.075 16.875C28.075 18.1182 27.5811 19.3105 26.702 20.1896C25.8229 21.0686 24.6307 21.5625 23.3875 21.5625Z"
                            fill="#FFBE52" class="svg-color" />
                        <path
                            d="M23.3875 3.75C16.1312 3.75 10.2625 9.61875 10.2625 16.875C10.2625 26.7188 23.3875 41.25 23.3875 41.25C23.3875 41.25 36.5125 26.7188 36.5125 16.875C36.5125 9.61875 30.6437 3.75 23.3875 3.75ZM14.0125 16.875C14.0125 11.7 18.2125 7.5 23.3875 7.5C28.5625 7.5 32.7625 11.7 32.7625 16.875C32.7625 22.275 27.3625 30.3563 23.3875 35.4C19.4875 30.3938 14.0125 22.2188 14.0125 16.875Z"
                            fill="#484848" />
                        <path
                            d="M23.3875 21.5625C25.9763 21.5625 28.075 19.4638 28.075 16.875C28.075 14.2862 25.9763 12.1875 23.3875 12.1875C20.7986 12.1875 18.7 14.2862 18.7 16.875C18.7 19.4638 20.7986 21.5625 23.3875 21.5625Z"
                            fill="#484848" />
                    </g>
                    <defs>
                        <filter id="filter0_d_40_95" x="-3.11255" y="0" filterUnits="userSpaceOnUse"
                            color-interpolation-filters="sRGB">
                            <feComposite in2="hardAlpha" operator="out" />
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_40_95" result="shape" />
                        </filter>
                    </defs>
                </svg>
                <select size="1" name="area" class="gold-focus gold-hover">
                    <option value="Kraków" default>Kraków</option>
                </select>
            </div>
            <button class="submit gold-focus gold-hover" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                </svg>
            </button>
        </form>
        <div class="header-menu">
            <a href="/profile" class="profile gold-focus gold-hover">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <circle cx="12" cy="8" r="2.1" opacity=".3" class="svg-color" />
                    <path d="M12 14.9c-2.97 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1z" opacity=".3"
                        class="svg-color" />
                    <path
                        d="M12 13c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4zm6.1 5.1H5.9V17c0-.64 3.13-2.1 6.1-2.1s6.1 1.46 6.1 2.1v1.1zM12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6.1a2.1 2.1 0 1 1 0 4.2 2.1 2.1 0 0 1 0-4.2z" />
                </svg>
            </a>
            <a href="#" class="notifications gold-focus gold-hover">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M12 6.5c-2.49 0-4 2.02-4 4.5v6h8v-6c0-2.48-1.51-4.5-4-4.5z" opacity=".3"
                        class="svg-color" />
                    <path
                        d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6z" />
                </svg>
            </a>
            <button class="menu-icon gold-focus gold-hover">
                <div class="menu-wrapper">
                    <div class="menu">
                        <h2>Jan Nowak</h2>
                        <a href="/profile" class="gold-focus gold-hover">Profil</a>
                        <hr>
                        <a href="/pending" class="gold-focus gold-hover">Oczekujące</a>
                        <hr>
                        <a href="/finished" class="gold-focus gold-hover">Zakończone</a>
                        <hr>
                        <a href="/favourites" class="gold-focus gold-hover">Ulubione</a>
                        <hr>
                        <a href="/work_in_progress" class="gold-focus gold-hover">Opinie</a>
                        <hr>
                        <a href="/logout" class="gold-focus gold-hover">Wyloguj się</a>
                    </div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z" />
                </svg>
            </button>
        </div>
    </header>
    <main>
        <form action="create_offer" method="post" class="default-form">
            <div class="input_box">
                <p>Tytuł ogłoszenia:</p>
                <input type="text" name="title">
            </div>
            <div class="input_box">
                <p>Cena podstawowa:</p>
                <input size="4" type="number" name="upfront_cost" min="0.00" max="10000.00" step="0.01" value="37" />
            </div>
            <div class="input_box">
                <p>Cena za minutę:</p>
                <input size="4" type="number" name="per_min_cost" min="0.00" max="10000.00" step="0.01" value="21" />
            </div>
            <div class="select_box">
                <p>Typ drukarki:</p>
                <select name="printer_type">
                    <option selected value="FFF">FFF</option>
                    <option value="FDM">FDM</option>
                </select>
            </div>
            <div class="select_box">
                <p>Filament:</p>
                <select name="filament_type">
                    <option selected value="PLA">PLA</option>
                    <option value="ABS">ABS</option>
                    <option value="TPU">TPU</option>
                </select>
            </div>
            <div class="input_box">
                <p>Średnica dyszy:</p>
                <input size="4" type="number" name="nozzle_diameter" min="0.1" max="1.0" step="0.1" value="0.3" />
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
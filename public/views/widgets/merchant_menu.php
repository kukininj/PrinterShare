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
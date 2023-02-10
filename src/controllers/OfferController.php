<?php

require_once 'AppController.php';
require_once(__DIR__ . '/../models/Offer.php');
require_once __DIR__ . '/../repositories/OfferRepository.php';

class OfferController extends AppController
{
    public function offer()
    {
        $this->render('offer');
    }
    public function search()
    {
        if ($this->isGet()) {
            $this->render('offer_search');
            return;
        }

        $query = $_POST['query'];
        $diameter = $_POST['diameter'];
        $printer_type = $_POST['printer_type'];

        try {
            $results = OfferRepository::search($query, PrinterType::from($printer_type), $diameter);
            header('Content-type: application/json');
            http_response_code(200);

            $encoded = json_encode($results);
            echo $encoded;
        } catch (PDOException $except) {
        }
    }

    public function create_offer()
    {
        $user = UserRepository::getCurrentUser();

        if ($this->isGet()) {
            if (isset($user)) {
                if ($user->isMerchant())
                    $this->render('create_offer');
                else {
                    header('location: /profile');
                }
            } else {
                header('location: /login');
            }
            return;
        }

        if ($user->isMerchant()) {
            $ID_merchant = $user->id_merchant;
            $date_added = new DateTime("now", new DateTimeZone("Europe/Warsaw"));
            $hour_price = floatval($_POST['hour_price']);
            $kg_price = floatval($_POST['kg_price']);
            $printer_type = PrinterType::from($_POST['printer_type']);
            $diameter = floatval($_POST['diameter']);
            $title = $_POST['title'];

            try {
                OfferRepository::addOffer($ID_merchant, $date_added, $hour_price, $kg_price, $printer_type, $diameter, $title);
            } catch (PDOException $except) {
                header('location: /profile?offer_creation_failed');
                return;
            }

            header('location: /profile?offer_creation_succeded');
        } else {
            print "you are not merchant!!";
        }
    }
}

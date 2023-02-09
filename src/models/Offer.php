<?php

require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../models/Offer.php');
enum PrinterType: String
{
    case FFF = "FFF";
    case FDM = "FDM";
}

class Offer
{
    public int $id_offer;
    private int $id_merchant;
    private DateTime $date_added;
    private ?DateTime $date_edit;
    private float $hour_price;
    private float $kg_price;
    private PrinterType $printer_type;
    private float $diameter;
    private string $title;

    public function __construct(
        int $id_offer,
        int $id_merchant,
        string $date_added,
        ?string $date_edit,
        float $hour_price,
        float $kg_price,
        string $printer_type,
        float $diameter,
        string $title
    ) {
        $this->id_offer = $id_offer;
        $this->id_merchant = $id_merchant;
        $this->date_added = new DateTime($date_added);
        $this->date_edit = isset($datetime) ? new DateTime($date_edit) : null;
        $this->hour_price = $hour_price;
        $this->kg_price = $kg_price;
        $this->printer_type = PrinterType::from($printer_type);
        $this->diameter = $diameter;
        $this->title = $title;
    }
    
    public function getMerchant(): User
    {
        return UserRepository::getUserByMerchantID($this->id_merchant);
    }
    
    public function getOffer(): Offer
    {
        return OfferRepository::getOfferByID($this->id_offer);
    }
}

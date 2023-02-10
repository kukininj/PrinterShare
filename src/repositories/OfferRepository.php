<?php

require_once 'Repository.php';
require_once(__DIR__ . '/../models/Offer.php');

class OfferRepository extends Repository
{
    /**
     * @var array<int, Offer> $offers
     */
    private static array $offers = [];

    public static function addOffer(
        int $ID_merchant,
        DateTime $date_added,
        float $hour_price,
        float $kg_price,
        PrinterType $printer_type,
        float $diameter,
        string $title,
    ): ?Offer {
        $statement = self::database()->connect()->prepare("
        INSERT INTO public.\"offers\" 
            (\"ID_offer\", \"ID_merchant\", date_added, date_edit, hour_price, kg_price, diameter, title, printer_type)
        VALUES (
            DEFAULT, 
            :id_merchant::integer, 
            :date_added::timestamp, 
            :date_added::timestamp, 
            :hour_price::numeric(10, 2), 
            :kg_price::numeric(10, 2),
            :diameter::double precision, 
            :title::varchar(255), 
            :printer_type::printer_type)
        RETURNING \"offers\".*;
        ");

        $statement->bindParam('id_merchant', $ID_merchant, PDO::PARAM_INT);

        $date_added = $date_added->format("Y-m-d G:i:s");
        $statement->bindParam('date_added', $date_added, PDO::PARAM_INT);

        $statement->bindParam('hour_price', $hour_price, PDO::PARAM_STR);
        $statement->bindParam('kg_price', $kg_price, PDO::PARAM_STR);
        $statement->bindParam('diameter', $diameter, PDO::PARAM_STR);
        $statement->bindParam('title', $title, PDO::PARAM_STR);

        $printer_type = $printer_type->value;
        $statement->bindParam('printer_type', $printer_type, PDO::PARAM_STR);

        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        $offer = new Offer(
            $result['ID_offer'],
            $result['ID_merchant'],
            $result['date_added'],
            $result['date_edit'],
            $result['hour_price'],
            $result['kg_price'],
            $result['printer_type'],
            $result['diameter'],
            $result['title'],
        );

        self::$offers[$offer->id_offer] = $offer;

        return $offer;
    }

    private static function selectOfferByID(int $id_offer): ?Offer
    {
        $statement = self::database()->connect()->prepare("
            SELECT offers.* 
            WHERE offers.ID_offer=:id_offer
            LIMIT 1;
        ");

        $statement->bindParam("id_offer", $id_offer, PDO::PARAM_INT);

        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        $offer = new Offer(
            $result['ID_offer'],
            $result['ID_merchant'],
            $result['date_added'],
            $result['date_edit'],
            $result['hour_price'],
            $result['kg_price'],
            $result['printer_type'],
            $result['diameter'],
            $result['title'],
        );

        return $offer;
    }

    public static function getOfferByID(int $id_offer): ?Offer
    {
        if (self::$offers[$id_offer] ?? false) {
            return self::$offers[$id_offer];
        }

        self::$offers[$id_offer] = self::selectOfferByID($id_offer);


        return self::$offers[$id_offer];
    }
}

<?php

require_once 'AppController.php';
require_once(__DIR__ . '/../models/Offer.php');
require_once __DIR__ . '/../repositories/TransactionRepository.php';

class TransactionController extends AppController
{
    public function order()
    {
        if ($this->isGet()) {
            header('location: /profile');            
            return;
        }
        
        $id_user = $_POST['id_user'];
        $id_offer = $_POST['id_offer'];
        $status = TransactionStatus::AwaitingResponseFromMerchant;
        $notes = $_POST['notes'];

        TransactionRepository::createTransaction($id_user, $id_offer, $status, $notes);

        header("location: /offer?id_offer=".$id_offer."#success");
    }
}

<?php

require_once 'AppController.php';

class OfferController extends AppController
{
    public function offer()
    {
        $this->render('offer');
    }
    public function search()
    {
        $this->render('offer_search');
    }
    
    public function create_offer() {
        $this->render('create_offer');
    }
}
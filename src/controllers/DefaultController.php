<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('login');
    }

    public function work_in_progress() {
        $this->render('work-in-progress');
    }
}
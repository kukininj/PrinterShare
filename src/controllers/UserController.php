<?php

require_once 'AppController.php';

class UserController extends AppController
{
    public function profile()
    {
        $this->render('profile');
    }
    public function pending()
    {
        $this->render('work-in-progress');
    }
    public function finished()
    {
        $this->render('work-in-progress');
    }
    public function favourites()
    {
        $this->render('work-in-progress');
    }
}
<?php

require_once 'AppController.php';

class UserController extends AppController
{
    private function isLoggedIn(): bool
    {
        return isset($_SESSION['ID_user']);
    }

    public function profile()
    {
        if ($this->isLoggedIn())
            $this->render('profile');
        else
            header('location: /login');
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

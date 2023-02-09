<?php

require_once 'AppController.php';
require_once __DIR__ . '/../repositories/UserRepository.php';


class SecurityController extends AppController
{

    public function login()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        
        try {
            $user = UserRepository::getUserByEmail($email);
            if (!$user->checkPassword($password)) {
                header('location: /login?failed');
            }
            $_SESSION['ID_user'] = $user->id_user;
                header('location: /profile');
        }
        catch (PDOException $except) {
            header('location: /login?failed');
        }
    }

    public function logout()
    {
        unset($_SESSION['ID_user']);        
        header('location: /login');
    }
    public function register()
    {
        if (!$this->isPost())
            return $this->render('register');

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $profile_picture = '/public/resources/svg/person.svg';

        if ($_POST['merchant'] ?? false && strcmp($_POST['merchant'], 'on')) {
            $area = $_POST['area_name'];
            try {
                $user = UserRepository::addMerchant($email, $password, $name, $surname, $profile_picture, $area);
            } catch (PDOException $except) {
                header('location: /register?failed');
                return;
            }
            header('location: /login?sucess');
        } else {
            try {
                $user = UserRepository::addUser($email, $password, $name, $surname, $profile_picture);
            } catch (PDOException $except) {
                header('location: /register?failed');
                return;
            }
            header('location: /login?sucess');
        }
    }
}

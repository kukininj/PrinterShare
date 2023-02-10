<?php

declare(strict_types=1);
session_start();

require 'Routing.php';

// @var string
$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', DefaultController::class);
Router::get('work_in_progress', DefaultController::class);

Router::post('login', SecurityController::class);
Router::get('logout', SecurityController::class);
Router::get('register', SecurityController::class);
Router::post('register', SecurityController::class);

Router::post('order', TransactionController::class);

Router::get('offer', OfferController::class);
Router::get('create_offer', OfferController::class);
Router::get('search', OfferController::class);

Router::get('profile', UserController::class);
Router::get('pending', UserController::class);
Router::get('finished', UserController::class);
Router::get('favourites', UserController::class);

Router::run($path);

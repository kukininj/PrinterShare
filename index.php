<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', DefaultController::class);
Router::get('projects', DefaultController::class);
Router::get('register', DefaultController::class);

Router::run($path);
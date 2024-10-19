<?php

require_once __DIR__ . '/../vendor/autoload.php';

// Specify where your Twig templates are stored
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../views');
$twig = new \Twig\Environment($loader, [
    'cache' => __DIR__ . '/../cache', // You can set 'cache' to false for development
]);

// Render the 'signup.html' template with variables
echo $twig->render('registration/signup.html', [
    'name' => 'John Doe',
    'email' => 'john@example.com',
]);

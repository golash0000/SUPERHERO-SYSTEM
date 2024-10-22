<?php
session_start();

require_once __DIR__ . '/../../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
$twig = new \Twig\Environment($loader);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Only handle first name, last name, and email
    $_SESSION['first_name'] = $_POST['first_name'];
    $_SESSION['last_name'] = $_POST['last_name'];
    $_SESSION['email'] = $_POST['email'];

    // At this point, password and department are not yet set
    echo $twig->render('signup.twig', [
        'first_name' => $_SESSION['first_name'],
        'last_name' => $_SESSION['last_name'],
        'email' => $_SESSION['email'],
        'password' => '',  // Not set yet
        'department' => '', // Not set yet
    ]);
    exit();
}

// Redirect to signup.php if not a POST request
header('Location: signup.php');
exit();
?>

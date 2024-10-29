<?php
session_start();
require_once './vendor/autoload.php';

// Initialize Twig with the correct loader path
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/views');
$twig = new \Twig\Environment($loader);

// Get email and password from form submission
$email = $_POST['email'];
$password = $_POST['password'];

// Define user credentials and types
$userCredentials = [
    ['email' => 'test_user@superadmin.ph', 'password' => 'kenneth', 'user_type' => 'super_admin'],
    ['email' => 'test_user@headadmin.ph', 'password' => 'kenneth', 'user_type' => 'head_admin'],
    ['email' => 'test_user@badac.ph', 'password' => 'kenneth', 'user_type' => 'BADAC'],
    ['email' => 'test_user@bpso.ph', 'password' => 'kenneth', 'user_type' => 'BPSO'],
    ['email' => 'test_user@admin1.ph', 'password' => 'kenneth', 'user_type' => 'Admin1'],
    ['email' => 'test_user@admin2.ph', 'password' => 'kenneth', 'user_type' => 'Admin2'],
    ['email' => 'test_user@bcpc.ph', 'password' => 'kenneth', 'user_type' => 'BCPC'],
    ['email' => 'test_user@lupon.ph', 'password' => 'kenneth', 'user_type' => 'LUPON']
];

// Check credentials and set the user type
$userType = null;
foreach ($userCredentials as $user) {
    if ($user['email'] === $email && $user['password'] === $password) {
        $userType = $user['user_type'];
        $_SESSION['user_type'] = $userType;
        break;
    }
}

// Function to fetch the template path based on user type
function getTemplatePath($userType) {
    $paths = [
        'super_admin' => 'views/dashboard/super_admin/templates/dashboard.twig',
        'head_admin' => 'views/dashboard/head_admin/templates/dashboard.twig',
        'BADAC' => 'views/dashboard/departments/BADAC/templates/dashboard.twig',
        'BPSO' => 'views/dashboard/departments/BPSO/templates/dashboard.twig',
        'Admin1' => 'views/dashboard/departments/Admin1/templates/dashboard.twig',
        'Admin2' => 'views/dashboard/departments/Admin2/templates/dashboard.twig',
        'BCPC' => 'views/dashboard/departments/BCPC/templates/dashboard.twig',
        'LUPON' => 'views/dashboard/departments/LUPON/templates/dashboard.twig'
    ];
    return $paths[$userType] ?? null;
}

// Check credentials and set the user type
$userType = null;
foreach ($userCredentials as $user) {
    if ($user['email'] === $email && $user['password'] === $password) {
        $userType = $user['user_type'];
        $_SESSION['user_type'] = $userType;
        break;
    }
}

// First render verification page with loading spinner
if ($userType && ($redirectUrl = getTemplatePath($userType))) {
    echo $twig->render('dashboard/templates/verification.twig', [
        'user_type' => ucfirst($userType),
        'redirect_url' => $redirectUrl // Hidden from user, passed to frontend if needed
    ]);
    exit();
} else {
    // Invalid credentials or unknown user type
    $_SESSION['message'] = 'Invalid email or password.';
    header('Location: index.php'); // Redirect back to login page
    exit();
}

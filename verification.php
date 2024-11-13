<?php
session_start();
require_once './vendor/autoload.php';
// require_once './controllers/db_connection.php'; // Commented out the database connection

// Define hardcoded user credentials and types
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

// Function to fetch the template path based on user type
function getTemplatePath($userType) {
    $paths = [
        'super_admin' => 'views/dashboard/super_admin/templates/pages/dashboard.php',
        'head_admin' => 'views/dashboard/head_admin/templates/pages/dashboard.php',
        'BADAC' => 'views/dashboard/departments/BADAC/templates/dashboard.html',
        'BPSO' => 'views/dashboard/departments/BPSO/Dashboard/dashboard.php',
        'Admin1' => 'views/dashboard/departments/Admin1/templates/dashboard.php',
        'Admin2' => 'views/dashboard/departments/Admin2/templates/dashboard/dashboard.twig',
        'BCPC' => 'views/dashboard/departments/BCPC/dashboard.html',
        'LUPON' => 'views/dashboard/departments/LUPON/templates/dashboard.php'
    ];
    return $paths[$userType] ?? null;
}

// Check for form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get submitted email and password
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Initialize userType variable
    $userType = null;

    // Check hardcoded credentials
    foreach ($userCredentials as $hardcodedUser) {
        if ($hardcodedUser['email'] === $email && $hardcodedUser['password'] === $password) {
            $userType = $hardcodedUser['user_type'];
            $_SESSION['user_type'] = $userType;
            $_SESSION['email'] = $email; // Set session variable for email
            break;
        }
    }

    if ($userType) {
        // Get the template path based on user type
        $templatePath = getTemplatePath($userType);
        if ($templatePath) {
            // Redirect to the appropriate template
            header('Location: ' . $templatePath);
            exit();
        }
    } else {
        // Invalid credentials
        $_SESSION['message'] = 'Invalid email or password. Please try again.';
        header('Location: index.php'); // Redirect back to login page
        exit();
    }
}
?>

<?php
session_start();
require_once './vendor/autoload.php';
require_once './controllers/db_connection.php'; // Include the database connection

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

// Check static credentials first
$userType = null;
foreach ($userCredentials as $user) {
    if ($user['email'] === $email && $user['password'] === $password) {
        $userType = $user['user_type'];
        $_SESSION['user_type'] = $userType;
        break;
    }
}

// Function to fetch the template path based on user type
/* 
function getTemplatePath($userType) {
    $paths = [
        'super_admin' => 'views/dashboard/super_admin/templates/dashboard.twig',
        'head_admin' => 'views/dashboard/head_admin/templates/dashboard.twig',
        'BADAC' => 'views/dashboard/departments/BADAC/templates/dashboard.twig',
        'BPSO' => 'views/dashboard/departments/BPSO/templates/dashboard.twig',
        'Admin1' => 'views/dashboard/departments/Admin1/templates/dashboard.twig',
        'Admin2' => 'views/dashboard/departments/Admin2/templates/dashboard.twig',
        'BCPC' => 'views/dashboard/departments/BCPC/templates/dashboard.twig',
        'LUPON' => 'views/dashboard/departments/LUPON/templates/dashboard.twig',
        'existing_user' => 'views/dashboard/existing_user/templates/dashboard.twig' // Add path for existing users if needed
    ];
    return $paths[$userType] ?? null;
}
*/

// If no userType from static credentials, check in the database
if (!$userType) {
    $dbConnections = getDatabaseConnections(); // Get database connections

    // Prepare statement to check if the user exists using brgy_password
    $stmt = $dbConnections['bms_account_portal']->prepare('SELECT brgy_account_user_type, first_time_admin_user FROM brgy_admin_users WHERE brgy_email = :email AND brgy_password = :password');
    $stmt->execute(['email' => $email, 'password' => $password]); // Use brgy_password directly
    $user = $stmt->fetch();

    if ($user) {
        // User found, set user type from database
        $userType = $user['brgy_account_user_type'];
        $_SESSION['user_type'] = $userType;

        // Check if they are a first-time admin user
        if ($user['first_time_admin_user']) {
            // Redirect to onboarding page
            header('Location: views/confirmation/admin/new_user/onboard.php');
            exit();
        } else {
            // If not a first-time user, redirect to their dashboard
            // Commenting out the template rendering for now
            /*
            $redirectUrl = getTemplatePath($userType);
            if ($redirectUrl) {
                echo $twig->render($redirectUrl, [
                    'user_type' => ucfirst($userType),
                ]);
                exit();
            } else {
                $_SESSION['message'] = 'Unknown user type.';
                header('Location: index.php');
                exit();
            }
            */
            // Placeholder for database interaction logic for super_admin
            // Perform necessary database interactions here
            echo "Database interaction for user type: $userType";
            exit();
        }
    } else {
        // Invalid credentials
        $_SESSION['message'] = 'Invalid email or password.';
        header('Location: index.php'); // Redirect back to login page
        exit();
    }
}

// If userType is set, render the dashboard page
if ($userType /* && ($redirectUrl = getTemplatePath($userType)) */) {
    // Commenting out the template rendering for now
    /*
    echo $twig->render($redirectUrl, [
        'user_type' => ucfirst($userType),
        'redirect_url' => $redirectUrl // Hidden from user, passed to frontend if needed
    ]);
    exit();
    */
    // Placeholder for database interaction logic for user type
    echo "Database interaction for user type: $userType";
    exit();
} else {
    // Invalid credentials or unknown user type
    $_SESSION['message'] = 'Invalid email or password.';
    header('Location: index.php'); // Redirect back to login page
    exit();
}
?>

PANG_DEBUG









<?php
session_start();
require_once './vendor/autoload.php';
require_once './controllers/db_connection.php'; // Include the database connection

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

// Function to fetch the template path based on user type
function getTemplatePath($userType) {
    $paths = [
        'super_admin' => 'views/dashboard/super_admin/templates/pages/dashboard.php',
        'head_admin' => 'views/dashboard/head_admin/templates/pages/dashboard.php',
        'BADAC' => 'views/dashboard/departments/BADAC/templates/dashboard.php',
        'BPSO' => 'views/dashboard/departments/BPSO/Dashboard main/bpso.php',
        'Admin1' => 'views/dashboard/departments/Admin1/templates/dashboard.php',
        'Admin2' => 'views/dashboard/departments/Admin2/templates/dashboard.php',
        'BCPC' => 'views/dashboard/departments/BCPC/templates/dashboard.php',
        'LUPON' => 'views/dashboard/departments/LUPON/templates/dashboard.php'
    ];
    return $paths[$userType] ?? null;
}

// Check for form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get submitted email and password
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Fetch user from the database based on email
    $dbConnections = getDatabaseConnections();
    $stmt = $dbConnections['bms_account_portal']->prepare('SELECT * FROM brgy_admin_users WHERE brgy_email = :email');
    $stmt->execute(['email' => $email]); 
    $user = $stmt->fetch();

    // Initialize userType variable
    $userType = null;

    if ($user) {
        // Log the hashed password and input password for debugging
        error_log("Hashed Password in DB: " . $user['brgy_password_hashed']);
        error_log("Input Password: " . $password);

        // Attempt to verify password using password_verify
        $isPasswordValid = password_verify($password, $user['brgy_password_hashed']);

        // If password_verify fails, check hardcoded credentials
        if (!$isPasswordValid) {
            foreach ($userCredentials as $hardcodedUser) {
                if ($hardcodedUser['email'] === $email && $hardcodedUser['password'] === $password) {
                    $userType = $hardcodedUser['user_type'];
                    $_SESSION['user_type'] = $userType;
                    $isPasswordValid = true; // Set as valid after matching hardcoded credentials
                    break;
                }
            }
        } else {
            $userType = $user['user_type']; // Set user type from database
            $_SESSION['user_type'] = $userType;
        }

        if ($isPasswordValid) {
            // Set session variable for email
            $_SESSION['email'] = $email;

            // Check first_time_admin_user flag and redirect accordingly
            if (strtolower($user['first_time_admin_user']) === 'yes') {
                header('Location: views/confirmation/admin/new_user/onboard.php');
                exit();
            } else {
                // Redirect to verification code page if first_time_admin_user is 'no'
                header('Location: views/confirmation/admin/verification-code.php');
                exit();
            }
        } else {
            // Invalid password
            $_SESSION['message'] = 'Invalid password. Please try again.';
            header('Location: index.php'); // Redirect back to login page
            exit();
        }
    } else {
        // User not found, check hardcoded credentials
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
        }

        // Invalid credentials
        $_SESSION['message'] = 'Invalid email or password. Please try again.';
        header('Location: index.php'); // Redirect back to login page
        exit();
    }
}
?>


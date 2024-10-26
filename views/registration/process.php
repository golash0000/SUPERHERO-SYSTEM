<?php
session_start();
require_once __DIR__ . '/../../vendor/autoload.php';

// Use .env for hiding confidential info.
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
$twig = new \Twig\Environment($loader);

// Function to generate a unique brgy_account_id
function generateAccountId() {
    return rand(10000000000, 99999999999);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['first_name'])) {
        // Store session data from the first step
        $_SESSION['first_name'] = $_POST['first_name'];
        $_SESSION['last_name'] = $_POST['last_name'];
        $_SESSION['email'] = $_POST['email'];

        echo $twig->render('signup.twig', [
            'first_name' => $_SESSION['first_name'],
            'last_name' => $_SESSION['last_name'],
            'email' => $_SESSION['email'],
            'password' => '',  
            'account_user_type' => '',
        ]);
        exit();
    } else {
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['account_user_type'] = $_POST['account_user_type'];

        // Hash the password using SHA-256
        $hashed_password = hash('sha256', $_SESSION['password']);

        // Generate the brgy_account_id
        $brgy_account_id = generateAccountId();

        // Prepare data for AWS API
        $data = [
            'brgy_password' => $_SESSION['password'],
            'brgy_password_hashed' => $hashed_password,
            'brgy_email' => $_SESSION['email'],
            'brgy_firstName' => $_SESSION['first_name'],
            'brgy_lastName' => $_SESSION['last_name'],
            'brgy_account_id' => $brgy_account_id, // Add the generated account ID here
            'brgy_account_user_type' => $_SESSION['account_user_type'],
        ];

        // Send POST request to AWS API (Security-measured)
        $url = $_ENV['AWS_API_URL'];
        
        $options = [
            'http' => [
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($data),
            ],
        ];
        
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        
        if ($result === FALSE) {
            echo "Error during registration.";
            exit();
        }

        // Clear session data if needed
        session_unset(); 
        session_destroy();
        
        // Load the success page template
        echo $twig->render('success_page.twig');
        exit();
    }
}

// Render the signup.twig template for the second step
if (isset($_SESSION['first_name'])) {
    echo $twig->render('signup.twig', [
        'first_name' => $_SESSION['first_name'],
        'last_name' => $_SESSION['last_name'],
        'email' => $_SESSION['email'],
        'password' => '', 
        'account_user_type' => '',
    ]);
} else {
    header('Location: signup.php');
    exit();
}
?>

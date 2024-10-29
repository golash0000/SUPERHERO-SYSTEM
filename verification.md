<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$apiUrl = "https://yjme796l3k.execute-api.ap-southeast-2.amazonaws.com/dev/api/v1/items/";

$data = [
    'email' => $email,
    'password' => $password
];

$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
curl_close($ch);

if ($response) {
    $apiResponse = json_decode($response, true);

    if (is_array($apiResponse)) {
        $isAuthenticated = false;

        foreach ($apiResponse as $user) {
            if (isset($user['brgy_email']) && $user['brgy_email'] === $email) {
                if (isset($user['brgy_password']) && $user['brgy_password'] === $password) {
                    $isAuthenticated = true;


                    $_SESSION['user_id'] = $user['brgy_user_id'];
                    $_SESSION['user_type'] = $user['brgy_account_user_type'];
                    $_SESSION['message'] = 'Login successful!';


                    header('Location: dashboard.php');
                    exit();
                }
            }
        }

        if (!$isAuthenticated) {
            $_SESSION['message'] = 'Invalid email or password.';
        }
    } else {
        $_SESSION['message'] = 'Unexpected response format from the server.';
    }
} else {
    $_SESSION['message'] = 'Failed to connect to the authentication server.';
}

header('Location: index.php');
exit();
?>

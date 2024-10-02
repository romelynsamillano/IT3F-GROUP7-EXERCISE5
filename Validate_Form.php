<?php
$response = [
    'success' => true,
    'errors' => []
];

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if (empty($username)) {
    $response['success'] = false;
    $response['errors']['username'] = 'Username is required';
} elseif (strlen($username) < 3) {
    $response['success'] = false;
    $response['errors']['username'] = 'Username must be at least 3 characters long';
} elseif ($username === 'admin') {
    $response['success'] = false;
    $response['errors']['username'] = 'Username "admin" is not allowed';
}

if (empty($password)) {
    $response['success'] = false;
    $response['errors']['password'] = 'Password is required';
} elseif (strlen($password) < 6) {
    $response['success'] = false;
    $response['errors']['password'] = 'Password must be at least 6 characters long';
}

header('Content-Type: application/json');
echo json_encode($response);

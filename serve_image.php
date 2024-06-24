<?php
session_start();

// Function to validate token (simple example)
function validateToken($token, $image, $expiry) {
    // This should be a more secure validation in real-world applications
    $secret = 'your_secret_key';
    return hash('sha256', $image . $expiry . $secret) === $token && $expiry > time();
}

// Get parameters from URL
$image = isset($_GET['image']) ? $_GET['image'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';
$expiry = isset($_GET['expiry']) ? $_GET['expiry'] : '';

// Check if user is logged in and token is valid
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && validateToken($token, $image, $expiry)) {
    $imagePath = 'private_images/' . $image;
    if (file_exists($imagePath)) {
        header('Content-Type: ' . mime_content_type($imagePath));
        readfile($imagePath);
        exit;
    } else {
        http_response_code(404);
        echo "Image not found";
        exit;
    }
} else {
    http_response_code(403);
    echo "Access denied";
    exit;
}
?>

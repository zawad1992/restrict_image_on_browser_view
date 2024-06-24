<?php
session_start();
$_SESSION['loggedin'] = true;

// Function to generate token
function generateToken($image, $expiry) {
    $secret = 'your_secret_key';
    return hash('sha256', $image . $expiry . $secret);
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $image = 'image_text.jpg';
    $expiry = time() + 900; // 15 min expiry
    $token = generateToken($image, $expiry);
    $imageUrl = "serve_image.php?image=$image&token=$token&expiry=$expiry";
} else {
    $imageUrl = '';
}
?>
<!DOCTYPE html>
<html>
<body>
    <?php if ($imageUrl): ?>
        <img src="<?= $imageUrl ?>" alt="my_image">
        <br>
        <?= "Show Images" ?>
    <?php else: ?>
        <p>You must be logged in to view images.</p>
    <?php endif; ?>
</body>
</html>

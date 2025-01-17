<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

Route::add('/', function () {
    require(__DIR__ . "/../views/pages/index.php");
});

Route::add('/login', function () {
    require(__DIR__ . "/../views/pages/login.php");
});

Route::add('/logout', function () {
    require(__DIR__ . "/../includes/logout.php");
});

Route::add('/two-factor-login', function () {
    require(__DIR__ . "/../views/pages/two-factor-login.php");
});

Route::add('/reset-password', function () {
    $email = isset($_GET['email']) ? $_GET['email'] : null;
    
    if ($email) {
        $_SESSION['reset_email'] = $email;
    }

    require(__DIR__ . "/../views/pages/reset-password.php");
});

Route::add('/forum', function () {
    require(__DIR__ . "/../views/pages/forum.php");
});

Route::add('/weapons', function () {
    require(__DIR__ . "/../views/pages/weapons.php");
});

Route::add('/weapons/details', function () {
    require(__DIR__ . "/../views/pages/weapon-details.php");
});

Route::add('/locations', function () {
    require(__DIR__ . "/../views/pages/locations.php");
});

Route::add('/locations/details', function () {
    require(__DIR__ . "/../views/pages/location-details.php");
});

Route::add('/bosses', function () {
    require(__DIR__ . "/../views/pages/bosses.php");
});

Route::add('/bosses/details', function () {
    require(__DIR__ . "/../views/pages/boss-details.php");
});
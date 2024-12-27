<?php

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

Route::add('/forum', function () {
    require(__DIR__ . "/../views/pages/forum.php");
});
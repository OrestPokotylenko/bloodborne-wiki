<?php

Route::add('/', function () {
    require(__DIR__ . "/../views/pages/index.php");
});

Route::add('/login', function () {
    require(__DIR__ . "/../views/pages/login.php");
});
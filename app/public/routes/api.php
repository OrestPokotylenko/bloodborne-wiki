<?php

Route::add('/api/get-replies', function () {
    require(__DIR__ . "/../api-endpoints/get-replies-endpoint.php");
});

Route::add('/api/get-threads', function () {
    require(__DIR__ . "/../api-endpoints/get-threads-endpoint.php");
});
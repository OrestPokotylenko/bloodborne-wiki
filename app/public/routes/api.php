<?php

Route::add('/api/get-replies', function () {
    require(__DIR__ . "/../api-endpoints/get-replies-endpoint.php");
});

Route::add('/api/get-threads', function () {
    require(__DIR__ . "/../api-endpoints/get-threads-endpoint.php");
});

Route::add('/api/post-reply', function () {
    require(__DIR__ . "/../api-endpoints/post-reply-endpoint.php");
}, 'post');

Route::add('/api/post-thread', function () {
    require(__DIR__ . "/../api-endpoints/post-thread-endpoint.php");
}, 'post');

Route::add('/api/post-subscription', function () {
    require(__DIR__ . "/../api-endpoints/post-subscription-endpoint.php");
}, 'post');
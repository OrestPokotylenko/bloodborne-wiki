<?php

/**
 * Set env variables and enable error reporting in local environment
 */
require_once(__DIR__ . "/lib/env.php");
require_once(__DIR__ . "/lib/error_reporting.php");

//session_destroy();
session_start();
/**
 * Require routing library
 */
require_once(__DIR__ . "/lib/Route.php");

/**
 * Require routes
 */
require_once(__DIR__ . "/routes/web.php");

// run router
Route::run();
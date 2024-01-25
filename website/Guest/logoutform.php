<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Prevent caching of the current page
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");

// Force the browser to load the page from the server instead of the cache
header("Pragma: no-cache");

// Redirect to the login page or any other page you want
header('Location: ../index.php');
exit();
?>

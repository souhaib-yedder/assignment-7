<?php
// Start the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy all the session.
session_unset();
// Destroy the session.
session_destroy();

// Redirect to the login page
header("Location: login.php");
exit;
?>
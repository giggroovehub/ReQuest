<?php
// logout.php
session_start();

// Destroy session and remove all session variables
session_unset();
session_destroy();

// Redirect to login page
header("Location: /request/bac/login.php");
exit();
?>

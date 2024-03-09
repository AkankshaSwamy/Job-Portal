<?php
session_start();

// Remove a specific session variable
unset($_SESSION['id']);

// Alternatively, you can remove all session variables
// session_unset();

// Destroy the session
session_destroy();

// Redirect to index.php with a success message
header('Location: index.php?msg=success_logout');
exit; // Always exit after redirect
?>

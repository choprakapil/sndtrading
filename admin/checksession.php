<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['admin_ses']) || $_SESSION['admin_ses'] !== "hvrs@#p9w84r" . session_id()) {
    $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
    if (strpos($uri, '/admin/') !== false) {
        $loginUrl = preg_replace('#/admin/.*#', '/admin/login.php', $uri);
    } else {
        $loginUrl = 'login.php';
    }
    header("Location: " . $loginUrl);
    exit();
}
?>
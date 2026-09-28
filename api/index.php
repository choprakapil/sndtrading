<?php
// Entrypoint for Vercel Serverless Function
ini_set('display_errors', '1');
error_reporting(E_ALL);

$baseDir = dirname(__DIR__);
if (file_exists($baseDir . '/router.php')) {
    chdir($baseDir);
    require $baseDir . '/router.php';
} else if (file_exists(__DIR__ . '/../router.php')) {
    chdir(__DIR__ . '/..');
    require __DIR__ . '/../router.php';
} else {
    echo "<h1>SND Trading</h1><p>Running on Vercel. Router file not found at " . htmlspecialchars($baseDir . '/router.php') . "</p>";
    echo "<p>Files in baseDir:</p><pre>";
    print_r(scandir($baseDir));
    echo "</pre>";
}

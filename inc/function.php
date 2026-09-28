<?php
//  session_start();
$serverHost = $_SERVER['HTTP_HOST'] ?? $_SERVER['SERVER_NAME'] ?? 'localhost';
$isLocal = (strpos($serverHost, 'localhost') !== false || strpos($serverHost, '127.0.0.1') !== false);

$isVercel = (getenv('VERCEL') !== false || strpos($serverHost, 'vercel.app') !== false);

if($isLocal)
{
    $hostname = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "snd";
    $port = 3306;
    @define('SITE_NAME', 'SND Trading');
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
    @define('SITE_URL', $protocol . $serverHost . '/');
    @define('SITE_EMAIL', 'info@sndtrading.org');
}
else if($isVercel)
{
    $hostname = getenv('DB_HOST') ?: "sndtrading.org";
    $dbusername = getenv('DB_USER') ?: "sndtradi_user";
    $dbpassword = getenv('DB_PASSWORD') ?: "3dR6MS5nu4_p";
    $dbname = getenv('DB_NAME') ?: "sndtradi_db";
    $port = getenv('DB_PORT') ? (int)getenv('DB_PORT') : 3306;
    @define('SITE_NAME', 'SND Trading');
    @define('SITE_URL', 'https://' . $serverHost . '/');
    @define('SITE_EMAIL', 'info@sndtrading.org');
}
else
{
    $hostname = "localhost";
    $dbusername = "sndtradi_user";
    $dbpassword = "3dR6MS5nu4_p";
    $dbname = "sndtradi_db";
    $port = 3306;
    @define('SITE_NAME', 'SND Trading');
    @define('SITE_URL', 'https://sndtrading.org/');
    @define('SITE_EMAIL', 'info@sndtrading.org');
}

mysqli_report(MYSQLI_REPORT_OFF);
$conn = @mysqli_connect($hostname, $dbusername, $dbpassword, $dbname, $port);
if (!$conn) {
    $err = mysqli_connect_error();
    if ($isVercel) {
        die("<div style='font-family:sans-serif;padding:30px;max-width:700px;margin:50px auto;border:1px solid #f5c6cb;background:#f8d7da;color:#721c24;border-radius:8px;line-height:1.6;'>
            <h2 style='margin-top:0;'>Database Connection Error (Vercel)</h2>
            <p><strong>Error:</strong> " . htmlspecialchars($err) . "</p>
            <p>To allow Vercel serverless functions to connect to your cPanel database, please enable Remote MySQL in cPanel:</p>
            <ol>
                <li>Log in to your <strong>cPanel</strong>.</li>
                <li>Go to <strong>Databases &rarr; Remote MySQL</strong>.</li>
                <li>Under <strong>Add Access Host</strong>, enter <code>%</code> (percentage sign) in the Host field.</li>
                <li>Click <strong>Add Host</strong>.</li>
            </ol>
            <p>Alternatively, configure <code>DB_HOST</code>, <code>DB_USER</code>, <code>DB_PASSWORD</code>, and <code>DB_NAME</code> in your Vercel Project Environment Variables.</p>
        </div>");
    } else {
        die("Database Connection Error: " . $err);
    }
} 
?>
<?php
// Local development router for PHP built-in webserver
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$file = __DIR__ . $uri;

// 1. Direct PHP file (e.g. /admin/login.php, /admin/index.php, /admin/ajax/test.php)
if (file_exists($file) && substr($file, -4) === '.php' && !is_dir($file)) {
    require $file;
    exit;
}

// 2. If static file exists, serve it directly
if ($uri !== '/' && file_exists($file) && !is_dir($file)) {
    if (php_sapi_name() === 'cli-server') {
        return false;
    }
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $mimes = [
        'css' => 'text/css',
        'js' => 'application/javascript',
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'jfif' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
        'svg' => 'image/svg+xml',
        'webp' => 'image/webp',
        'avif' => 'image/avif',
        'ico' => 'image/x-icon',
        'woff' => 'font/woff',
        'woff2' => 'font/woff2',
        'ttf' => 'font/ttf',
        'pdf' => 'application/pdf',
        'txt' => 'text/plain',
        'xml' => 'application/xml',
    ];
    if (isset($mimes[$ext])) {
        header("Content-Type: " . $mimes[$ext]);
    }
    readfile($file);
    exit;
}

// 3. Check for directory index (e.g. /admin/ -> /admin/index.php)
if (is_dir($file)) {
    $dirIndex = rtrim($file, '/') . '/index.php';
    if (file_exists($dirIndex)) {
        require $dirIndex;
        exit;
    }
}

// 3. Dynamic rewrite rules (matching .htaccess)
// Blog details: /blogs/cat/slug
if (preg_match('#^/blogs/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/?$#', $uri, $m)) {
    $_GET['bburl'] = $m[1];
    $_GET['bpurl'] = $m[2];
    require __DIR__ . '/blogs-details.php';
    exit;
}

// Blog category: /blogs/cat
if (preg_match('#^/blogs/([a-zA-Z0-9_-]+)/?$#', $uri, $m)) {
    $_GET['burl'] = $m[1];
    require __DIR__ . '/blogs.php';
    exit;
}

// Product detail: /product/cat/item
if (preg_match('#^/product/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/?$#', $uri, $m)) {
    $_GET['curl'] = $m[1];
    $_GET['purl'] = $m[2];
    require __DIR__ . '/product-detail.php';
    exit;
}

// Subcategory or product list: /products/cat/subcat
if (preg_match('#^/products/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/?$#', $uri, $m)) {
    $curl = $m[1];
    $second = $m[2];
    // Check if $second is a subcategory in DB
    require_once __DIR__ . '/inc/function.php';
    if ($conn) {
        $chk = mysqli_query($conn, "SELECT id FROM tbl_subcategory WHERE url='$second' AND status='1'");
        if ($chk && mysqli_num_rows($chk) > 0) {
            $_GET['curl'] = $curl;
            $_GET['surl'] = $second;
            require __DIR__ . '/product.php';
            exit;
        }
    } else {
        // Otherwise treat as product detail
        $_GET['curl'] = $curl;
        $_GET['purl'] = $second;
        require __DIR__ . '/product-detail.php';
        exit;
    }
}

// Products list: /products/cat
if (preg_match('#^/products/([a-zA-Z0-9_-]+)/?$#', $uri, $m)) {
    $_GET['purl'] = $m[1];
    require __DIR__ . '/product.php';
    exit;
}

// Service detail: /service/cat/slug or /service/slug
if (preg_match('#^/service/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/?$#', $uri, $m)) {
    $_GET['curl'] = $m[1];
    $_GET['purl'] = $m[2];
    require __DIR__ . '/service-detail.php';
    exit;
}
if (preg_match('#^/service/([a-zA-Z0-9_-]+)/?$#', $uri, $m)) {
    $_GET['purl'] = $m[1];
    require __DIR__ . '/service-detail.php';
    exit;
}

// Turnkey detail: /turnkey/cat/slug or /turnkey/slug
if (preg_match('#^/turnkey/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/?$#', $uri, $m)) {
    $_GET['curl'] = $m[1];
    $_GET['purl'] = $m[2];
    require __DIR__ . '/turnkey-detail.php';
    exit;
}
if (preg_match('#^/turnkey/([a-zA-Z0-9_-]+)/?$#', $uri, $m)) {
    $_GET['purl'] = $m[1];
    require __DIR__ . '/turnkey-detail.php';
    exit;
}

// Team detail: /team/slug
if (preg_match('#^/team/([a-zA-Z0-9_-]+)/?$#', $uri, $m)) {
    $_GET['turl'] = $m[1];
    require __DIR__ . '/team-detail.php';
    exit;
}

// 4. Clean PHP URLs (e.g. /about -> about.php, /contact -> contact.php)
$cleanPath = trim($uri, '/');
if (!empty($cleanPath) && file_exists(__DIR__ . '/' . $cleanPath . '.php')) {
    require __DIR__ . '/' . $cleanPath . '.php';
    exit;
}

// 5. Default index.php
if ($uri === '/' || $uri === '/index.php') {
    require __DIR__ . '/index.php';
    exit;
}

// 6. 404 handler
if (file_exists(__DIR__ . '/404.php')) {
    http_response_code(404);
    require __DIR__ . '/404.php';
    exit;
}

return false;

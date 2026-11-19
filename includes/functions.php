<?php
if (session_status() === PHP_SESSION_NONE) session_start();

function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}
function setting($key, $default = '') {
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT setting_value FROM settings WHERE setting_key = ?");
        $stmt->execute([$key]);
        $value = $stmt->fetchColumn();
        return $value === false ? $default : $value;
    } catch (Throwable $ex) {
        return $default;
    }
}
function is_admin() {
    return !empty($_SESSION['admin_id']);
}
function require_admin() {
    if (!is_admin()) {
        header('Location: login.php');
        exit;
    }
}
function site_header($title = 'New Official TV') {
    $brand = 'New Official TV';
    echo '<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">';
    echo '<title>'.e($title).' | '.e($brand).'</title><link rel="stylesheet" href="assets/css/style.css"></head><body>';
    echo '<div class="topline">Musanze, Rwanda <span>Phone: +250 784 484 940</span></div>';
    echo '<header class="site-header"><a class="logo" href="index.php">NEW <b>OFFICIAL TV</b></a><button class="menu-toggle" onclick="document.querySelector(\'.nav\').classList.toggle(\'open\')">☰</button>';
    echo '<nav class="nav"><a href="index.php">Home</a><a href="repair-services.php">Repair Services</a><a href="learn.php">Learn</a><a href="opportunities.php">Opportunities</a><a href="marketplace.php">Buy & Sell</a><a href="contact.php">Contact</a></nav></header><main>';
}
function site_footer() {
    echo '</main><footer><strong>New Official TV</strong><p>Technology services, learning and opportunities.</p><p>Musanze, Rwanda · +250 784 484 940 · moiseirakiza2@gmail.com</p><p>© '.date('Y').' New Official TV. All rights reserved.</p></footer><script src="assets/js/main.js"></script></body></html>';
}

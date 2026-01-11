<?php
declare(strict_types=1);

$defaultLang = $defaultLang ?? 'es';
$allowedLangs = ['en', 'es'];
$requestedLang = filter_input(INPUT_GET, 'lang', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if (!is_string($requestedLang)) {
    $requestedLang = '';
}
$requestedLang = strtolower(trim($requestedLang));
$pageLang = in_array($requestedLang, $allowedLangs, true) ? $requestedLang : $defaultLang;

$securityHeaders = [
    'X-Content-Type-Options' => 'nosniff',
    'X-Frame-Options' => 'SAMEORIGIN',
    'Referrer-Policy' => 'strict-origin-when-cross-origin',
    'Permissions-Policy' => 'geolocation=(), microphone=(), camera=()',
    'X-XSS-Protection' => '0',
];

foreach ($securityHeaders as $name => $value) {
    header($name . ': ' . $value);
}

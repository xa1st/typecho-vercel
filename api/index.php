<?php
$file = __DIR__ . '/..' . $_SERVER["PHP_SELF"];
if (file_exists($file)) return false;

// 压缩检测逻辑，专门用于vercel，因为vercel的serverless并不会压缩
if (!headers_sent()) { // 确保未发送过HTTP头
    $acceptEncoding = isset($_SERVER['HTTP_ACCEPT_ENCODING']) ? $_SERVER['HTTP_ACCEPT_ENCODING'] : '';
    // 优先Brotli（需服务器支持），其次GZIP
    if (function_exists('brotli_compress') && strpos($acceptEncoding, 'br') !== false) {
        ob_start(function($buffer) {
            return brotli_compress($buffer, 11); // 最高压缩级别
        });
        header('Content-Encoding: br');
    } elseif (function_exists('gzencode') && strpos($acceptEncoding, 'gzip') !== false) {
        ob_start('ob_gzhandler'); // 使用PHP内置GZIP压缩
        header('Content-Encoding: gzip');
    } else {
        ob_start(); // 无压缩
    }
}
require_once __DIR__ . '/../index.php';

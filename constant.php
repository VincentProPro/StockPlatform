<?php
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $host = $_SERVER['SERVER_NAME'];
    $urlsite = $protocol . $host . "/StockPlatform";
    // $url = $protocol . $host . $_SERVER['REQUEST_URI'];
    // echo $url;

    
?>
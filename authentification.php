<?php
//   header("Content-Security-Policy: default-src 'self'; style-src 'self' http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css 'unsafe-inline' ; script-src 'self' https://cdn.plot.ly/plotly-2.18.0.min.js http://code.jquery.com/jquery-1.9.1.js http://code.jquery.com/ui/1.10.4/jquery-ui.js , http://localhost/* , http://code.jquery.com/*;");
//   header("Content-Security-Policy: default-src 'self' 'unsafe-inline'; child-src 'self'; object-src 'none'; style-src 'self' 'sha256-wA0unBsBQX39JscS8ZNduJRExcDE7PwXbuBkT1fDJkQ=' 'unsafe-inline';");
  header("Strict-Transport-Security: max-age=31536000; includeSubDomains");
  header("X-FRAME-OPTIONS: DENY");
  header("X-Content-Type-Options: nosniff");
  header("X-XSS-Protection: 1; mode=block");
  header("Referrer-Policy: no-referrer-when-downgrade");
  header("X-Download-Options: noopen");
  header("X-Permitted-Cross-Domain-Policies: none");
  header("Expect-CT: max-age=0, enforce");

  // Store the current time in a variable
$current_time = time();

// Check if the IP address is in the rate limit cache
if (!isset($_SESSION['rate_limit_cache'][$_SERVER['REMOTE_ADDR']])) {
  // If the IP address is not in the cache, initialize the rate limit data
  $_SESSION['rate_limit_cache'][$_SERVER['REMOTE_ADDR']] = [
    'requests' => 0,
    'timestamp' => $current_time,
  ];
}

// Increment the number of requests for this IP address
$_SESSION['rate_limit_cache'][$_SERVER['REMOTE_ADDR']]['requests']++;

// Check if the number of requests is within the limit
if ($_SESSION['rate_limit_cache'][$_SERVER['REMOTE_ADDR']]['requests'] > 1000) {
  // If the number of requests is greater than the limit, check the time difference
  $time_difference = $current_time - $_SESSION['rate_limit_cache'][$_SERVER['REMOTE_ADDR']]['timestamp'];
  if ($time_difference < 3600) {
    // If the time difference is less than an hour, return an error message
    header("HTTP/1.1 429 Too Many Requests");
    exit("Too many requests. Please try again later.");
  } else {
    // If the time difference is greater than an hour, reset the rate limit data
    $_SESSION['rate_limit_cache'][$_SERVER['REMOTE_ADDR']] = [
      'requests' => 0,
      'timestamp' => $current_time,
    ];
  }
}


        session_start();
        // $_SESSION["matricule"] = ;  

 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: http://localhost/StockPlatform/logout.php");
    exit;
}else{
    //generate token
    include_once "mytokens.php";
    $objecttoken= new Mytokens();
    if($objecttoken->authenticateRequest()===true){

    }else{
        header("location: http://localhost/StockPlatform/logout.php");
        exit;

    }

    // echo"good authen";
}
<?php

  header("Content-Security-Policy: default-src 'self';");
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
if ($_SESSION['rate_limit_cache'][$_SERVER['REMOTE_ADDR']]['requests'] > 100) {
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
chromium.googlesourse.com/chromium/src/net/+/master/http/transport_security_state_static.json
  
setcookie('cookie', rand(100, 999), 0, '/', '', false, true);
session.use_strict_mode = 1  
session.cookie_secure = 1
session.use_only_cookie = 1
session.cookie_httponly = 1
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Security-Policy" content="default-src 'self'; img-src https://*; child-src 'none';" />
  <meta charset="UTF-8">
  <meta name="description" content="Stock Platform">
  <!-- <meta name="keywords" content="HTML, CSS, JavaScript"> -->
  <meta name="author" content="Vincent Sakouvogui">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head> 
<body>

<h2>HTML Forms</h2>

<form action="security.php" method="GET">
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value="John"  ><br>
  <!-- <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" value="Doe"><br><br> -->
  <input type="submit" value="Submit">
</form> 

<p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>
<script >

  alert(11);
</script>
</body>
</html>
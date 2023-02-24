<?php
class Mytokens{
    function __construct(){}


    function generateToken() {
        $token = bin2hex(random_bytes(32)); // generate a random 32-byte token
        return $token;
      }
    function storeToken($userId, $token) {
        include('db/config.php');
        // global $pdo; // Assuming you have a PDO object created
        $stmt = $pdo->prepare("INSERT INTO tokens (user_id, token) VALUES (?, ?)");
        $stmt->execute([$userId, $token]);
        // Set the token in a cookie

        // setcookie('token', $token, time() + 3600, '/', 'http://localhost', false, true);
        // $_SESSION["token"] = $token;

      }
      function authenticateRequest() {
        $token = $_SESSION['token'];
        // $token = $_COOKIE['token'];
        // $token = $_REQUEST['token'];
        $userId = $this->getUserIdFromToken($token);
        // echo '<script type="text/javascript">alert("userid '.$userId.' token '.$token.'")</script>';

        if (!$userId) {
          // token is invalid or expired
          // echo '<script type="text/javascript">alert("in valid")</script>';

          return false;
        } else {
          // token is valid, proceed with request
          // echo '<script type="text/javascript">alert("valid")</script>';

          return true;
        }
      }
      
      function getUserIdFromToken($token) {
        include("db/config.php");
        // global $pdo; // Assuming you have a PDO object created
        $stmt = $pdo->prepare("SELECT user_id FROM tokens WHERE token = ?");
        $stmt->execute([$token]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
          return $result['user_id'];
        } else {
          return false;
        }
      }
      function renewToken($userId, $oldToken) {
        include_once("db/config.php");

        // global $pdo; // Assuming you have a PDO object created
        // generate new token
        $newToken = $this->generateToken();
        // update token in "tokens" table
        $stmt = $pdo->prepare("UPDATE tokens SET token = ? WHERE user_id = ? AND token = ?");
        $stmt->execute([$newToken, $userId, $oldToken]);
        return $newToken;
      }
                    

    // function generateToken() {
    //     $token = bin2hex(random_bytes(32)); // generate a random 32-byte token
    //     return $token;
    //   }

    //   function storeToken($userId, $token) {
    //     // insert the token and user ID into the "tokens" table
    //     $db->query("INSERT INTO tokens (user_id, token) VALUES ('$userId', '$token')");
    //   }
    //   function authenticateRequest() {
    //     $token = $_REQUEST['token'];
    //     $userId = getUserIdFromToken($token);
    //     if (!$userId) {
    //       // token is invalid or expired
    //       return false;
    //     } else {
    //       // token is valid, proceed with request
    //       return true;
    //     }
    //   }
      
    //   function getUserIdFromToken($token) {
    //     // retrieve user ID from "tokens" table based on token
    //     $result = $db->query("SELECT user_id FROM tokens WHERE token='$token'");
    //     if ($result->num_rows == 1) {
    //       $row = $result->fetch_assoc();
    //       return $row['user_id'];
    //     } else {
    //       return false;
    //     }
    //   }
    //   function renewToken($userId, $oldToken) {
    //     // generate new token
    //     $newToken = generateToken();
        
    //     // update token in "tokens" table
    //     $db->query("UPDATE tokens SET token='$newToken' WHERE user_id='$userId' AND token='$oldToken'");
        
    //     return $newToken;
    //   }
                  
}
?>
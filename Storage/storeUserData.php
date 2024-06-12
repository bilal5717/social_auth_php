<?php
session_start();

if(isset($_SESSION['userData'])){
  $userInfo = json_decode($_POST['userData'], true);

  // Check if user data is valid
  if($userInfo){
    // Store user data in session
    $_SESSION['userData'] = $userInfo;

    // Send success response back to JavaScript
    echo "User data stored successfully.";
  } else {
    // Send error response back to JavaScript
    echo "Invalid user data.";
  }
} else {
  echo "No user data received.";
}
?>

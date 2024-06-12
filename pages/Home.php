<?php
session_start();

// Assuming you've received the user data from the session
$userData = $_SESSION['userData'] ?? null;

if (!$userData) {
  echo "<div>No user data found</div>";
  exit; // Exit the script if no user data found
}

function escape($data) {
  return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <link href="./Home.css" rel="stylesheet">
</head>
<body>
  <main>
    <header>
      <img src="<?php echo escape($userData['photoURL']); ?>" alt="<?php echo escape($userData['displayName']); ?>"> <!-- Dynamic user image URL and name -->
      <div>
        <h2><?php echo escape($userData['displayName']); ?></h2> <!-- Dynamic user name -->
        <p><?php echo escape($userData['email']); ?></p> <!-- Dynamic user email -->
      </div>
      <button type="button" onclick="signOut()">Sign Out</button>
    </header>
    <section>
      <div>
        <p><?php echo escape($userData['bio'] ?? 'This is the user bio'); ?></p> <!-- Dynamic user bio, default if not set -->
        <div>
          <p><span><?php echo escape($userData['followers'] ?? '0'); ?></span> Followers</p> <!-- Dynamic followers count, default if not set -->
          <p><span><?php echo escape($userData['following'] ?? '0'); ?></span> Following</p> <!-- Dynamic following count, default if not set -->
          <p><?php echo escape($userData['location'] ?? 'Location'); ?></p> <!-- Dynamic user location, default if not set -->
        </div>
      </div>
    </section>
  </main>

  <script src="../AuthProviders/GoogleProvider.js"> </script>
</body>
</html>

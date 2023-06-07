<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> hola admin</h1>
    <form action ="process.php" method="post" >
	<input type="submit" value="Salir"/>
    </form>
</body>
</html>

<?php
  $inactive = 5;
  ini_set('session.gc_maxlifetime', $inactive);

  session_start();

  //Time Validation
  if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 10)) {
    // last request was more than 5 seconds ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage

    // Send message to user and redirect
    echo '<script language="javascript">';
    echo 'alert("La session ha expirado"); window.location.href="index.html"';
    echo '</script>';

  }
  $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
?>

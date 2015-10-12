<?php
session_start();
// Unset all of the session variables.
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();
echo 'Logout successful!';
header("location:/seaco/home.php");
exit();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<html>
<link rel="stylesheet" href="style/style.php" media="screen">
<center><h1><head>Log out</head></h1></center>
        
     <body>      <p> You were successfully Logged out.<p>
		   <a href="home.php">Home Page</a>
            </form>
			</body>
			</html>
 <?php 

require_once 'app/init.php';


$client = new Google_Client();
$auth = new Auth($client);

?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Google Auth Simple</title>
 </head>
 <body>

 	<?php if (!$auth->signedIn()): ?>
		<a href="<?php echo $auth->getAuthUrl(); ?>">Log In with Google</a>
 	<?php else: ?>
		Your're signed in.<a href="leave.php">Leave this place</a>
	<?php endif; ?>
 
 </body>
 </html>
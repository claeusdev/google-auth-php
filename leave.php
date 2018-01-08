<?php 

require_once 'app/init.php';

$auth = new Auth();

session_destroy();

header('Location: index.php')

 ?>
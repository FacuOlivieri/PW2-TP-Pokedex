<?php
session_start();
$_SESSION = [];
setcookie("Admin_Pokedex", '', time() - 3600, "/");
session_destroy();
header("Location: index.php");
exit();
?>

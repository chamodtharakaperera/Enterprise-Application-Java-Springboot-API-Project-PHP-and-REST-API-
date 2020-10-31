<?php
session_start();
unset($_SESSION["uname"]);
unset($_SESSION["utype"]);
unset($_SESSION["email"]);
session_destroy();
header("Location: index.php");

?>
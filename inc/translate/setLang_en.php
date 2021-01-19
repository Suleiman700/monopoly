<?php
session_start();
unset($_SESSION["lang_ar"]);
//$_SESSION["lang_ar"] = false;
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
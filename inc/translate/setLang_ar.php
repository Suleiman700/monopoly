<?php
session_start();
unset($_SESSION["lang_ar"]);
$_SESSION["lang_ar"] = true;
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
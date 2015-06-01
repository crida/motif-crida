<?php
session_start();
$_SESSION = null;

header("Location: index.php");

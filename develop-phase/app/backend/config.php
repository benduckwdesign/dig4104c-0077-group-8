<?php

// Set to the site root if not set properly automatically. Example: http://localhost/
$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

// Set to the subfolder where the site files are served from the site root. Example: app/
$subfolder = "dig4104c-0077-group-8/develop-phase/app/";

// This is set to the site root with the subfolder. Example: http://localhost/app/
$siteroot = $root.$subfolder;



// Uncomment anything below for testing only. Not for production use.

// echo $root;
// $web_root = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/";
// echo $web_root;
// $protocol = $_SERVER['HTTPS'] == '' ? 'http://' : 'https://';
// $folder = $protocol . $_SERVER['HTTP_HOST'] . '/' . basename($_SERVER['REQUEST_URI']);
// echo $folder;
// $protocol = $_SERVER['HTTPS'] == '' ? 'http://' : 'https://';
// $folder = $protocol . $_SERVER['HTTP_HOST'];
// echo $folder;

?>

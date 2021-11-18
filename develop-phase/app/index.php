<?php

// <!-- Check for initialization -->

include 'backend/database_init.php';

// <!-- Redirect user to home if signed in -->

header("Location: home");

// <!-- Failsafe, redirect user to login page -->



exit;

?>
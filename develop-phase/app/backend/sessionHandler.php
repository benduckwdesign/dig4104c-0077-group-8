<?php

session_start();

function isLoggedIn() {
    # User is definitely logged in if the following occurs:
    if (isset($_SESSION['loggedin']) == True) {
        if (!empty($_SESSION['loggedin']) == True) {
            return True;
        }
    }
    return False;
}

function logInUser($user) {
    $_SESSION['loggedin'] = True;
    setcookie("display_name", $user, time() + (86400 * 30), "/");
}

function logOutUser() {
    if (session_status() != PHP_SESSION_NONE) {
        # Now we can destroy the session.
        unset($_SESSION);
        session_destroy();
    }
}

?>
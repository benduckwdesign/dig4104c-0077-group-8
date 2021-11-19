<?php

session_start();

if (!empty($_SESSION['nickname'])) {
    $notice_title = "You have successfully logged out, ".$_SESSION['nickname'].".";
    $notice_msg = "We hope to see you again soon.";

    if (session_status() != PHP_SESSION_NONE) {
        # Now we can destroy the session.
        unset($_SESSION);
        session_destroy();
    }

    session_start();

    $_SESSION['process_notice_unseen'] = True;
    $_SESSION['process_notice_msg_title'] = $notice_title;
    $_SESSION['process_notice_msg'] = $notice_msg;

}

header("Location: ".$siteroot."../signin/");

?>
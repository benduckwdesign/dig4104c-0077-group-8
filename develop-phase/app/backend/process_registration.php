<?php

session_start();

function dbIfAccountEmailAlreadyExists($accountNameString) {
    
    $path = [__DIR__,"getDatabaseConnection.php"];
    include_once(join(DIRECTORY_SEPARATOR, $path));

    $mysqliDbConnection = getDatabaseConnection();

    $accountNameString = mysqli_real_escape_string($mysqliDbConnection, $accountNameString);

    $statement = $mysqliDbConnection->prepare("SELECT `id` FROM `users` WHERE `email` = ?");

    $statement->bind_param("s", $accountNameString);

    $statement->execute();

    $result = $statement->get_result();

    $num_of_rows = $result->num_rows;

    $mysqliDbConnection->close();

    if ($num_of_rows > 0) {
        return True;
    } else {
        return False;
    }

}

function dbCreateNewAccount() {

    $path = [__DIR__,"getDatabaseConnection.php"];
    include_once(join(DIRECTORY_SEPARATOR, $path));

    $con = getDatabaseConnectionPreparedStatements();

    if (!$con)
    {
        echo 'Not Connected To Server';
    }

    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, password_hash($_POST['password'], PASSWORD_DEFAULT));
    $nickname = mysqli_real_escape_string($con, $_POST['nickname']);
    $ucfid = mysqli_real_escape_string($con, $_POST['ucfid']);

    $statement = $con->prepare("INSERT INTO `users` (`full_name`, `email`, `password`, `nickname`, `ucfid`) VALUES (?, ?, ?, ?, ?)");

    if ($statement == FALSE) {
        echo 'Failed to prepare statement';
    }

    $statement->bind_param("sssss", $fullname, $email, $password, $nickname, $ucfid);

    $statement->execute();

    if (!$statement)
    {
        echo 'Not Inserted';
    }
    else {
        echo 'Inserted';
    }

    mysqli_close($con);

    // // echo mysqli_error($con);

    // header("refresh:2; Location: ./create.php");


}

function failedProcess($process_notice_msg) {
    # Since it failed, send them back to the same page.
    # But send back the error message too.
    $_SESSION['process_notice_unseen'] = True;
    $_SESSION['process_notice_msg_title'] = "Uh-oh!";
    $_SESSION['process_notice_msg'] = $process_notice_msg." Please try again.";

    include("config.php");
    header("Location: ".$siteroot."register/");
    exit();

    // processEnd();
}

# Alias if this ever becomes external
function processEnd() {

    echo $_SESSION['process_notice_msg_title'];
    echo $_SESSION['process_notice_msg'];

    exit();
}

function successfulProcess() {
    $_SESSION['process_notice_unseen'] = True;
    $_SESSION['process_notice_msg_title'] = "Welcome to the UCF Student Center!";
    $_SESSION['process_notice_msg'] = "You have successfully created an account, ".$_SESSION['nickname'].".";
    #header("Location: ./index.php");
    #exit();

    include("config.php");
    header("Location: ".$siteroot."signin/");
    exit();

    // processEnd();
}

function isFullMatch($input, $regexp) {
    if ($regexp == "YOU_SHOULD_WATCH_THE_SHERLOCK_HOUND_OPENER_I_HIGHLY_RECOMMEND_IT_AND_MOB_PSYCHO_100_AND_WHISPER_OF_THE_HEART_BY_STUDIO_GHIBLI") {
        if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
            return True;
        }
    } else {
        # Not an email.
        $matches = array();
        preg_match($regexp, $input, $matches);
        if ($matches[0] == $input) {
            return True;
        }
    }
    return False;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $path = [__DIR__,"getDatabaseConnection.php"];
    include_once(join(DIRECTORY_SEPARATOR, $path));

    $conn = getDatabaseConnection();

    $process_notice_msg = "";

    if (empty($_POST['email'])) {
        $process_notice_msg = "Email was not submitted correctly.";
        failedProcess($process_notice_msg);
    } elseif (empty($_POST['nickname'])) {
        $process_notice_msg = "Nickname was not submitted correctly.";
        failedProcess($process_notice_msg);
    } elseif (empty($_POST['password'])) {
        $process_notice_msg = "Password was not submitted correctly.";
        failedProcess($process_notice_msg);
    } elseif (empty($_POST['fullname'])) {
        $process_notice_msg = "Full name was not submitted correctly.";
        failedProcess($process_notice_msg);
    } elseif (empty($_POST['ucfid'])) {
        $process_notice_msg = "UCF ID was not submitted correctly.";
        failedProcess($process_notice_msg);
    } elseif (!isFullMatch($_POST['email'], "YOU_SHOULD_WATCH_THE_SHERLOCK_HOUND_OPENER_I_HIGHLY_RECOMMEND_IT_AND_MOB_PSYCHO_100_AND_WHISPER_OF_THE_HEART_BY_STUDIO_GHIBLI")) {
        $process_notice_msg = "That email address looks incorrect.";
        failedProcess($process_notice_msg);
    } elseif (strlen($_POST['email']) > 255) {
        $process_notice_msg = "That email is too long (emails are limited to 255 characters.)";
        failedProcess($process_notice_msg);
    } elseif (strlen($_POST['password']) > 80) {
        $process_notice_msg = "That password is too long (passwords are limited to 80 characters.)";
        failedProcess($process_notice_msg);
    } elseif (dbIfAccountEmailAlreadyExists($_POST['email'])) {
        $process_notice_msg = "That email address is already taken.";
        failedProcess($process_notice_msg);
    } else {
        # Add user to database.
        dbCreateNewAccount();

        # Everything looks good. User has signed up (and create a new session with that information. Or just be complacent like everyone else and keep the same session.)
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['fullname'] = $_POST['fullname'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['nickname'] = $_POST['nickname'];
        $_SESSION['ucfid'] = $_POST['ucfid'];
        successfulProcess();
    }

} else {
    header("Location: ".$siteroot."../register/");
    exit();
}

?>
<?php

session_start();

if (!empty($_POST)) {
    extract($_POST);
    $_SESSION['error'] = array();

    if (empty($fnm)) {
        $_SESSION['error']['fnm'] = "Please enter Full Name";
    }

    if (empty($mno)) {
        $_SESSION['error']['mno'] = "Please enter Mobile Number";
    } else if (!is_numeric($mno)) {
        $_SESSION['error']['mno'] = "Please enter numeric Mobile Number";
    }

    if (empty($msg)) {
        $_SESSION['error']['msg'] = "Please enter Message";
    }

    if (empty($email)) {
        $_SESSION['error']['email'] = "Please enter E-Mail ID";
    }

    if (!empty($_SESSION['error'])) {
        header("location:contact_add.php");
        exit;
    } else {
        include("../includes/connection.php");

        $t = time();

        $fnm_safe   = mysqli_real_escape_string($link, $fnm);
        $mno_safe   = mysqli_real_escape_string($link, $mno);
        $email_safe = mysqli_real_escape_string($link, $email);
        $msg_safe   = mysqli_real_escape_string($link, $msg);

        $q = "insert into contact(c_fnm,c_mno,c_email,c_msg,c_time) values('$fnm_safe','$mno_safe','$email_safe','$msg_safe','$t')";

        mysqli_query($link, $q);

        header("location:contact_view.php");
        exit;
    }
} else {
    header("location:contact_add.php");
    exit;
}


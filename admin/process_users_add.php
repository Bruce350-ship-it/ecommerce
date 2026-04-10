<?php

session_start();

include("../includes/connection.php");

if (!empty($_POST)) {
    $r_fnm   = trim($_POST['r_fnm'] ?? '');
    $r_unm   = trim($_POST['r_unm'] ?? '');
    $r_pwd   = $_POST['r_pwd'] ?? '';
    $r_cno   = trim($_POST['r_cno'] ?? '');
    $r_email = trim($_POST['r_email'] ?? '');

    // basic validation
    if ($r_fnm === '' || $r_unm === '' || $r_pwd === '') {
        $_SESSION['error']['user_add'] = "Full name, username and password are required.";
        header("Location: Users_add.php");
        exit;
    }

    $t = time();
    $hashedPwd = md5($r_pwd);

    $stmt = $link->prepare("INSERT INTO register (r_fnm, r_unm, r_pwd, r_cno, r_email, r_time) VALUES (?, ?, ?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("sssssi", $r_fnm, $r_unm, $hashedPwd, $r_cno, $r_email, $t);
        $stmt->execute();
        $stmt->close();
    }

    header("Location: Users_view.php");
    exit;
} else {
    header("Location: Users_add.php");
    exit;
}


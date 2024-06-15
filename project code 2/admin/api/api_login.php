<?php
require('../includes/conn.php');

if (isset($_POST['username'])) {
    $username = mysqli_escape_string($conn, $_POST['username']);
    $password = mysqli_escape_string($conn, $_POST['password']);

    $fetchDataSql = "SELECT * FROM users WHERE username= '$username' ";
    $fdresult = mysqli_query($conn, $fetchDataSql);
    $row = mysqli_fetch_array($fdresult);
    if ($row == null) {
        session_start();
        $_SESSION['msg'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Warning!</strong> Invalid Credentials.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        header('location: ../login.php');
    } else {
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['logged'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_type'] = $row['user_type'];
            header('location: ../index.php');
        } else {
            session_start();
            $_SESSION['msg'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Warning!</strong> Invalid Credentials.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
            header('location: ../login.php');
        }
    }
}

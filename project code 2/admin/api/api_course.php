<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    require('../includes/conn.php');
} else {
    header('location: login.php');
}

if (isset($_POST['title'])) {
    $title = mysqli_escape_string($conn, $_POST['title']);
    $cate = mysqli_escape_string($conn, $_POST['cate']);
    $link = mysqli_escape_string($conn, $_POST['link']);
    $price = mysqli_escape_string($conn, $_POST['price']);
    $thumb = mysqli_escape_string($conn, $_POST['thumb']);
  

    $addDataSql = "INSERT INTO `courses`(`name`, `cate`, `thumbnail`, `price`, `link`) VALUES ('$title','$cate','$thumb','$price','$link')";
    $adresult = mysqli_query($conn, $addDataSql);
    if ($adresult) {
        session_start();
        $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>success!</strong> Course Added Successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        header('location: ../courses.php');
    } else {
        session_start();
        $_SESSION['msg'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Warning!</strong> Something went wrong!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        header('location: ../courses.php');
    }
}

if (isset($_GET['del'])) {
    $del = mysqli_escape_string($conn, $_GET['del']);
    $addDataSql = "DELETE FROM `courses` WHERE id = $del";
    $adresult = mysqli_query($conn, $addDataSql);
    if ($adresult) {
        session_start();
        $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>success!</strong> Course Deleted Successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        header('location: ../courses.php');
    } else {
        session_start();
        $_SESSION['msg'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Warning!</strong> Something went wrong!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        header('location: ../courses.php');
    }
}

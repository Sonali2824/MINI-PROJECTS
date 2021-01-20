<?php
    session_start();
    if(!isset($_SESSION["user"])) {
        header("Location: http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/student_faculty_login/student_log_in.html");
        exit();
    }
?>
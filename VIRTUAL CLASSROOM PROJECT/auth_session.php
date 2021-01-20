<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/student_faculty_login/faculty_log_in.html");
        exit();
    }
?>
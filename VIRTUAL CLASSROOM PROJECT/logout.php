<?php
    session_start();
    // Destroy session
    if(session_destroy()) {
        // Redirecting To Home Page
        header("Location: http://localhost/VIRTUAL%20CLASSROOM%20PROJECT/landing%20page/index.html");
    }
?>
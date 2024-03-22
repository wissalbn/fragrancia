<?php
session_start();
if (isset($_POST['logout'])) {
        unset($_SESSION['userId']);
        $_SESSION = [];
        
        session_destroy();
    
        header('Location: login.php');
        exit;
    }
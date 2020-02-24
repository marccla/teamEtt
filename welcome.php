<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<? include('templates/head.php'); ?>
<? include('templates/nav.php'); ?>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>
    <p>
        <a href="log-out.php" class="btn">Sign Out of Your Account</a>
    </p>

    <? include('templates/events-for-welcome.php'); ?>
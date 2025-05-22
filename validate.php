<?php
session_start();

$valid_username = "Navish";
$valid_password = "password";

$username = $_POST['username'];
$password = $_POST['password'];


$_SESSION['username'] = $username;

if ($valid_username === $username && $valid_password === $password) {
    $_SESSION['authenticated'] = 1;
    $_SESSION['failed_attempts'] = 0; //reset
    header("Location: index.php");
    exit();
} else {

    if (!isset($_SESSION['failed_attempts'])) {
        $_SESSION['failed_attempts'] = 1;
    } else {
        $_SESSION['failed_attempts'] += 1;
    }

    
    echo "<p>This is unsuccessful attempt number " . $_SESSION['failed_attempts'] . "</p>";
    echo "<p><a href='login.php'>Try Again</a></p>";
}
?>

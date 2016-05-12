<?php
include('header.html');

session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);

echo '<h1>You have logged out</h1>';

header('Refresh: 1; URL = index.html');

include('footer.html');
?>
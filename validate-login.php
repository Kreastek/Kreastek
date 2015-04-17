<?php
include 'Database.php';
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 11-12-2014
 * Time: 13:02
 */

// username and password sent from form
$username=$_POST['username'];
$password=$_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

Database::login($username, $password);
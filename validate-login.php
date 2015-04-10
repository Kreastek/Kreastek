<?php
include 'Database.php';
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 11-12-2014
 * Time: 13:02
 */

$tbl_name="dbo.accounts"; // Table name

// Connect to server and select databse.


// username and password sent from form
$username=$_POST['username'];
$password=$_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)
//$username = stripslashes($username);
//$password = stripslashes($password);
//$username = mysql_real_escape_string($username);
//$password = mysql_real_escape_string($password);
$query = "SELECT * FROM $tbl_name WHERE gebruikersnaam='$username' and wachtwoord='$password'";
$result = mysqli_query($db, $query);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    header("location:login_success.php");
}
else {
    echo "Wrong Username or Password";
}
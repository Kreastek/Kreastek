<?php
session_start();
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
if (Database::login($username, $password)) {
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    ?>
    <script type="text/javascript">
        window.location = "index.php"
    </script>
<?php
}
?>
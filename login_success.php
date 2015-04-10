<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 11-12-2014
 * Time: 13:21
 */
session_start();
if(empty($_SESSION['username']))
{
    echo "fuk u dud";
}
else{
?>

<html>
<body>
Login Successful
</body>
</html>
<?php } ?>
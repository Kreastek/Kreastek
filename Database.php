<?php
    include 'Credentials.php';

class Database
{
    private static function connect()
    {
        $conn = sqlsrv_connect(Credentials::$HostRemote, Credentials::$ConnInfoRemote); //, Credentials::$User, Credentials::$Password);
        return $conn;
    }

    public static function getKlanten()
    {
        //open conenction
        $connection = self::connect();

        //run query
        $query = sqlsrv_query($connection, "SELECT * FROM dbo.klanten");

        $results = array();
        $index = 0;

        //put results into array
        while ($row = sqlsrv_fetch_array($query))
        {
            $results[$index] = $row;
            $index++;
        }

        //return array
        return $results;
    }
}

?>

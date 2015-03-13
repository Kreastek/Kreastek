<?php
    include 'Credentials.php';

class Database
{
    private static function connect()
    {
        //Try to connect to local DB
        $conn = sqlsrv_connect(Credentials::$HostLocal);

        if($conn == null)
        {
            //Connection to local DB did not succeed, try connect to the remote ip (for when you are debugging).
            $conn = sqlsrv_connect(Credentials::$HostRemote, Credentials::$ConnInfoRemote);

            return $conn;
        }

        return $conn;
    }

    public static function getKlanten()
    {
        //open conenction
        $connection = self::connect();

        if($connection != null)
        {
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

        return null;
    }

    public static function setKlant()
    {

    }
}

?>

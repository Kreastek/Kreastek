<?php
    include 'Credentials.php';

class Database
{
    private static function connect()
    {
        //echo gethostname();
        //Try to connect to local DB
        //$conn = sqlsrv_connect(Credentials::$HostLocal);

        //if($conn == null)
        //{
            //Connection to local DB did not succeed, try connect to the remote ip (for when you are debugging).
            $conn = sqlsrv_connect(Credentials::$HostRemote, Credentials::$ConnInfoRemote);

            return $conn;
        //}

        return $conn;
    }

    public static function getProducten()
    {
        //open conenction
        $connection = self::connect();

        if($connection != null)
        {
            //run query
            $query = sqlsrv_query($connection, "SELECT * FROM dbo.Producten");

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

    public static function getProduct($id)
    {
        $connection = self::connect();

        if($connection != null)
        {
            $query = sqlsrv_query($connection, "SELECT TOP 1 * FROM dbo.Producten WHERE Product_ID = 1");

            $results = array();
            $index = 0;

            while($row = sqlsrv_fetch_array($query))
            {
                $results[$index] = $row;
                $index++;
            }

            return $results;

        }

    }
}

?>

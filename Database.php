<?php
    include 'Credentials.php';

class Database
{
    private static function connect()
    {
        //echo gethostname();
        //Try to connect to local DB on Mike's pc
        $conn = sqlsrv_connect(Credentials::$HostRemote, Credentials::$ConnInfoRemote);
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

    public static function getCategorieen()
    {
        $connection = self::connect();

        if ($connection != null)
		{
            $query = sqlsrv_query($connection, "SELECT * FROM dbo.Categorieen");

            $results = array();
            $index = 0;

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

	//Get specific product
    public static function getProduct($id)
    {
        if($id != null && $id != "")
        {
            $connection = self::connect();

            if($connection != null)
            {
                $query = sqlsrv_query($connection, "SELECT TOP 1 * FROM dbo.Producten WHERE Product_ID = $id");

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

		return null;
    }

    public static function getCategorie($id)
    {
        if($id != null && $id != "")
        {
            $connection = self::connect();

            if($connection != null)
            {
                $query = sqlsrv_query($connection, "SELECT TOP 1 * FROM dbo.Categorieen WHERE Categorie_ID = $id");

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

		return null;
    }

    public static function getProductenFromCategorie($id)
    {
        if($id != null && $id != "")
        {
            $connection = self::connect();

            if($connection != null)
            {
                $query = sqlsrv_query($connection, "SELECT * FROM dbo.Producten WHERE Categorie_ID = $id");

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

		return null;
    }

    public static function login($username, $password)
    {
        if($username != null && $username != "" && $password != null && $password != "")
        {
            $connection = self::connect();

            if($connection != null)
            {
                $query = sqlsrv_query($connection, "SELECT * FROM dbo.Accounts WHERE Gebruikersnaam = '" . $username . "' AND Wachtwoord = '" . $password . "'" , array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
                $amount = sqlsrv_num_rows($query);
                return ($amount == 1);
            }
        }

		return null;
    }
}


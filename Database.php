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

	public static function getAfbeeldingenBijProduct($id)
	{
		if($id != null && $id != "")
		{
			$connection = self::connect();

			if($connection != null)
			{
				$query = sqlsrv_query($connection, "SELECT Source FROM Afbeeldingen WHERE Product_ID = $id");

				$results = array();
				$index = 0;

				while($row = sqlsrv_fetch_array($query))
				{
					$results[$index] = $row["Source"];
					$index++;
				}

				return $results;
			}
		}

		return null;
	}

    public static function login($email, $password)
    {
        if($email != null && $email != "" && $password != null && $password != "")
        {
            $connection = self::connect();

            if($connection != null)
            {
                $query = sqlsrv_query($connection, "SELECT * FROM Accounts WHERE Email = '" . $email . "' AND Wachtwoord = '" . $password . "'" , array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
                $amount = sqlsrv_num_rows($query);
				$account = sqlsrv_fetch_array($query);

				if($amount == 1)
					return $account['Rol'];
				else
					return null;
            }
        }

		return null;
    }

	public static function getKlanten($zoektekst = null)
	{
		$connection = self::connect();

		if($connection != null)
		{
			if($zoektekst == null)
			{
				$query = sqlsrv_query($connection, "SELECT Accounts.Account_ID, Accounts.Email, Klanten.* FROM Accounts INNER JOIN Klanten ON Accounts.Account_ID = Klanten.Klant_ID WHERE Rol = 1" , array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
			}
			else
			{
				$query = sqlsrv_query($connection, "SELECT Accounts.Account_ID, Accounts.Email, Klanten.* FROM Accounts INNER JOIN Klanten ON Accounts.Account_ID = Klanten.Klant_ID WHERE Rol = 1 WHERE Rol = 1 AND Gebruikersnaam = '" . $zoektekst . "'" , array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
			}

			return sqlsrv_fetch_array($query);
		}

		return null;
	}
}
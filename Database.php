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

	public static function deleteProduct($id)
	{
		$connection = self::connect();

		if ($connection != null && $id != null) {

			$query = sqlsrv_query($connection, "DELETE FROM Producten WHERE Product_ID = $id");
			if (sqlsrv_rows_affected($query) > 0) {
				return true;
			}

		}
		return false;
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
				$query = sqlsrv_query($connection, "SELECT TOP 1 Naam FROM dbo.Categorieen WHERE Categorie_ID = $id");
				$row = sqlsrv_fetch_array($query);
				return $row[0];
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

	public static function addBestellign()
	{
		require_once 'PhpMailer/PHPMailerAutoload.php';

		$connection = self::connect();

		if($connection != null && isset($_SESSION['email']) && isset($_SESSION['producten']))
		{

			$bestelling_ID = self::getGUID();
			$userID = self::getUserID();
			$date = "GETDATE()";

			$sql = "INSERT INTO Bestellingen (Bestelling_ID, Datum, Klant_ID) VALUES('" . $bestelling_ID . "'," . $date . ", " . $userID[0] . ")";

			$stmt = sqlsrv_query($connection, $sql);

			foreach($_SESSION['producten'] as $key => $item)
			{
				$results = Database::getProduct($key);
				$product = $results[0];

				if($product != null)
				{
					$AantalPrijs = $product['Prijs'] * $item;

					$subsql = "INSERT INTO Bestelregels (Bestelling_ID, Product_ID, Product_Aantal, Bedrag) VALUES ('$bestelling_ID', $key, $item, $AantalPrijs)";
					$query = sqlsrv_query($connection, $subsql);
				}
			}

			unset($_SESSION['producten']);

			self::Mail();
		}
	}

	public static function getUserID()
	{
		$connection = self::connect();

		if($connection != null)
		{
			$email = $_SESSION['email'];
			$query = sqlsrv_query($connection, "SELECT TOP 1 Klant_ID FROM Accounts WHERE Email = '$email'");

			while($row = sqlsrv_fetch_array($query))
			{
				return $row;
			}
		}

		return null;
	}

	public static function getGUID(){
		if (function_exists('com_create_guid')){
			return com_create_guid();
		}else{
			mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
			$charid = strtoupper(md5(uniqid(rand(), true)));
			$hyphen = chr(45);// "-"
			$uuid = chr(123)// "{"
				.substr($charid, 0, 8).$hyphen
				.substr($charid, 8, 4).$hyphen
				.substr($charid,12, 4).$hyphen
				.substr($charid,16, 4).$hyphen
				.substr($charid,20,12)
				.chr(125);// "}"
			return $uuid;
		}
	}

	public static function Mail()
	{
		$mail = new PHPMailer();

		$mail->SMTPAuth = true;
		$mail->SMTPDebug = 0;

		$mail->isSMTP();
		$mail->Host = "smtp.live.com";
		$mail->Username = "kreastek@hotmail.com";
		$mail->Password = "PonsKaart";
		$mail->Port = 25;

		$mail->setFrom('kreastek@hotmail.com', 'Kreastek');
		$mail->addAddress($_SESSION['email'], "Mike Derksen");

		$mail->Subject = "Bestelling";
		$mail->Body = "Bedankt voor uw bestelling bij kreastek!";

		if(!$mail->Send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "Message sent!";
		}
	}


	public static function addProduct($titel, $omschrijving, $prijs, $categorieID, $afbeelding)
	{
		$connection = self::connect();
		if ($connection != null && $titel != null && $omschrijving != null && $prijs != null && $categorieID != null && $afbeelding != null) {

			$sql = "INSERT INTO Producten (Titel, Omschrijving, Prijs, Categorie_ID, Afbeelding) VALUES('$titel','$omschrijving',$prijs,$categorieID,'$afbeelding')";
			$setProduct = sqlsrv_query($connection, $sql);
			return ($setProduct);
		}
	}

	public static function editProduct($id, $titel, $omschrijving, $prijs, $categorieID, $afbeelding)
	{
		$connection = self::connect();
		if ($connection != null && $titel != null && $omschrijving != null && $prijs != null && $categorieID != null && $afbeelding != null) {

			$sql = "UPDATE Producten SET Titel='$titel', Omschrijving='$omschrijving', Prijs=$prijs, Categorie_ID=$categorieID, Afbeelding='$afbeelding' WHERE Product_ID=$id;";
			$setProduct = sqlsrv_query($connection, $sql);
			return ($setProduct);
		}
	}

	public static function deleteCategorie($id)
	{
		$connection = self::connect();

		if ($connection != null && $id != null) {
			$check = sqlsrv_query($connection, "SELECT TOP 1 * FROM Producten WHERE Categorie_ID=$id");
			echo sqlsrv_rows_affected($check);
			if (sqlsrv_num_rows($check) > 0) {
				return 2;
			}
			$query = sqlsrv_query($connection, "DELETE FROM Categorieen WHERE Categorie_ID = $id");
			if (sqlsrv_rows_affected($query) > 0) {
				return true;
			}

		}
		return false;
	}

	public static function addCategorie($naam)
	{
		$connection = self::connect();
		if ($connection != null && $naam != null) {
			$sql = "INSERT INTO Categorieen (Naam) VALUES('$naam')";
			$setCategorie = sqlsrv_query($connection, $sql);
			return ($setCategorie);
		}
	}

	public static function editCategorie($id, $naam)
	{
		$connection = self::connect();
		if ($connection != null && $naam != null) {

			$sql = "UPDATE Categorieen SET Naam='$naam' WHERE Categorie_ID=$id;";
			$setCategorie = sqlsrv_query($connection, $sql);
			return ($setCategorie);
		}
	}

	public static function getProductenFromSearchTerm($searchterm)
	{
		$connection = self::connect();

		if ($connection != null) {
			//run query
			$query = sqlsrv_query($connection, "SELECT * FROM Producten WHERE Titel LIKE '%$searchterm%'");

			$results = array();
			$index = 0;

			//put results into array
			while ($row = sqlsrv_fetch_array($query)) {
				$results[$index] = $row;
				$index++;
			}

			//return array
			return $results;
		}

		return null;
	}


}
<?php

    class GebruikerRepository extends Database {
        protected function findByGebruikersnaam($gebruikersnaam) {
            $sql = "SELECT * FROM gebruikers where gebruikersnaam = :gebruikersnaam";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":gebruikersnaam", $gebruikersnaam);
            $stmt->execute();

            return $stmt->fetch();
        }

        protected function add($familienaam, $voornaam, $straatnaam, $huisnummer, $gemeente, 
                            $postcode, $gebruikersnaam, $paswoord) {
            $sql = "INSERT INTO gebruikers (voornaam, familienaam, straat, huisnr, postcode, gemeente, gebruikersnaam, paswoord)
                    VALUES (:voornaam, :familienaam, :straatnaam, :huisnummer, :postcode, :gemeente, :gebruikersnaam, :paswoord)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":voornaam", $voornaam);
            $stmt->bindParam(":familienaam", $familienaam);
            $stmt->bindParam(":straatnaam", $straatnaam);
            $stmt->bindParam(":huisnummer", $huisnummer);
            $stmt->bindParam(":postcode", $postcode);
            $stmt->bindParam(":gemeente", $gemeente);
            $stmt->bindParam(":gebruikersnaam", $gebruikersnaam);
            $stmt->bindParam(":paswoord", $paswoord);
            $stmt->execute();
        }
    }

?>
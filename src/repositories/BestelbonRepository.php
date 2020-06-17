<?php

    class BestelbonRepository extends Database {
        protected function create($current_date, $voornaam, $familienaam, $straat, $huisnr, $gemeente, $postcode, $wijnen) {
            /* Create bestelbon */
            $sql = "INSERT INTO bestelbonnen(besteld, voornaam, straat, huisNr, postCode, gemeente, familienaam)
                    VALUES(:besteld, :voornaam, :straat, :huisNr, :postCode, :gemeente, :familienaam)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":besteld", $current_date);
            $stmt->bindParam(":voornaam", $voornaam);
            $stmt->bindParam(":straat", $straat);
            $stmt->bindParam(":huisNr", $huisnr);
            $stmt->bindParam(":gemeente", $gemeente);
            $stmt->bindParam(":postCode", $postcode);
            $stmt->bindParam(":familienaam", $familienaam);

            $stmt->execute();

            /* Get bestelbon id (max value) */
            $highest = $this->findHighestId();

            /* Create bestelbonlijnen */
            foreach ($wijnen as $wijn) {
                $sql = "INSERT INTO bestelbonlijnen(bonid, wijnid, aantal, prijs)
                        VALUES(:bonid, :wijnid, :aantal, :prijs)";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(":bonid", $highest->id);
                $stmt->bindParam(":wijnid", $wijn->id);
                $stmt->bindParam(":aantal", $wijn->aantal);
                $stmt->bindParam(":prijs", $wijn->prijs);
                $stmt->execute();
            }

            return $highest->id;
        }

        protected function findHighestId() {
            $sql = "SELECT max(id) as 'id' FROM bestelbonnen";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            return $stmt->fetch();
        }
    }

?>
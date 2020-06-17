<?php

    class GebruikerView extends GebruikerRepository {
        public function getGebruikerByGebruikersnaam($gebruikersnaam) {
            return $this->findByGebruikersnaam($gebruikersnaam);
        }

        public function voegToe($familienaam, $voornaam, $straatnaam, $huisnummer, $gemeente, 
                            $postcode, $gebruikersnaam, $paswoord) {
            return $this->add($familienaam, $voornaam, $straatnaam, $huisnummer, $gemeente,
                            $postcode, $gebruikersnaam, $paswoord);
        }
    }

?>
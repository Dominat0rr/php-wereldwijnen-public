<?php

    class BestelbonView extends BestelbonRepository {
        public function add($current_date, $voornaam, $familienaam, $straat, $huisnr, $gemeente, $postcode, $wijnen) {
            return $this->create($current_date, $voornaam, $familienaam, $straat, $huisnr, $gemeente, $postcode, $wijnen);
        }
    }

?>
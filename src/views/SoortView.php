<?php

    class SoortView extends SoortRepository {
        public function getSoortById($id) {
            return $this->findById($id);
        }

        public function getSoortenByLandId($id) {
            return $this->findByLandId($id);
        }

        public function getAantalSoortenByLandId($id) {
            return $this->countAantalSoortenByLandId($id);
        }

        public function getSoorten() {
            return $this->findAll();
        }

        public function getSoortenWithPagination($startAt, $perPage) {
            return $this->findAllWithPagination($startAt, $perPage);
        }

        public function getAantalSoorten() {
            return $this->countAantalSoorten();
        }
    }

?>
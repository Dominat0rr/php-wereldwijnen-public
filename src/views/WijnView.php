<?php

    class WijnView extends WijnRepository {
        public function getWijnById($id) {
            return $this->findById($id);
        }

        public function getWijnBySoortId($id) {
            return $this->findBySoortId($id);
        }

        public function getWijnen() {
            return $this->findAll();
        }

        public function getWijnenWithPagination($startAt, $perPage) {
            return $this->findAllWithPagination($startAt, $perPage);
        }

        public function getAantalWijnen() {
            return $this->countAantalWijnen();
        }

        /* BySoortId */
        public function getWijnenBySoortId($id) {
            return $this->findAllWijnenBySoortId($id);
        }

        public function getWijnenWithPaginationBySoortId($id, $startAt, $perPage) {
            return $this->findAllWijnenWithPaginationBySoortId($id, $startAt, $perPage);
        }

        public function getAantalWijnenBySoortId($id) {
            return $this->countAantalWijnenBySoortId($id);
        }
    }

?>
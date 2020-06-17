<?php

    class LandView extends LandRepository {
        public function getLandById($id) {
            return $this->findById($id);
        }

        public function getLanden() {
            return $this->findAll();
        }

        public function getLandenWithPagination($startAt, $perPage) {
            return $this->findAllWithPagination($startAt, $perPage);
        }

        public function getAantalLanden() {
            return $this->countAantalLanden();
        }
    }

?>
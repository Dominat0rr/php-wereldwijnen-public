<?php

    class SoortRepository extends Database {
        protected function findById($id) {
            $sql = "SELECT * FROM soorten WHERE id = :id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            return $stmt->fetch();
        }

        protected function findByLandId($id) {
            $sql = "SELECT * FROM soorten WHERE landid = :landid";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":landid", $id);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        protected function countAantalSoortenByLandId($id) {
            $sql = "SELECT COUNT(*) FROM soorten WHERE landid = :landid";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":landid", $id);
            $stmt->execute();

            return $stmt->fetchColumn();
        }

        protected function findAll() {
            $sql = "SELECT * FROM soorten";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        protected function findAllWithPagination($startAt, $perPage) {
            $sql = "SELECT * FROM soorten ORDER BY naam ASC LIMIT :startAt, :perPage";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":startAt", $startAt);
            $stmt->bindParam(":perPage", $perPage);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        protected function countAantalSoorten() {
            $sql = "SELECT COUNT(*) FROM soorten";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchColumn();
        }
    }

?>
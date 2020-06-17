<?php

    class WijnRepository extends Database {
        protected function findById($id) {
            $sql = "SELECT * FROM wijnen WHERE id = :id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            return $stmt->fetch();
        }

        protected function findBySoortId($id) {
            $sql = "SELECT * FROM wijnen where soortid = :soortid";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":soortid", $id);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        protected function findAll() {
            $sql = "SELECT * FROM wijnen";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        protected function findAllWithPagination($startAt, $perPage) {
            $sql = "SELECT * FROM wijnen ORDER BY id ASC LIMIT :startAt, :perPage";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":startAt", $startAt);
            $stmt->bindParam(":perPage", $perPage);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        protected function countAantalWijnen() {
            $sql = "SELECT COUNT(*) FROM wijnen";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchColumn();
        }

        /* BySoortId */
        protected function findAllWijnenBySoortId($id) {
            $sql = "SELECT * FROM wijnen WHERE soortid = :soortid";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam("soortid", $id);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        protected function findAllWijnenWithPaginationBySoortId($id, $startAt, $perPage) {
            $sql = "SELECT * FROM wijnen WHERE soortid = :soortid ORDER BY id ASC LIMIT :startAt, :perPage";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam("soortid", $id);
            $stmt->bindParam(":startAt", $startAt);
            $stmt->bindParam(":perPage", $perPage);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        protected function countAantalWijnenBySoortId($id) {
            $sql = "SELECT COUNT(*) FROM wijnen WHERE soortid = :soortid";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":soortid", $id);
            $stmt->execute();

            return $stmt->fetchColumn();
        }
    }

?>
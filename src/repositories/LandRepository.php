<?php

    class LandRepository extends Database {
        protected function findById($id) {
            $sql = "SELECT * FROM landen WHERE id = :id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            return $stmt->fetch();
        }

        protected function findAll() {
            $sql = "SELECT * FROM landen";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        protected function findAllWithPagination($startAt, $perPage) {
            $sql = "SELECT * FROM landen ORDER BY naam ASC LIMIT :startAt, :perPage";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":startAt", $startAt);
            $stmt->bindParam(":perPage", $perPage);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        protected function countAantalLanden() {
            $sql = "SELECT COUNT(*) FROM landen";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchColumn();
        }
    }

?>
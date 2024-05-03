<?php

class Contact extends Database {
    public function create_contact($meno, $email, $poznamka) {
        $sql = "INSERT INTO contact (meno, email, poznamka) VALUES (:meno, :email, :poznamka);";
        $stmt = $this->connection->prepare($sql);

        return $stmt->execute(array($meno, $email, $poznamka));
    }

    public function read_contact($id) {
        $sql = "SELECT * FROM contact WHERE contact_id = :id;";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(array($id));

        return $stmt->fetch();
    }
}

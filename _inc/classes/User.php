<?php

class User extends Database
{
    public function login($username, $password) {
        $user = $this->get_user($username);

        if ($user && password_verify($password, $user["password"])) {
            return $user;
        } else {
            return false;
        }
    }

    public function get_user($username) {
        $sql = "SELECT * FROM user WHERE username = :username;";
        $stmt = $this->connection->prepare($sql);

        $stmt->execute(
            array(
                "username" => $username,
            )
        );

        $result = $stmt->fetch();
        return $result;
    }

    public function get_users() {
        $sql = "SELECT * FROM user;";
        $stmt = $this->connection->prepare($sql);

        $stmt->execute();

        $result = $stmt->fetchAll();
        return $result;
    }

    public function create_user($username, $email, $password)
    {
        $sql = "INSERT INTO user (username, email, password) VALUES (:username, :email, :password);";
        $stmt = $this->connection->prepare($sql);

        return $stmt->execute(
            array(
                "username" => $username,
                "email" => $email,
                "password" => $password
            )
        );
    }

    public function update_user($id, $username, $email, $role)
    {
        $sql = "UPDATE user SET username = :username, email = :email, role = :role WHERE id = :id;";
        $stmt = $this->connection->prepare($sql);

        $stmt->execute(
            array(
                "id" => $id,
                "username" => $username,
                "email" => $email,
                "role" => $role
            )
        );
    }

    public function delete_user($id)
    {
        $sql = "DELETE FROM user WHERE id = :id;";
        $stmt = $this->connection->prepare($sql);

        return $stmt->execute(
            array(
                "id" => $id
            )
        );
    }
}

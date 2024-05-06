<?php

class Article extends Database
{
    public function get_article($id)
    {
        $sql = "SELECT * FROM article WHERE id = :id;";
        $stmt = $this->connection->prepare($sql);

        $stmt->execute(
            array(
                "id" => $id,
            )
        );

        $result = $stmt->fetch();
        return $result;
    }

    public function get_articles()
    {
        $sql = "SELECT * FROM article ORDER BY posted DESC;";
        $stmt = $this->connection->prepare($sql);

        $stmt->execute();

        $result = $stmt->fetchAll();
        return $result;
    }

    public function create_article($title, $body, $author_id)
    {
        $sql = "INSERT INTO article (title, body, author_id) VALUES (:title, :body, :author_id);";
        $stmt = $this->connection->prepare($sql);

        return $stmt->execute(
            array(
                "title" => $title,
                "body" => htmlspecialchars(trim($body)),
                "author_id" => $author_id,
            )
        );
    }

    public function update_article($id, $title, $body)
    {
        $sql = "UPDATE article SET title = :title, body = :body WHERE id = :id;";
        $stmt = $this->connection->prepare($sql);

        $stmt->execute(
            array(
                "id" => $id,
                "title" => $title,
                "body" => htmlspecialchars(trim($body)),
            )
        );
    }

    public function delete_article($id)
    {
        $sql = "DELETE FROM article WHERE id = :id;";
        $stmt = $this->connection->prepare($sql);

        return $stmt->execute(
            array(
                "id" => $id
            )
        );
    }
}

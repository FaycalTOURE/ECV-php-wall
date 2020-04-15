<?php


class PostsManager
{
    private $db;
    private $current_table_name = 'posts';

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addPost(PostsClass $post)
    {
        $q = $this->db->prepare('INSERT INTO ' . $this->current_table_name . '(id, text, date, password ) VALUES(:id, :text, :date, :password)');

        $q->bindValue(':id', $post->getID());
        $q->bindValue(':text', $post->getText());
        $q->bindValue(':date', $post->getDate());
        $q->bindValue(':user_id', $post->getUserId());

        $post->hydrate([
            'id' => $this->db->lastInsertId()
        ]);

        $q->execute();
    }

    public function countPosts()
    {
        return $this->db->query('SELECT COUNT(*) FROM ' .$this->current_table_name)->fetchColumn();
    }

    public function updatePost(PostsClass $post)
    {
        $q = $this->db->prepare('UPDATE '.$this->current_table_name.' SET id = :id, text = :text, date = :date, user_id = :user_id WHERE id = :id');

        $q->bindValue(':id', $post->getID());
        $q->bindValue(':text', $post->getText());
        $q->bindValue(':date', $post->getDate());
        $q->bindValue(':user_id', $post->getUserId());

        $q->execute();
    }

    public function deletePost(PostsClass $post)
    {
        $this->db->exec('DELETE FROM ' .$this->current_table_name. ' WHERE id = '.$post->getID());
    }

    public function getPosts(UserClass $user)
    {
        $result = $this->db->query('SELECT *  FROM '. $this->current_table_name);

        $posts = [];

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = $row;
        }
        return $posts;
    }

    public function getPostById(PostsClass $post)
    {
        $q = $this->db->prepare('SELECT * FROM ' .$this->current_table_name. ' WHERE id = :id');
        $q->bindValue(':id', $post->getId(), PDO::PARAM_INT);
        $q->execute();

        $row = $q->fetch(PDO::FETCH_ASSOC);

        return $row;
    }
}
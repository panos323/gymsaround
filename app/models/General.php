<?php

class General
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * @param string $articleId
     * @return bool
     */
    public function getArticleById(string $articleId){
        $this->db->query('SELECT u.user_first_name, u.user_image , posts.*
                              FROM posts 
                              JOIN users u 
                              on posts.user_id = u.user_id
                              WHERE post_id = :id');
        $this->db->bind(':id', $articleId);
        $row = $this->db->single();
        if($this->db->rowCount() > 0) {
            return $row;
        }
        return false;
    }

    /**
     *
     */
    public function getAllArticles() {
        $this->db->query('SELECT * FROM posts');
        $rows = $this->db->resultSet();
        if($this->db->rowCount() > 0) {
            return $rows;
        }
        return false;
    }

}
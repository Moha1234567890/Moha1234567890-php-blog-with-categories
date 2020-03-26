<?php
  class Post {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getPosts(){
      $this->db->query('SELECT *,
                        posts.id as postId,
                        users.id as userId
                        
                        FROM posts
                        INNER JOIN users
                        ON posts.user_id = users.id
                        ORDER BY posts.id DESC LIMIT 6
                        ');

                       

      $results = $this->db->resultSet();

      return $results;
    }
     /**SELECT * FROM posts ORDER BY date DESC LIMIT 6 
 */
    public function addPost($data){
      $this->db->query('INSERT INTO posts (title, thumb, user_id, body, cate_name) VALUES(:title, :thumb, :user_id, :body, :cate_name)');
      // Bind values
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':thumb', $data['thumb']);
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':body', $data['body']);
      $this->db->bind(':cate_name', $data['cate_name']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

     public function updatePost($data){
      $this->db->query('UPDATE  posts SET title = :title, body = :body, cate_name = :cate_name WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':title', $data['title']);
  
      $this->db->bind(':cate_name', $data['cate_name']);
      
      $this->db->bind(':body', $data['body']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }


    public function deletePost($id){

      $this->db->query('DELETE FROM posts WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $id);
      
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }



    public function getPostById($id){
      $this->db->query('SELECT * FROM posts WHERE id = :id');
      $this->db->bind(':id', $id);
     

      $row = $this->db->single();

      return $row;
    }


      public function getCates(){
      $this->db->query('SELECT cates.id, cates.name, posts.cate_name, count(*) AS t FROM cates left JOIN posts ON cates.name = posts.cate_name  GROUP BY cates.id');

                       

      $results = $this->db->resultSet();

      return $results;
    }

    public function getOneCate($name) {
      $this->db->query("SELECT *,
        posts.id as postId,
        cates.id as catesId

       FROM posts INNER JOIN cates ON posts.cate_name = cates.name WHERE cates.name = :name");

      $this->db->bind(":name", $name);

      $row = $this->db->resultSet();

      return $row;
    }

    public function getMore() {
      $this->db->query('SELECT *,
                        posts.id as postId,
                        users.id as userId
                        
                        FROM posts
                        INNER JOIN users
                        ON posts.user_id = users.id
                        ORDER BY posts.title DESC LIMIT 9
                        ');

                       

      $results = $this->db->resultSet();

      return $results;
    }

    public function cates() {
    $this->db->query("SELECT * FROM cates");

    

    $row = $this->db->resultSet();

    return $row;


   }


   public function search($key) {
    $this->db->query("SELECT * FROM posts LIKE :key ");

    $this->db->bind(":key" , $key);

    $row = $this->db->resultSet();

    return $row;


   }

   public function getThree($id, $cate_name) {
    $this->db->query("SELECT posts.title as title, posts.thumb as thumb, posts.cate_name as cate_name, posts.id as postId, posts.body as body FROM posts INNER JOIN cates ON posts.cate_name = cates.name AND cates.name = :cate_name WHERE posts.id != :id ORDER BY postId DESC LIMIT 3 ");

    $this->db->bind(":cate_name", $cate_name);
    $this->db->bind(":id", $id);

    $row = $this->db->resultSet();

    return $row;

   }

   public function process($id) {
    $this->db->query("UPDATE  users SET pre = :pre WHERE id = :id");
    $this->db->bind(":id", $id);

    $this->db->bind(":pre", 1);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
   }


  
 
  
    

  }
<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Regsiter user
    public function register($data){
      $this->db->query('INSERT INTO users (name, email, password, status, user_pic, pre) VALUES(:name, :email, :password, :status, :user_pic, :pre)');
      // Bind values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', $data['password']);
      $this->db->bind(':status', $data['status']);
      $this->db->bind(':user_pic', $data['user_pic']);
      $this->db->bind(':pre', $data['pre']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Login User
    public function login($email, $password){
      $this->db->query('SELECT * FROM users WHERE email = :email AND password = :password');
      $this->db->bind(':email', $email);
      $this->db->bind(':password', $password);

      $row = $this->db->single();

      return $row;

    }

    // Find user by email
    public function findUserByEmail($email){
      $this->db->query('SELECT * FROM users WHERE email = :email');
      // Bind value
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    // Get User by ID
    public function getUserById($id){
      $this->db->query('SELECT * FROM users WHERE id = :id');
      // Bind value
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }


    public function getDetails($id) {
      $this->db->query("SELECT  users.user_pic as pic, users.name as name, users.status as status, posts.id as Id, posts.thumb as Thumb, posts.title as Title, posts.cate_name as Cate_name, posts.body as Body,  COUNT(posts.user_id) as n FROM users INNER JOIN posts ON posts.user_id = users.id and users.id = :id");

      $this->db->bind(':id', $id);

      $row = $this->db->resultSet();

      return $row;
    }
    public function userPosts($id) {
      $this->db->query("SELECT posts.title as ti, posts.thumb as th, posts.cate_name as ca, posts.body as bo, posts.id as i FROM Users INNER JOIN posts ON posts.user_id = users.id and users.id AND users.id = :id");

         $this->db->bind(':id', $id);

      $row = $this->db->resultSet();

      return $row;
      
    }


    public function getPre($uid) {

      $this->db->query("SELECT * FROM users WHERE id = :id");

      $this->db->bind(":id", $uid);

      $row = $this->db->single();

      return $row;

    }






  }
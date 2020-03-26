<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){

      if(isLoggedIn()) {
        redirect('posts');
      }
      $data = [
        'title' => 'blogia',
        'description' => 'Blog built on the TraversyMVC PHP micro framework'
        
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){  
      $data = [
        'title' => 'About Us',
        'description' => 'Full Featured Blog with Categories ',
        'microframework' => "Brad Traversy",
        'app created by' => 'Mohamed Hassan'
      ];

      $this->view('pages/about', $data);
    }
  }
<?php
  class Posts extends Controller {
    public function __construct(){

     
      if(!isLoggedIn()){
        redirect('users/login');
      } 

       

      $this->postModel = $this->model('Post');
      $this->userModel = $this->model('User');
    }

    public function index(){
 

      // Get posts
      $posts = $this->postModel->getPosts();
      $more = $this->postModel->getMore();


       $cate = $this->postModel->getCates();

      $data = [
        'posts' => $posts,
        'cate' => $cate,
        'more' => $more
      ];

      $this->view('posts/index', $data);
    }

    

    public function add(){

      

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $thumbnail = $_FILES["thumb"]["name"];

        $dir_thumb = "../public/images/" . basename($thumbnail);
       



         if(move_uploaded_file($_FILES["thumb"]["tmp_name"], $dir_thumb))
        { }

        $data = [

          

          'title' => trim($_POST['title']),
          'body' => trim($_POST['body']),
          'user_id' => $_SESSION['user_id'],
          'cate_name' => $_POST['cate_name'], 
          'thumb' => $_FILES["thumb"]["name"],

          'title_err' => '',
          'body_err' => '',
          'cate_name_err' => '',
          'thumb_err' => ''

         
        ];


        if(empty($data["cate_name"])) {

          $data['cate_name_err'] = "Please enter category";

        } 


         //Validate data
        if(empty($data['title'])){
          $data['title_err'] = 'Please enter title';
        }
        if(empty($data['body'])){
          $data['body_err'] = 'Please enter body text';
        }
         if(empty($data['thumb'])){
          $data['thumb_err'] = 'Please upload thumbnail';
        }


        // Make sure no errors
        if(empty($data['title_err']) && empty($data['body_err']) && empty($data['thumb_err']) && empty($data['cate_name_err'])){


        if($this->postModel->addPost($data)){
            flash('post_message', 'Post Added');
            redirect('posts');
          } else {
            
          }
          // Validated
          
        } else {
          // Load view with errors
          $this->view('posts/add', $data);
        }



      } else {

     
        $data = [
          'title' => '',
          'body' => '',
          'cate_name' => '',
          'thumb' => ''
        ];


  
        $this->view('posts/add', $data);
      }

    

    
    }

    public function edit($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
       
        $data = [
          'id' => $id,
          'title' => trim($_POST['title']),
          'body' => trim($_POST['body']),
          'user_id' => $_SESSION['user_id'],
     
          'cate_name' => trim($_POST['cate_name']),
          'title_err' => '',
         
          'cate_name_err' => '',
          'body_err' => ''
        ];

        // Validate data
        if(empty($data['title'])){
          $data['title_err'] = 'Please enter title';
        }
        if(empty($data['body'])){
          $data['body_err'] = 'Please enter body text';
        }

       

        if(empty($data['cate_name'])){
          $data['cate_name_err'] = 'Please enter cate_name text';
        }

        // Make sure no errors
        if(empty($data['title_err']) && empty($data['body_err']) && empty($data['cate_name_err'])){
          // Validated
          if($this->postModel->updatePost($data)){
            flash('post_message', 'Post edited');
            redirect('posts');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('posts/edit', $data);
        }

      } else {

      	//get the row to check for the session

      	$post = $this->postModel->getPostById($id);

      	if($post->user_id != $_SESSION['user_id']) {

      		redirect("posts/index");
      	}


        $data = [
          'id'	=> $id,
          'title' => $post->title,
          'body' => $post->body,
         
          'cate_name' => $post->cate_name
        ];
  
        $this->view('posts/edit', $data);
      }
    }

    public function show($id, $cate_name, $uid){

    
      $post = $this->postModel->getPostById($id);
      
      $user = $this->userModel->getUserById($post->user_id);
      
      $pre = $this->userModel->getPre($uid);

      $getThree = $this->postModel->getThree($id, $cate_name);

      $data = [
        'post' => $post,
        'user' => $user,
        'pre' =>$pre,
        
        'getThree' => $getThree
       
      ];
      if(isset($id) OR isset($cate_name) OR isset($uid)  ) {
         $this->view('posts/show', $data);
       } else {
        redirect("posts/notfound");
       }

     
    }



    //delete the post 

    public function delete($id) {

    	if($_SERVER['REQUEST_METHOD']  == "POST" ) {

    		if($this->postModel->deletePost($id)  ) {

        redirect("posts");
    		flash("post_message","post deleted");
    	

	    	} else {
	    		die("smth is wrong ");
	    	}
    	} else {
    		redirect("posts");
    	}

    	
    }

    public function oneCate($name) {

      $onecate = $this->postModel->getOneCate($name);

      $data = [
        "onecate" => $onecate
      ];

      $this->view("posts/onecate", $data);
    }

    public function process($id) {


        if($_SERVER["REQUEST_METHOD"] == "POST") {


      
           
         \Stripe\Stripe::setVerifySslCerts(false);

     

        $stripe = [
        "secret_key"      => "YOUR SECERT KEY HERE",
        "publishable_key" => "YOUR PUBLIC KEY HERE",
       ];

        \Stripe\Stripe::setApiKey($stripe['secret_key']);

        //$pid = $_GET['pid'];
        $token  = $_POST['stripeToken'];
        $email  = $_POST['stripeEmail'];

        $customer = \Stripe\Customer::create([
            'email' => $email,
            'source'  => $token,
            'description' => "subbed"
        ]);

        \Stripe\Subscription::create([
            "customer" => $customer->id,
            "items" => [
                [
                    "plan" =>"YOUR PLAN",
                ],
            ]
        ]);

        $data = [
      
      "id" => $_SESSION['user_id'],
     
    ];





     if(isset($data)) {
       if ($this->postModel->process($id)) {
       redirect('posts/success');

      } else {
        echo "not found";
      }
    } else {
      header('Location: '.$_SERVER['PHP_SELF']);
    }
    

    
   

   } else {
    redirect("posts/notfound");
   }

  }


  public function success() {
   
   if(isset($_GET['success'])) {
    redirect("posts");
   }

    $data = [
      "succ" => "thanks for your subscription"
    ];

    $this->view("posts/success", $data);

  }

 


}
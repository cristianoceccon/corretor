<?php
class pagesController extends Controller {
    private $user;
    private $p;
    private $arrayInfo;
    public function __construct(){
    	$this->user = new User();
        $this->p = new Pages();

    	if(!$this->user->isLogged()){
    		header("Location:".BASE_URL."login");
    		exit;
    	}

        if(!$this->user->hasPermission('ver_paginas')){
          header("Location:".BASE_URL);
          exit;
        }

        $this->arrayInfo = array(
          'user' => $this->user,
          'menuActive' => 'pages',
          'errorItems' => array()
        );

    }

	public function index() {
        $this->arrayInfo['list'] = $this->p->getAll();

		$this->loadTemplate('pages', $this->arrayInfo);
	}

    public function add(){
        if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $this->arrayInfo['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }

        $this->loadTemplate('pages_add', $this->arrayInfo);
    }

    public function add_action(){
        if(!empty($_POST['title'])){
           $title = ucfirst($_POST['title']);
           $body = $_POST['body'];
           if($this->p->verifyTitle($title) == false){
              $this->p->add($title, $body);
           }
           header("Location:".BASE_URL."pages");
           exit;
        } else {
            $_SESSION['formError'] = array('title');
            header("Location:".BASE_URL."pages/add");
            exit;
        }
    }

    public function del($id){

        if(!empty($id)){
          $this->p->del($id);
        }

        header("Location:".BASE_URL."pages");
        exit;
    }

    public function edit($id){
        if(!empty($id)){
            if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
                $this->arrayInfo['errorItems'] = $_SESSION['formError'];
                unset($_SESSION['formError']);
            }
            
            $this->arrayInfo['list_page'] = $this->p->get($id);
            $this->loadTemplate('pages_edit', $this->arrayInfo);

        } else {
          header("Location:".BASE_URL."pages");
          exit; 
        }
    }

    public function edit_action($id){
        if(!empty($id)){

            if(!empty($_POST['title'])){
                $title = ucfirst($_POST['title']);
                $body = $_POST['body'];
                $this->p->edit($title, $body, $id);
                header("Location:".BASE_URL."pages");
                exit;
            } else {
              $_SESSION['formError'] = array('title');
               header("Location:".BASE_URL."pages/edit/".$id);
               exit;
            }
            
            

        } else {
          header("Location:".BASE_URL."pages");
          exit; 
        }
    }

    public function upload(){
        if(!empty($_FILES['file']['tmp_name'])){

            $types_allowed = array('image/jpeg', 'image/png');

            if(in_array($_FILES['file']['type'], $types_allowed)){
                $newname = md5(time().rand(0,999).rand(0,999)).'.jpg';
                move_uploaded_file($_FILES['file']['tmp_name'],  BASE_DIRECTORY.'media/pages/'.$newname);
                $array = array(
                  'location' => BASE_URL_SITE.'media/pages/'.$newname
                );

                echo json_encode($array);
                exit;
            }

        }
    }

}
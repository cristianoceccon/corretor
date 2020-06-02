<?php 
class optionsController extends Controller {
    
    private $user;
    private $arrayInfo;
    private $o;

	public function __construct(){
       $this->user = new User();
       $this->o = new Options();
       

       if(!$this->user->isLogged()){
       	  header("Location:".BASE_URL."login");
       	  exit;
       } 

       if(!$this->user->hasPermission('ver_produtos')){
          header("Location:".BASE_URL);
       	  exit;
       }

       $this->arrayInfo = array(
          'user' => $this->user,
          'menuActive' => 'products',
          'errorItems' => array(),
          'info' => array()
        );
       
	}

	public function index(){

		$this->arrayInfo['list'] = $this->o->getAll();
		$this->loadTemplate('options', $this->arrayInfo);
	}

	public function add(){
		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $this->arrayInfo['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }
		$this->loadTemplate('options_add', $this->arrayInfo);
	}

	public function add_action(){
		if(!empty($_POST['name'])){
           $brand = ucfirst($_POST['name']);
           $this->o->add($brand);
           header("Location:".BASE_URL."options");
		   exit;
		} else {
			$_SESSION['formError'] = array('brand');
			header("Location:".BASE_URL."options/add");
			exit;
		}
	}

	public function edit($id){
		if(!empty($id)){
		    if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
                $this->arrayInfo['errorItems'] = $_SESSION['formError'];
                unset($_SESSION['formError']);
            }
            $this->arrayInfo['info'] = $this->o->get($id);
            $this->loadTemplate('options_edit', $this->arrayInfo);
		} else {
		    header("Location:".BASE_URL."options");
		    exit;
		}
	}

	public function edit_action($id){
		if(!empty($id)){
		    if(!empty($_POST['name'])){
		    $brand = ucfirst($_POST['name']);
            $this->o->update($brand, $id);
            header("Location:".BASE_URL."options");
		    exit;
		   } else {
		   	  $_SESSION['formError'] = array('brand');
		   	  header("Location:".BASE_URL."options/edit/".$id);
		  exit;
		   }
		} else {
		  header("Location:".BASE_URL."options");
		  exit;
		}
	}

	public function del($id){
		if(!empty($id)){
          
            $this->o->del($id);
    
		} 

		header("Location:".BASE_URL."options");
		exit;
	}

}
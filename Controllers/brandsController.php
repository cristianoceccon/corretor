<?php 
class brandsController extends Controller {
    
    private $user;
    private $arrayInfo;
    private $m;

	public function __construct(){
       $this->user = new User();
       $this->m = new Brands();
       

       if(!$this->user->isLogged()){
       	  header("Location:".BASE_URL."login");
       	  exit;
       } 

       if(!$this->user->hasPermission('ver_marcas')){
          header("Location:".BASE_URL);
       	  exit;
       }

       $this->arrayInfo = array(
          'user' => $this->user,
          'menuActive' => 'marcas',
          'errorItems' => array(),
          'info' => array()
        );
       
	}

	public function index(){

		$this->arrayInfo['list'] = $this->m->getAllMarcas();
		$this->loadTemplate('brands', $this->arrayInfo);
	}

	public function add(){
		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $this->arrayInfo['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }
		$this->loadTemplate('brands_add', $this->arrayInfo);
	}

	public function add_action(){
		if(!empty($_POST['brand'])){
           $brand = ucfirst($_POST['brand']);
           $this->m->add($brand);
           header("Location:".BASE_URL."brands");
		   exit;
		} else {
			$_SESSION['formError'] = array('brand');
			header("Location:".BASE_URL."brands/add");
			exit;
		}
	}

	public function edit($id){
		if(!empty($id)){
		    if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
                $this->arrayInfo['errorItems'] = $_SESSION['formError'];
                unset($_SESSION['formError']);
            }
            $this->arrayInfo['info'] = $this->m->get($id);
            $this->loadTemplate('brands_edit', $this->arrayInfo);
		} else {
		    header("Location:".BASE_URL."brands");
		    exit;
		}
	}

	public function edit_action($id){
		if(!empty($id)){
		    if(!empty($_POST['brand'])){
		    $brand = ucfirst($_POST['brand']);
            $this->m->update($brand, $id);
            header("Location:".BASE_URL."brands");
		    exit;
		   } else {
		   	  $_SESSION['formError'] = array('brand');
		   	  header("Location:".BASE_URL."brands/edit/".$id);
		  exit;
		   }
		} else {
		  header("Location:".BASE_URL."brands");
		  exit;
		}
	}

	public function del($id){
		if(!empty($id)){
          if($this->m->getAllMarcas($id) == false){
             $this->m->del($id);
          } 
		} 

		header("Location:".BASE_URL."brands");
		exit;
	}

}
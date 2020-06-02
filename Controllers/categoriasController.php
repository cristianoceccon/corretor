<?php 
class CategoriasController extends Controller {
    
    private $user;
    private $arrayInfo;
    private $m;

	public function __construct(){
       $this->user = new User();
       $this->m = new Categorias();
       

       if(!$this->user->isLogged()){
       	  header("Location:".BASE_URL."login");
       	  exit;
       } 

       if(!$this->user->hasPermission('ver_categorias')){
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

		$this->arrayInfo['list'] = $this->m->getAllCategorias();
		$this->loadTemplate('categorias', $this->arrayInfo);
	}

	public function add(){
		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $this->arrayInfo['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }
		$this->loadTemplate('categorias_add', $this->arrayInfo);
	}

	public function add_action(){
		if(!empty($_POST['categoria'])){
           $categoria = ucfirst($_POST['categoria']);
           $this->m->add($categoria);
           header("Location:".BASE_URL."categorias");
		   exit;
		} else {
			$_SESSION['formError'] = array('categoria');
			header("Location:".BASE_URL."categorias/add");
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
            $this->loadTemplate('categorias_edit', $this->arrayInfo);
		} else {
		    header("Location:".BASE_URL."categorias");
		    exit;
		}
	}

	public function edit_action($id){
		if(!empty($id)){
		    if(!empty($_POST['nome'])){
		    $nome = ucfirst($_POST['nome']);
            $this->m->update($nome, $id);
            header("Location:".BASE_URL."categorias");
		    exit;
		   } else {
		   	  $_SESSION['formError'] = array('categoria');
		   	  header("Location:".BASE_URL."categorias/edit/".$id);
		  exit;
		   }
		} else {
		  header("Location:".BASE_URL."categorias");
		  exit;
		}
	}

	public function del($id){
		if(!empty($id)){
          if($this->m->hasProducts($id) == false){
             $this->m->del($id);
          } 
		} 

		header("Location:".BASE_URL."categorias");
		exit;
	}

}
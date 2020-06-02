<?php 
class RelatoriosController extends Controller {
    
    private $user;
    private $arrayInfo;
    private $m;

	public function __construct(){
       $this->user = new User();
    
       

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
          'menuActive' => 'relatorios',
          'errorItems' => array(),
          'info' => array()
        );
       
	}

	public function index(){
		$produtos = new Produtos();

        $this->arrayInfo['list'] = $produtos->getAllProdutos();

		$this->loadTemplate('relatorios', $this->arrayInfo);
	}


}
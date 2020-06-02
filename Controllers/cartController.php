<?php
class CartController extends Controller {
    private $user;
    private $arrayInfo;
    private $m;

    public function __construct(){
        $this->user = new User();
        $this->m = new Pedidos();
        

    	if(!$this->user->isLogged()){
    		header("Location: ".BASE_URL."login");
    		exit;
        }
        
        if(!$this->user->hasPermission('ver_pedidos')){
            header("Location: ".BASE_URL);
            exit;
        }

        $this->arrayInfo = array(
            'user' => $this->user,
            'menuActive' => 'pedidos',
            'errorItems' => array(),
            'info' => array()
          );

    }

	public function index() {
        $produtos = new Produtos();
        $pedidos = new Pedidos();

        $this->arrayInfo['list'] = $pedidos->getAllPedidos();

		$this->loadTemplate('cart', $this->arrayInfo);
    }
    
}
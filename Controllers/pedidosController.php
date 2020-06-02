<?php
class PedidosController extends Controller {
    private $user;
    private $arrayInfo;
    private $m;

    public function __construct(){
        $this->user = new User();
        $this->m = new Pedidos();
        

    	if(!$this->user->isLogged()){
    		header("Location:".BASE_URL."login");
    		exit;
        }
        
        if(!$this->user->hasPermission('ver_pedidos')){
            header("Location:".BASE_URL);
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
        $pedidos = new Pedidos();

        $this->arrayInfo['list'] = $pedidos->list();
		$this->loadTemplate('pedidos', $this->arrayInfo);
    }
    

    public function add(){

        $clientes = new Clientes();
        $produtos = new Produtos();
        $pedidos = new Pedidos();
        $meiosPagamentos = new MeiosPagamentos();
        $planos = new Planos();

        $this->arrayInfo['cliente_list'] = $clientes->getAllClientes();
        $this->arrayInfo['produto_list'] = $produtos->getAllProdutos();
        $this->arrayInfo['formas_pagamentos'] = $meiosPagamentos->getList();
        $this->arrayInfo['plano_list'] = $planos->getAllPlanos();
        $this->arrayInfo['lastId'] = $pedidos->lastId();
        
		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $this->arrayInfo['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }
		$this->loadTemplate('pedidos_add', $this->arrayInfo);
    }
    
    public function getTotalpedido() {
        $clientes = new Clientes();
        $produtos = new Produtos();
        $pedidos = new Pedidos();

        
        $this->arrayInfo['cliente_list'] = $clientes->getAllClientes();
        $this->arrayInfo['produto_list'] = $produtos->getAllProdutos();

        $array = array();
    
        $sql = "SELECT subtotal FROM pedidos";
        $sql = $this->db->query($sql);
    
        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
            
    }
        return $array;
    }
    
    public function getAllPedidos() {
    $array = array();

    $sql = "SELECT * FROM pedidos";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
        $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        
}
    return $array;
}


    public function edit($id) {
        if(!empty($id)) {
            
            $m = new Pedidos();
            $this->arrayInfo['info'] = $m->get($id);

            if(count($this->arrayInfo['info']) > 0 ){
                $this->loadTemplate('pedidos_edit', $this->arrayInfo);
               } else {
                header("Location:".BASE_URL."pedidos");
                exit;
               }            
            
        } else {
            header("Location:".BASE_URL."pedidos");
            exit;
        }
    }

    public function edit_action($id){
        if(!empty($id)) {

            if(!empty($_POST['id_status_pedido'])) {
                $m = new Pedidos();

                $id_status_pedido = ($_POST['id_status_pedido']);

                $m->editstatuspedido($id_status_pedido, $id);
                header("Location:".BASE_URL."pedidos");
                exit;


            } else {
                $_SESSION['formError'] = array('pedido');
                header("Location:".BASE_URL."pedidos/edit/".$id);
                exit;
            }
        } else {
            header("Location:".BASE_URL."pedidos");
            exit;
    }
}

public function del($id){
    if(!empty($id)){
      
         $this->m->del($id);
      } 
 

    header("Location:".BASE_URL."pedidos");
    exit;
}

public function finalizar($id){
    if(!empty($id)){
      
         $this->m->finalizar($id);
      } 
 

    header("Location:".BASE_URL."pedidos");
    exit;
}

public function cancelar($id){
    if(!empty($id)){
      
         $this->m->cancelar($id);
      } 
 

    header("Location:".BASE_URL."pedidos");
    exit;
}

public function abrir($id) {

    $pedidos = new Pedidos();

    $this->arrayInfo['list'] = $pedidos->list();
    if(!empty($id)) {
        
        $m = new Pedidos();
        $this->arrayInfo['info'] = $m->get($id);

        if(count($this->arrayInfo['info']) > 0 ){
            $this->loadTemplate('pedidos_abrir', $this->arrayInfo);
           } else {
            header("Location:".BASE_URL."pedidos");
            exit;
           }            
        
    } else {
        header("Location:".BASE_URL."pedidos");
        exit;
    }
}

}
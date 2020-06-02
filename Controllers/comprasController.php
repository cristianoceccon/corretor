<?php
class ComprasController extends Controller {
    private $user;
    private $arrayInfo;
    private $m;

    public function __construct(){
        $this->user = new User();
        $this->m = new Compras();
        

    	if(!$this->user->isLogged()){
    		header("Location:".BASE_URL."login");
    		exit;
        }
        
        if(!$this->user->hasPermission('ver_compras')){
            header("Location:".BASE_URL);
            exit;
        }

        $this->arrayInfo = array(
            'user' => $this->user,
            'menuActive' => 'compras',
            'errorItems' => array(),
            'info' => array()
          );

    }

	public function index() {
        $compras = new Compras();

        $this->arrayInfo['list'] = $compras->getAllCompras();

		$this->loadTemplate('compras', $this->arrayInfo);
    }
    

    public function add(){

        $clientes = new Clientes();
        $produtos = new Produtos();
        $compras = new Compras();
        $meiosPagamentos = new MeiosPagamentos();

        $this->arrayInfo['list'] = $compras->getAllCompras();

        $this->arrayInfo['cliente_list'] = $clientes->getAllClientes();
        $this->arrayInfo['produto_list'] = $produtos->getAllProdutos();
        $this->arrayInfo['formas_pagamentos'] = $meiosPagamentos->getList();

		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $this->arrayInfo['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }
		$this->loadTemplate('compras_add', $this->arrayInfo);
    }
    
    public function getTotalcompra() {
        $clientes = new Clientes();
        $produtos = new Produtos();
        $compras = new Compras();
        $meiosPagamentos = new MeiosPagamentos();

        $this->arrayInfo['list'] = $compras->getAllCompras();
        $this->arrayInfo['cliente_list'] = $clientes->getAllClientes();
        $this->arrayInfo['produto_list'] = $produtos->getAllProdutos();
        $this->arrayInfo['formas_pagamentos'] = $meiosPagamentos->getList();

        $array = array();
    
        $sql = "SELECT subtotal FROM compras";
        $sql = $this->db->query($sql);
    
        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
            
    }
        return $array;
    }
    



    public function add_action() {
        
        //if(!empty($_POST['nome']) && !empty($_POST['cpf'])){
        if(!empty($_POST['produto'])){

        
            $produto = ucfirst($_POST['produto']);
            $quantidade = ucfirst($_POST['quantidade']);
            $valorunit = ucfirst($_POST['valorunit']);
            $subtotal = ucfirst($_POST['subtotal']);
            $valortotal = ucfirst($_POST['valortotal']);
        
            $this->m->addcompra($produto, $quantidade, $valorunit, $subtotal, $valortotal);
            header("Location:".BASE_URL."compras/add");
            exit;
            
        } else{
            $_SESSION['formError'] = array('produto');
            header("Location:".BASE_URL."compras/add");
            exit;

        }
    }
    
    public function getAllCompras() {
    $array = array();

    $sql = "SELECT * FROM compras";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
        $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        
}
    return $array;
}


    public function edit($id) {
        if(!empty($id)) {
            
            $m = new Compras();
            $this->arrayInfo['info'] = $m->get($id);

            if(count($this->arrayInfo['info']) > 0 ){
                $this->loadTemplate('compras_edit', $this->arrayInfo);
               } else {
                header("Location:".BASE_URL."compras");
                exit;
               }            
            
        } else {
            header("Location:".BASE_URL."compras");
            exit;
        }
    }

    public function edit_action($id){
        if(!empty($id)) {

            if(!empty($_POST['produto'])) {
                $m = new Compras();

                $produto = ($_POST['produto']);
                $quantidade = ($_POST['quantidade']);
                $valorunit = ($_POST['valorunit']);
                $subtotal = ($_POST['subtotal']);


                $m->update($produto, $id, $quantidade, $valorunit, $subtotal);
                header("Location:".BASE_URL."compras");
                exit;


            } else {
                $_SESSION['formError'] = array('produto');
                header("Location:".BASE_URL."compras/edit/".$id);
                exit;
            }
        } else {
            header("Location:".BASE_URL."compras");
            exit;
    }
}

public function del($id){
    if(!empty($id)){
      if($this->m->hasProducts($id) == false){
         $this->m->del($id);
      } 
    } 

    header("Location:".BASE_URL."compras/add");
    exit;
}

}
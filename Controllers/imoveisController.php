<?php
class ImoveisController extends Controller {
    private $user;
    private $arrayInfo;
    private $m;

    public function __construct(){
        $this->user = new User();
        $this->m = new Imoveis();
        

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
            'menuActive' => 'imoveis',
            'errorItems' => array(),
            'info' => array()
          );

    }

	public function index() {
        $imoveis = new Imoveis();

        $this->arrayInfo['list'] = $imoveis->getAllImoveis();

		$this->loadTemplate('imoveis', $this->arrayInfo);
    }
    

    public function add(){
        $categorias = new Categorias();
        $clientes = new Clientes();

        $this->arrayInfo['categoria_list'] = $categorias->getAllCategorias();
        $this->arrayInfo['cliente_list'] = $clientes->getAllClientes();


		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $this->arrayInfo['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }
		$this->loadTemplate('imoveis_add', $this->arrayInfo);
	}

    public function add_action() {
        
        //if(!empty($_POST['nome']) && !empty($_POST['cpf'])){
        if(!empty($_POST['matricula'])){

            $id_cliente = ($_POST['id_cliente']);
            $matricula = ($_POST['matricula']);
            $id_categoria = ($_POST['id_categoria']);
            $descricao = ($_POST['descricao']);
            $exclusividade = ($_POST['exclusividade']);
            $valor = str_replace(",",".", $_POST['valor']);
            $porcentagem = ($_POST['porcentagem']);
            $data_inicial = ($_POST['data_inicial']);
            $data_final = ($_POST['data_final']);
        
            $this->m->addimoveis($id_cliente, $matricula, $id_categoria, $descricao, $exclusividade, $valor, $porcentagem, $data_inicial, $data_final);
            header("Location:".BASE_URL."imoveis");
            exit;
            
        } else{
            $_SESSION['formError'] = array('id_cliente');
            header("Location:".BASE_URL."imoveis/add");
            exit;

        }
    }


    public function edit($id) {
        $categorias = new Categorias();
        $clientes = new Clientes();

        $this->arrayInfo['categoria_list'] = $categorias->getAllCategorias();
        $this->arrayInfo['cliente_list'] = $clientes->getAllClientes();


        if(!empty($id)) {
            
            $m = new Imoveis();
            $this->arrayInfo['info'] = $m->get($id);

            if(count($this->arrayInfo['info']) > 0 ){
                $this->loadTemplate('imoveis_edit', $this->arrayInfo);
               } else {
                header("Location:".BASE_URL."imoveis");
                exit;
               }            
            
        } else {
            header("Location:".BASE_URL."imoveis");
            exit;
        }
    }

    public function edit_action($id){
        if(!empty($id)) {

            if(!empty($_POST['id_cliente'])) {
                $m = new Imoveis();

                $id_cliente = ($_POST['id_cliente']);
                $matricula = ($_POST['matricula']);
                $id_categoria = ($_POST['id_categoria']);
                $descricao = ($_POST['descricao']);
                $exclusividade = ($_POST['exclusividade']);
                $valor = str_replace(",",".", $_POST['valor']);
                $porcentagem = ($_POST['porcentagem']);
                $data_inicial = ($_POST['data_inicial']);
                $data_final = ($_POST['data_final']);


                $m->update($id, $id_cliente, $matricula, $id_categoria, $descricao, $exclusividade, $valor, $porcentagem, $data_inicial, $data_final);
                header("Location:".BASE_URL."imoveis");
                exit;


            } else {
                $_SESSION['formError'] = array('nome');
                header("Location:".BASE_URL."imoveis/edit/".$id);
                exit;
            }
        } else {
            header("Location:".BASE_URL."imoveis");
            exit;
    }
}
public function del($id){
    if(!empty($id)){
         $this->m->del($id);
      } 
    header("Location:".BASE_URL."imoveis");
    exit;
}

public function publicar($id){
    if(!empty($id)){
      
         $this->m->publicar($id);
      } 
 

    header("Location:".BASE_URL."imoveis");
    exit;
}

public function abrir($id) {

    $imoveis = new Imoveis();

    $this->arrayInfo['list'] = $imoveis->list();
    if(!empty($id)) {
        
        $m = new Imoveis();
        $this->arrayInfo['info'] = $m->get($id);

        if(count($this->arrayInfo['info']) > 0 ){
            $this->loadTemplate('imoveis_abrir', $this->arrayInfo);
           } else {
            header("Location:".BASE_URL."imoveis");
            exit;
           }            
        
    } else {
        header("Location:".BASE_URL."imoveis");
        exit;
    }
}

public function autorizacao($id) {

    $imoveis = new Imoveis();

    $this->arrayInfo['list'] = $imoveis->list();
    if(!empty($id)) {
        
        $m = new Imoveis();
        $this->arrayInfo['info'] = $m->get($id);

        if(count($this->arrayInfo['info']) > 0 ){
            $this->loadTemplate('imoveis_autorizacao', $this->arrayInfo);
           } else {
            header("Location:".BASE_URL."imoveis");
            exit;
           }            
        
    } else {
        header("Location:".BASE_URL."imoveis");
        exit;
    }
}

public function autorizacaocnpj($id) {

    $imoveis = new Imoveis();

    $this->arrayInfo['list'] = $imoveis->list();
    if(!empty($id)) {
        
        $m = new Imoveis();
        $this->arrayInfo['info'] = $m->get($id);

        if(count($this->arrayInfo['info']) > 0 ){
            $this->loadTemplate('imoveis_autorizacaocnpj', $this->arrayInfo);
           } else {
            header("Location:".BASE_URL."imoveis");
            exit;
           }            
        
    } else {
        header("Location:".BASE_URL."imoveis");
        exit;
    }
}
}
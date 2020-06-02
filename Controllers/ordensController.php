<?php
class OrdensController extends Controller {
    private $user;
    private $arrayInfo;
    private $m;

    public function __construct(){
        $this->user = new User();
        $this->m = new Ordens();
        

    	if(!$this->user->isLogged()){
    		header("Location:".BASE_URL."login");
    		exit;
        }
        
        if(!$this->user->hasPermission('ver_financeiro')){
            header("Location:".BASE_URL);
            exit;
        }

        $this->arrayInfo = array(
            'user' => $this->user,
            'menuActive' => 'ordens',
            'errorItems' => array(),
            'info' => array()
          );

    }

	public function index() {
        $ordens = new Ordens();
        $cli = new Clientes();

        $this->arrayInfo['cli_list'] = $cli->getAllClientes();

        $this->arrayInfo['list'] = $ordens->getAllOrdensNaoBaixados();

		$this->loadTemplate('ordens', $this->arrayInfo);
    }

    public function Baixados() {
        $ordens = new Ordens();

        $this->arrayInfo['list'] = $ordens->getAllOrdensBaixados();

		$this->loadTemplate('ordens_baixados', $this->arrayInfo);
    }
    

    public function add(){
        $con = new Contas();
        $cli = new Clientes();

        $this->arrayInfo['con_list'] = $con->getAllContas();
        $this->arrayInfo['cli_list'] = $cli->getAllClientes();

		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $this->arrayInfo['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }
		$this->loadTemplate('ordens_add', $this->arrayInfo);
	}

    public function add_action() {
        
        //if(!empty($_POST['nome']) && !empty($_POST['cpf'])){
        if(!empty($_POST['id_cliente'])){

            $id_cliente = ($_POST['id_cliente']);
            $descricao = ($_POST['descricao']);
            $data_execucao = ($_POST['data_execucao']);
            $hora_execucao = ($_POST['hora_execucao']);
            $status_orden = 0;
        
            $this->m->addorden($id_cliente, $descricao, $data_execucao, $hora_execucao, $status_orden);

            header("Location:".BASE_URL."ordens");
            exit;
            
        } else{
            $_SESSION['formError'] = array('id_cliente');
            header("Location:".BASE_URL."ordens/add");
            exit;

        }
    }


    public function edit($id) {
        $ordens = new Ordens();
        $con = new Contas();
        $cli = new Clientes();

        $this->arrayInfo['con_list'] = $con->getAllContas();
        $this->arrayInfo['cli_list'] = $cli->getAllClientes();
        $this->arrayInfo['orden_list'] = $ordens->getAllOrdens();



        if(!empty($id)) {
            
            $m = new Ordens();
            $this->arrayInfo['info'] = $m->get($id);

            if(count($this->arrayInfo['info']) > 0 ){
                $this->loadTemplate('ordens_edit', $this->arrayInfo);
               } else {
                header("Location:".BASE_URL."ordens");
                exit;
               }            
            
        } else {
            header("Location:".BASE_URL."ordens");
            exit;
        }
    }

    public function edit_action($id){
        if(!empty($id)) {

            if(!empty($_POST['id_cliente'])){
                $m = new Ordens();

                $id_cliente = ($_POST['id_cliente']);
                $descricao = ($_POST['descricao']);
                $data_execucao = ($_POST['data_execucao']);
                $hora_execucao = ($_POST['hora_execucao']);
                $status_orden = 0;

                $m->update($id_cliente, $descricao, $data_execucao, $hora_execucao, $status_orden, $id);
                header("Location:".BASE_URL."ordens");
                exit;


            } else {
                $_SESSION['formError'] = array('data_execucao');
                header("Location:".BASE_URL."ordens/edit/".$id);
                exit;
            }
        } else {
            header("Location:".BASE_URL."ordens");
            exit;
    }
    }

    public function baixar($id) {
        $ordens = new Ordens();
        $cli = new Clientes();

        $this->arrayInfo['cli_list'] = $cli->getAllClientes();
        $this->arrayInfo['orden_list'] = $ordens->getAllOrdens();



        if(!empty($id)) {
            
            $m = new Ordens();
            $this->arrayInfo['info'] = $m->get($id);

            if(count($this->arrayInfo['info']) > 0 ){
                $this->loadTemplate('ordens_baixar', $this->arrayInfo);
               } else {
                header("Location:".BASE_URL."ordens/baixados");
                exit;
               }            
            
        } else {
            header("Location:".BASE_URL."ordens/baixados");
            exit;
        }
    }

    public function baixar_action($id){
        if(!empty($id)) {

            if(!empty($_POST['id_cliente'])) {
                $m = new Ordens();

                $id_cliente = ($_POST['id_cliente']);
                $data_fechamento = ($_POST['data_fechamento']);
                $hora_fechamento = ($_POST['hora_fechamento']);
                $valor = ($_POST['valor']);     
                $informacao = ($_POST['informacao']);  
                $status_orden = 1;  
     

                $m->updatebaixar($id_cliente, $data_fechamento, $hora_fechamento, $valor, $informacao, $status_orden, $id);
                header("Location:".BASE_URL."ordens/baixados");
                exit;


            } else {
                $_SESSION['formError'] = array('id_cliente');
                header("Location:".BASE_URL."ordens/baixados/".$id);
                exit;
            }
        } else {
            header("Location:".BASE_URL."ordens/baixados");
            exit;
    }
    }



}
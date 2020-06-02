<?php 
class ContasController extends Controller {
    
    private $user;
    private $arrayInfo;
    private $m;

	public function __construct(){
       $this->user = new User();
       $this->m = new Contas();
       

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
          'menuActive' => 'marcas',
          'errorItems' => array(),
          'info' => array()
        );
       
	}

	public function index(){

		$this->arrayInfo['list'] = $this->m->getAllContas();
		$this->loadTemplate('contas', $this->arrayInfo);
	}

	public function add(){
		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $this->arrayInfo['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }
		$this->loadTemplate('contas_add', $this->arrayInfo);
	}

	public function add_action(){
		if(!empty($_POST['banco'])){
		   $banco = ucfirst($_POST['banco']);
		   $agencia = ucfirst($_POST['agencia']);
		   $operacao = ucfirst($_POST['operacao']);
		   $numero = ucfirst($_POST['numero']);
		   $status_conta = ucfirst($_POST['status_conta']);
           $this->m->addconta($banco, $agencia, $operacao, $numero, $status_conta);
           header("Location:".BASE_URL."contas");
		   exit;
		} else {
			$_SESSION['formError'] = array('banco');
			header("Location:".BASE_URL."contas/add");
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
            $this->loadTemplate('contas_edit', $this->arrayInfo);
		} else {
		    header("Location:".BASE_URL."contas");
		    exit;
		}
	}

	public function edit_action($id){
		if(!empty($id)){
		    if(!empty($_POST['banco'])){
			$banco = ($_POST['banco']);
			$agencia = ($_POST['agencia']);
			$operacao = ($_POST['operacao']);
			$numero = ($_POST['numero']);
			$status_conta = ($_POST['status_conta']);
            $this->m->update($banco, $agencia, $operacao, $numero, $status_conta, $id);
            header("Location:".BASE_URL."contas");
		    exit;
		   } else {
		   	  $_SESSION['formError'] = array('contas');
		   	  header("Location:".BASE_URL."contas/edit/".$id);
		  exit;
		   }
		} else {
		  header("Location:".BASE_URL."contas");
		  exit;
		}
	}

	public function del($id){
		if(!empty($id)){
          if($this->m->hasProducts($id) == false){
             $this->m->del($id);
          } 
		} 

		header("Location:".BASE_URL."contas");
		exit;
	}

}
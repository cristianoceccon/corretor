<?php

use GuzzleHttp\Client;

class ChequesController extends Controller {
    private $user;
    private $arrayInfo;
    private $m;

    public function __construct(){
        $this->user = new User();
        $this->m = new Cheques();
        

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
            'menuActive' => 'cheques',
            'errorItems' => array(),
            'info' => array()
          );

    }

	public function index() {
        $cheques = new Cheques();

        $this->arrayInfo['list'] = $cheques->getAllChequesNaoBaixados();

		$this->loadTemplate('cheques', $this->arrayInfo);
    }

    public function Baixados() {
        $cheques = new Cheques();

        $this->arrayInfo['list'] = $cheques->getAllChequesBaixados();

		$this->loadTemplate('cheques_baixados', $this->arrayInfo);
    }
    

    public function add(){
        $con = new Contas();
        $for = new Fornecedores();

        $this->arrayInfo['con_list'] = $con->getAllContas();
        $this->arrayInfo['for_list'] = $for->getAllFornecedores();

		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $this->arrayInfo['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }
		$this->loadTemplate('cheques_add', $this->arrayInfo);
	}

    public function add_action() {
        
        //if(!empty($_POST['nome']) && !empty($_POST['cpf'])){
        if(!empty($_POST['id_conta_banco'])){

       
            $id_conta_banco = ($_POST['id_conta_banco']);
            $id_conta_numero = ($_POST['id_conta_numero']);
            $numero = ($_POST['numero']);
            $valor = ($_POST['valor']);
            $id_fornecedor = ($_POST['id_fornecedor']);
            $data_emissao = ($_POST['data_emissao']);
            $data_vencimento = ($_POST['data_vencimento']);
            $historico = ($_POST['historico']);
            $status_cheque = 0;
        
            $this->m->addcheque($id_conta_banco, $id_conta_numero, $numero, $valor, $id_fornecedor, $data_emissao, $data_vencimento, $historico, $status_cheque);
            ?>
            <div class="alert alert-success"> Cadastrado com sucesso! </div>
            <?php
            header("Location:".BASE_URL."cheques");
            exit;
            
        } else{
            $_SESSION['formError'] = array('nome');
            header("Location:".BASE_URL."cheques/add");
            exit;

        }
    }


    public function edit($id) {
        $cheques = new Cheques();
        $con = new Contas();
        $for = new Fornecedores();

        $this->arrayInfo['con_list'] = $con->getAllContas();
        $this->arrayInfo['for_list'] = $for->getAllFornecedores();
        $this->arrayInfo['cheque_list'] = $cheques->getAllCheques();



        if(!empty($id)) {
            
            $m = new Cheques();
            $this->arrayInfo['info'] = $m->get($id);

            if(count($this->arrayInfo['info']) > 0 ){
                $this->loadTemplate('cheques_edit', $this->arrayInfo);
               } else {
                header("Location:".BASE_URL."cheques");
                exit;
               }            
            
        } else {
            header("Location:".BASE_URL."cheques");
            exit;
        }
    }

    public function edit_action($id){
        if(!empty($id)) {

            if(!empty($_POST['id_conta_banco'])) {
                $m = new Cheques();

                $id_conta_banco = ($_POST['id_conta_banco']);
                $id_conta_numero = ($_POST['id_conta_numero']);
                $numero = ($_POST['numero']);
                $valor = ($_POST['valor']);
                $id_fornecedor = ($_POST['id_fornecedor']);
                $data_emissao = ($_POST['data_emissao']);
                $data_vencimento = ($_POST['data_vencimento']);
                $historico = ($_POST['historico']);
                $status_cheque = "0";  
                $data_baixa = ($_POST['data_baixa']);                 

                $m->update($id_conta_banco, $id_conta_numero, $numero, $valor, $id_fornecedor, $data_emissao, $data_vencimento, $historico, $status_cheque, $data_baixa, $id);
                header("Location:".BASE_URL."cheques");
                exit;


            } else {
                $_SESSION['formError'] = array('nome');
                header("Location:".BASE_URL."cheques/edit/".$id);
                exit;
            }
        } else {
            header("Location:".BASE_URL."cheques");
            exit;
    }
    }

    public function baixar($id) {
        $cheques = new Cheques();
        $con = new Contas();
        $for = new Fornecedores();

        $this->arrayInfo['con_list'] = $con->getAllContas();
        $this->arrayInfo['for_list'] = $for->getAllFornecedores();
        $this->arrayInfo['cheque_list'] = $cheques->getAllCheques();



        if(!empty($id)) {
            
            $m = new Cheques();
            $this->arrayInfo['info'] = $m->get($id);

            if(count($this->arrayInfo['info']) > 0 ){
                $this->loadTemplate('cheques_baixar', $this->arrayInfo);
               } else {
                header("Location:".BASE_URL."cheques");
                exit;
               }            
            
        } else {
            header("Location:".BASE_URL."cheques");
            exit;
        }
    }

    public function baixar_action($id){
        if(!empty($id)) {

            if(!empty($_POST['id_conta_banco'])) {
                $m = new Cheques();

                $id_conta_banco = ($_POST['id_conta_banco']);
                $id_conta_numero = ($_POST['id_conta_numero']);
                $numero = ($_POST['numero']);
                $valor = ($_POST['valor']);
                $id_fornecedor = ($_POST['id_fornecedor']);
                $data_emissao = ($_POST['data_emissao']);
                $data_vencimento = ($_POST['data_vencimento']);
                $historico = ($_POST['historico']);
                $status_cheque = "1";  
                $data_baixa = ($_POST['data_baixa']);                 

                $m->update($id_conta_banco, $id_conta_numero, $numero, $valor, $id_fornecedor, $data_emissao, $data_vencimento, $historico, $status_cheque, $data_baixa, $id);
                header("Location:".BASE_URL."cheques");
                exit;


            } else {
                $_SESSION['formError'] = array('nome');
                header("Location:".BASE_URL."cheques/baixar/".$id);
                exit;
            }
        } else {
            header("Location:".BASE_URL."cheques");
            exit;
    }
    }



}
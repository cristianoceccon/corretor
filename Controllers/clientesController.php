<?php

class ClientesController extends Controller {
    private $user;
    private $arrayInfo;
    private $m;

    public function __construct(){
        $this->user = new User();
        $this->m = new Clientes();
        

    	if(!$this->user->isLogged()){
    		header("Location:".BASE_URL."login");
    		exit;
        }
        
        if(!$this->user->hasPermission('ver_clientes')){
            header("Location:".BASE_URL);
            exit;
        }

        $this->arrayInfo = array(
            'user' => $this->user,
            'menuActive' => 'clientes',
            'errorItems' => array(),
            'info' => array()
          );

    }

	public function index() {

        $this->arrayInfo['list'] = $this->m->getAllClientes();
		$this->loadTemplate('clientes', $this->arrayInfo);
    }
    
    public function getTotalClientes(){

        $sql = ("SELECT COUNT(*) as c FROM clientes");
        $row = $sql->fetch();

        return $row['c'];
    }

    public function add(){
		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $this->arrayInfo['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }
		$this->loadTemplate('clientes_add', $this->arrayInfo);
	}

    public function add_action() {
        
        //if(!empty($_POST['nome']) && !empty($_POST['cpf'])){
        if(!empty($_POST['nome'])){

            $nome = ucfirst($_POST['nome']);
            $cpf = ($_POST['cpf']);
            $rg = ($_POST['rg']);
            $data_nasc = ($_POST['data_nasc']);
            $nome_pai = ucfirst($_POST['nome_pai']);
            $nome_mae = ucfirst($_POST['nome_mae']);
            $cep = ($_POST['cep']);
            $estado = ucfirst($_POST['estado']);
            $cidade = ucfirst($_POST['cidade']);
            $endereco = ucfirst($_POST['endereco']);
            $numero_end = ($_POST['numero_end']);
            $complemento = ($_POST['complemento']);
            $bairro = ucfirst($_POST['bairro']);
            $telefone_fixo = ($_POST['telefone_fixo']);
            $telefone_celular_1 = ($_POST['telefone_celular_1']);
            $telefone_celular_2 = ($_POST['telefone_celular_2']);
            $email = ($_POST['email']);
            $razao = ($_POST['razao']);
            $cnpj = ($_POST['cnpj']);
        
            $this->m->addcliente($nome, $cpf, $rg, $data_nasc, $nome_pai, $nome_mae, $cep, $estado, $cidade, $endereco, $numero_end, $complemento, $bairro, $telefone_fixo, $telefone_celular_1, $telefone_celular_2, $email, $razao, $cnpj);
            header("Location:".BASE_URL."clientes");
            exit;
            
        } else{
            $_SESSION['formError'] = array('nome');
            header("Location:".BASE_URL."clientes/add");
            exit;

        }
    }public function getAllClientes() {
    $array = array();

    $sql = "SELECT * FROM clientes";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
        $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        
}
    return $array;
}


    public function edit($id) {
        if(!empty($id)) {
            
            $m = new Clientes();
            $this->arrayInfo['info'] = $m->get($id);

            if(count($this->arrayInfo['info']) > 0 ){
                $this->loadTemplate('clientes_edit', $this->arrayInfo);
               } else {
                header("Location:".BASE_URL."clientes");
                exit;
               }            
            
        } else {
            header("Location:".BASE_URL."clientes");
            exit;
        }
    }

    public function edit_action($id){
        if(!empty($id)) {

            if(!empty($_POST['nome'])) {
                $m = new Clientes();

                $nome = ($_POST['nome']);
                $cpf = ($_POST['cpf']);
                $rg = ($_POST['rg']);
                $data_nasc = ($_POST['data_nasc']);
                $nome_pai = ($_POST['nome_pai']);
                $nome_mae = ($_POST['nome_mae']);
                $cep = ($_POST['cep']);
                $estado = ($_POST['estado']);
                $cidade = ($_POST['cidade']);
                $endereco = ($_POST['endereco']);
                $numero_end = ($_POST['numero_end']);
                $complemento = ($_POST['complemento']);
                $bairro = ($_POST['bairro']);
                $telefone_fixo = ($_POST['telefone_fixo']);
                $telefone_celular_1 = ($_POST['telefone_celular_1']);
                $telefone_celular_2 = ($_POST['telefone_celular_2']);
                $email = ($_POST['email']);
                $razao = ($_POST['razao']);
                $cnpj = ($_POST['cnpj']);

                $m->update($nome, $id, $cpf, $rg, $data_nasc, $nome_pai, $nome_mae, $cep, $estado, $cidade, $endereco, $numero_end, $complemento, $bairro, $telefone_fixo, $telefone_celular_1, $telefone_celular_2, $email, $razao, $cnpj);
                header("Location:".BASE_URL."clientes");
                exit;


            } else {
                $_SESSION['formError'] = array('nome');
                header("Location:".BASE_URL."clientes/edit/".$id);
                exit;
            }
        } else {
            header("Location:".BASE_URL."clientes");
            exit;
    }
}

public function del($id){
    if(!empty($id)){
      if($this->m->hasProducts($id) == false){
         $this->m->del($id);
      } 
    } 

    header("Location:".BASE_URL."clientes");
    exit;
}
}
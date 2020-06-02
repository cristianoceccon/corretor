<?php
class EmpresaController extends Controller {
    private $user;
    private $arrayInfo;
    private $m;

    public function __construct(){
        $this->user = new User();
        $this->m = new Empresa();
        

    	if(!$this->user->isLogged()){
    		header("Location:".BASE_URL."login");
    		exit;
        }
        
        if(!$this->user->hasPermission('ver_empresa')){
            header("Location:".BASE_URL);
            exit;
        }

        $this->arrayInfo = array(
            'user' => $this->user,
            'menuActive' => 'empresa',
            'errorItems' => array(),
            'info' => array()
          );

    }

	public function index() {
        $empresa = new Empresa();

        $this->arrayInfo['list'] = $empresa->getAllEmpresa();

		$this->loadTemplate('empresa', $this->arrayInfo);
    }
    

    public function add(){
		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $this->arrayInfo['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }
		$this->loadTemplate('empresa_add', $this->arrayInfo);
	}

    public function add_action() {
        
        //if(!empty($_POST['nome']) && !empty($_POST['cpf'])){
        if(!empty($_POST['cnpj'])){

            $cnpj = ucfirst($_POST['cnpj']);
            $razaosocial = ucfirst($_POST['razaosocial']);
            $email = ucfirst($_POST['email']);
            $telefone = ucfirst($_POST['telefone']);
            $celular = ucfirst($_POST['celular']);
            $cep = ucfirst($_POST['cep']);
            $endereco = ucfirst($_POST['endereco']);
            $numero = ucfirst($_POST['numero']);
            $complemento = ucfirst($_POST['complemento']);
            $bairro = ucfirst($_POST['bairro']);
            $cidade = ucfirst($_POST['cidade']);
            $uf = ucfirst($_POST['uf']);
            $inscricao = ucfirst($_POST['inscricao']);
        
            $this->m->addempre($cnpj, $razaosocial, $email, $telefone, $celular, $cep, $endereco, $numero, $complemento, $bairro, $cidade, $uf, $inscricao);
            header("Location:".BASE_URL."empresa");
            exit;
            
        } else{
            $_SESSION['formError'] = array('cnpj');
            header("Location:".BASE_URL."empresa/add");
            exit;

        }
    }public function getAllEmpresa() {
    $array = array();

    $sql = "SELECT * FROM empresa";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
        $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        
}
    return $array;
}


    public function edit($id) {
        if(!empty($id)) {
            
            $m = new Empresa();
            $this->arrayInfo['info'] = $m->get($id);

            if(count($this->arrayInfo['info']) > 0 ){
                $this->loadTemplate('empresa_edit', $this->arrayInfo);
               } else {
                header("Location:".BASE_URL."empresa");
                exit;
               }            
            
        } else {
            header("Location:".BASE_URL."empresa");
            exit;
        }
    }

    public function edit_action($id){
        if(!empty($id)) {

            if(!empty($_POST['cnpj'])) {
                $m = new Empresa();

                $cnpj = ($_POST['cnpj']);
                $razaosocial = ($_POST['razaosocial']);
                $fantasia = ($_POST['fantasia']);
                $inscricao = ($_POST['inscricao']);
                $email = ($_POST['email']);
                $telefone = ($_POST['telefone']);
                $celular = ($_POST['celular']);
                $cep = ($_POST['cep']);
                $endereco = ($_POST['endereco']);
                $numero = ($_POST['numero']);
                $complemento = ($_POST['complemento']);
                $bairro = ($_POST['bairro']);
                $cidade = ($_POST['cidade']);
                $uf = ($_POST['uf']);
                
                $m->update($cnpj, $id, $razaosocial, $fantasia, $inscricao, $email, $telefone, $celular, $cep, $endereco, $numero, $complemento, $bairro, $cidade, $uf);
                header("Location:".BASE_URL."empresa");
                exit;


            } else {
                $_SESSION['formError'] = array('cnpj');
                header("Location:".BASE_URL."empresa/edit/".$id);
                exit;
            }
        } else {
            header("Location:".BASE_URL."empresa");
            exit;
    }
}
}
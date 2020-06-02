<?php
class PlanosGrupoSecundarioController extends Controller {
    private $user;
    private $arrayInfo;
    private $m;

    public function __construct(){
        $this->user = new User();
        $this->m = new PlanosGrupoSecundario();
        

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
            'menuActive' => 'planosgruposecundario',
            'errorItems' => array(),
            'info' => array()
          );

    }

	public function index() {
        $planosgruposecundario = new PlanosGrupoSecundario();

        $this->arrayInfo['list'] = $planosgruposecundario->getAllPlanosGrupoSecundario();

		$this->loadTemplate('planosgruposecundario', $this->arrayInfo);
    }
    

    public function add(){
        $planosgruposecundario = new PlanosGrupoSecundario();

        $this->arrayInfo['planosgruposecundario_list'] = $planosgruposecundario->getAllPlanosGrupoSecundario();


		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $this->arrayInfo['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }
		$this->loadTemplate('planosgruposecundario_add', $this->arrayInfo);
	}

    public function add_action() {
        
        //if(!empty($_POST['nome']) && !empty($_POST['cpf'])){
        if(!empty($_POST['nome'])){

       
            $nome = ucfirst($_POST['nome']);
        
            $this->m->addplanogruposecundario($nome);
            header("Location:".BASE_URL."planosgruposecundario");
            exit;
            
        } else{
            $_SESSION['formError'] = array('nome');
            header("Location:".BASE_URL."planosgruposecundario/add");
            exit;

        }
    }
    
    public function getAllPlanosGrupoSecundario() {
    $array = array();

    $sql = "SELECT * FROM planosgruposecundario";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
        $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        
}
    return $array;
}


    public function edit($id) {
        $planosgruposecundario = new PlanosGrupoSecundario();

        $this->arrayInfo['planogruposecundario_list'] = $planosgruposecundario->getAllPlanosGrupoSecundario();

        if(!empty($id)) {
            
            $m = new PlanosGrupoSecundario();
            $this->arrayInfo['info'] = $m->get($id);

            if(count($this->arrayInfo['info']) > 0 ){
                $this->loadTemplate('planosgruposecundario_edit', $this->arrayInfo);
               } else {
                header("Location:".BASE_URL."planosgruposecundario");
                exit;
               }            
            
        } else {
            header("Location:".BASE_URL."planosgruposecundario");
            exit;
        }
    }

    public function edit_action($id){
        if(!empty($id)) {

            if(!empty($_POST['nome'])) {
                $m = new PlanosGrupoSecundario();

                $nome = ($_POST['nome']);

                $m->update($nome, $id);
                header("Location:".BASE_URL."planosgruposecundario");
                exit;


            } else {
                $_SESSION['formError'] = array('nome');
                header("Location:".BASE_URL."planosgruposecundario/edit/".$id);
                exit;
            }
        } else {
            header("Location:".BASE_URL."planosgruposecundario");
            exit;
    }
}
}
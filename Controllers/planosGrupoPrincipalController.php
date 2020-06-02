<?php
class PlanosGrupoPrincipalController extends Controller {
    private $user;
    private $arrayInfo;
    private $m;

    public function __construct(){
        $this->user = new User();
        $this->m = new PlanosGrupoPrincipal();
        

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
            'menuActive' => 'planosgrupoprincipal',
            'errorItems' => array(),
            'info' => array()
          );

    }

	public function index() {
        $planosgrupoprincipal = new PlanosGrupoPrincipal();

        $this->arrayInfo['list'] = $planosgrupoprincipal->getAllPlanosGrupoPrincipal();

		$this->loadTemplate('planosgrupoprincipal', $this->arrayInfo);
    }
    

    public function add(){
        $planosgrupoprincipal = new PlanosGrupoPrincipal();

        $this->arrayInfo['planosgrupoprincipal_list'] = $planosgrupoprincipal->getAllPlanosGrupoPrincipal();


		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $this->arrayInfo['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }
		$this->loadTemplate('planosgrupoprincipal_add', $this->arrayInfo);
	}

    public function add_action() {
        
        //if(!empty($_POST['nome']) && !empty($_POST['cpf'])){
        if(!empty($_POST['nome'])){

       
            $nome = ucfirst($_POST['nome']);
        
            $this->m->addplanogrupoprincipal($nome);
            header("Location:".BASE_URL."planosgrupoprincipal");
            exit;
            
        } else{
            $_SESSION['formError'] = array('nome');
            header("Location:".BASE_URL."planosgrupoprincipal/add");
            exit;

        }
    }
    
    public function getAllPlanosGrupoPrincipal() {
    $array = array();

    $sql = "SELECT * FROM planosgrupoprincipal";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
        $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        
}
    return $array;
}


    public function edit($id) {
        $planosgrupoprincipal = new PlanosGrupoPrincipal();

        $this->arrayInfo['planogrupoprincipal_list'] = $planosgrupoprincipal->getAllPlanosGrupoPrincipal();


        if(!empty($id)) {
            
            $m = new PlanosGrupoPrincipal();
            $this->arrayInfo['info'] = $m->get($id);

            if(count($this->arrayInfo['info']) > 0 ){
                $this->loadTemplate('planosgrupoprincipal_edit', $this->arrayInfo);
               } else {
                header("Location:".BASE_URL."planosgrupoprincipal");
                exit;
               }            
            
        } else {
            header("Location:".BASE_URL."planosgrupoprincipal");
            exit;
        }
    }

    public function edit_action($id){
        if(!empty($id)) {

            if(!empty($_POST['nome'])) {
                $m = new PlanosGrupoPrincipal();

                $nome = ($_POST['nome']);


                $m->update($nome, $id);
                header("Location:".BASE_URL."planosgrupoprincipal");
                exit;


            } else {
                $_SESSION['formError'] = array('nome');
                header("Location:".BASE_URL."planosgrupoprincipal/edit/".$id);
                exit;
            }
        } else {
            header("Location:".BASE_URL."planosgrupoprincipal");
            exit;
    }
}
}
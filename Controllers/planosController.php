<?php
class PlanosController extends Controller {
    private $user;
    private $arrayInfo;
    private $m;

    public function __construct(){
        $this->user = new User();
        $this->m = new Planos();
        

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
            'menuActive' => 'planos',
            'errorItems' => array(),
            'info' => array()
          );

    }

	public function index() {
        $planos = new Planos();

        $this->arrayInfo['list'] = $planos->getAllPlanos();

		$this->loadTemplate('planos', $this->arrayInfo);
    }
    

    public function add(){
        $planoscategoria = new PlanosCategoria();
        $planosgrupoprincipal = new PlanosGrupoPrincipal();
        $planosgruposecundario = new PlanosGrupoSecundario();

        $this->arrayInfo['planoscategoria_list'] = $planoscategoria->getAllPlanosCategoria();
        $this->arrayInfo['planosgrupoprincipal_list'] = $planosgrupoprincipal->getAllPlanosGrupoPrincipal();
        $this->arrayInfo['planosgruposecundario_list'] = $planosgruposecundario->getAllPlanosGrupoSecundario();


		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $this->arrayInfo['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }
		$this->loadTemplate('planos_add', $this->arrayInfo);
	}

    public function add_action() {
        
        //if(!empty($_POST['nome']) && !empty($_POST['cpf'])){
        if(!empty($_POST['nome'])){

       
            $nome = ucfirst($_POST['nome']);
            $id_categoria = ($_POST['id_categoria']);
            $id_grupo_principal = ($_POST['id_grupo_principal']);
            $id_grupo_secundario = ($_POST['id_grupo_secundario']);
        
            $this->m->addplano($nome, $id_categoria, $id_grupo_principal, $id_grupo_secundario);
            header("Location:".BASE_URL."planos");
            exit;
            
        } else{
            $_SESSION['formError'] = array('nome');
            header("Location:".BASE_URL."planos/add");
            exit;

        }
    }public function getAllPlanos() {
    $array = array();

    $sql = "SELECT * FROM planos";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
        $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        
}
    return $array;
}


    public function edit($id) {
        $planoscategoria = new PlanosCategoria();
        $planosgrupoprincipal = new PlanosGrupoPrincipal();
        $planosgruposecundario = new PlanosGrupoSecundario();

        $this->arrayInfo['planoscategoria_list'] = $planoscategoria->getAllPlanosCategoria();
        $this->arrayInfo['planosgrupoprincipal_list'] = $planosgrupoprincipal->getAllPlanosGrupoPrincipal();
        $this->arrayInfo['planosgruposecundario_list'] = $planosgruposecundario->getAllPlanosGrupoSecundario();


        if(!empty($id)) {
            
            $m = new Planos();
            $this->arrayInfo['info'] = $m->get($id);

            if(count($this->arrayInfo['info']) > 0 ){
                $this->loadTemplate('planos_edit', $this->arrayInfo);
               } else {
                header("Location:".BASE_URL."planos");
                exit;
               }            
            
        } else {
            header("Location:".BASE_URL."planos");
            exit;
        }
    }

    public function edit_action($id){
        if(!empty($id)) {

            if(!empty($_POST['nome'])) {
                $m = new Planos();

                $nome = ucfirst($_POST['nome']);
                $id_categoria = ($_POST['id_categoria']);
                $id_grupo_principal = ($_POST['id_grupo_principal']);
                $id_grupo_secundario = ($_POST['id_grupo_secundario']);


                $m->update($nome, $id, $id_categoria, $id_grupo_principal, $id_grupo_secundario);
                header("Location:".BASE_URL."planos");
                exit;


            } else {
                $_SESSION['formError'] = array('nome');
                header("Location:".BASE_URL."planos/edit/".$id);
                exit;
            }
        } else {
            header("Location:".BASE_URL."planos");
            exit;
    }
}
public function del($id){
    if(!empty($id)){
      if($this->m->getAllPlanos($id) == false){
         $this->m->del($id);
      } 
    } 

    header("Location:".BASE_URL."planos");
    exit;
}

}
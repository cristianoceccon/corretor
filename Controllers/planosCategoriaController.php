<?php
class PlanosCategoriaController extends Controller {
    private $user;
    private $arrayInfo;
    private $m;

    public function __construct(){
        $this->user = new User();
        $this->m = new PlanosCategoria();
        

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
            'menuActive' => 'planoscategoria',
            'errorItems' => array(),
            'info' => array()
          );

    }

	public function index() {
        $planoscategoria = new PlanosCategoria();

        $this->arrayInfo['list'] = $planoscategoria->getAllPlanosCategoria();

		$this->loadTemplate('planoscategoria', $this->arrayInfo);
    }
    

    public function add(){
        $categorias = new Categorias();

        $this->arrayInfo['categoria_list'] = $categorias->getAllCategorias();


		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $this->arrayInfo['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }
		$this->loadTemplate('planoscategoria_add', $this->arrayInfo);
	}

    public function add_action() {
        
        //if(!empty($_POST['nome']) && !empty($_POST['cpf'])){
        if(!empty($_POST['nome'])){

       
            $nome = ucfirst($_POST['nome']);
        
            $this->m->addplanocategoria($nome);
            header("Location:".BASE_URL."planoscategoria");
            exit;
            
        } else{
            $_SESSION['formError'] = array('nome');
            header("Location:".BASE_URL."planoscategoria/add");
            exit;

        }
    }public function getAllPlanosCategoria() {
    $array = array();

    $sql = "SELECT * FROM planoscategoria";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
        $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        
}
    return $array;
}


    public function edit($id) {
        $planoscategoria = new PlanosCategoria();
        $categorias = new Categorias();

        $this->arrayInfo['planocategoria_list'] = $planoscategoria->getAllPlanosCategoria();
        $this->arrayInfo['categoria_list'] = $categorias->getAllCategorias();


        if(!empty($id)) {
            
            $m = new PlanosCategoria();
            $this->arrayInfo['info'] = $m->get($id);

            if(count($this->arrayInfo['info']) > 0 ){
                $this->loadTemplate('planoscategoria_edit', $this->arrayInfo);
               } else {
                header("Location:".BASE_URL."planoscategoria");
                exit;
               }            
            
        } else {
            header("Location:".BASE_URL."planoscategoria");
            exit;
        }
    }

    public function edit_action($id){
        if(!empty($id)) {

            if(!empty($_POST['nome'])) {
                $m = new PlanosCategoria();

                $nome = ($_POST['nome']);

                $m->update($nome, $id);
                header("Location:".BASE_URL."planoscategoria");
                exit;


            } else {
                $_SESSION['formError'] = array('nome');
                header("Location:".BASE_URL."planoscategoria/edit/".$id);
                exit;
            }
        } else {
            header("Location:".BASE_URL."planoscategoria");
            exit;
    }
}
}
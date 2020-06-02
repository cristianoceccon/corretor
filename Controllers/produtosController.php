<?php
class ProdutosController extends Controller {
    private $user;
    private $arrayInfo;
    private $m;

    public function __construct(){
        $this->user = new User();
        $this->m = new Produtos();
        

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
            'menuActive' => 'produtos',
            'errorItems' => array(),
            'info' => array()
          );

    }

	public function index() {
        $produtos = new Produtos();

        $this->arrayInfo['list'] = $produtos->getAllProdutos();

		$this->loadTemplate('produtos', $this->arrayInfo);
    }
    

    public function add(){
        $categorias = new Categorias();

        $this->arrayInfo['categoria_list'] = $categorias->getAllCategorias();


		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $this->arrayInfo['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }
		$this->loadTemplate('produtos_add', $this->arrayInfo);
	}

    public function add_action() {
        
        //if(!empty($_POST['nome']) && !empty($_POST['cpf'])){
        if(!empty($_POST['nome'])){

            $nome = ucfirst($_POST['nome']);
            $descricao = ucfirst($_POST['descricao']);
            $custo = str_replace(",",".", $_POST['custo']);
            $venda = str_replace(",",".", $_POST['venda']);
            $id_categoria = ($_POST['id_categoria']);
        
            $this->m->addproduto($nome, $descricao, $custo, $venda, $id_categoria);
            header("Location:".BASE_URL."produtos");
            exit;
            
        } else{
            $_SESSION['formError'] = array('nome');
            header("Location:".BASE_URL."produtos/add");
            exit;

        }
    }
    public function getAllProdutos() {
        $categorias = new Categorias();

        $this->arrayInfo['categoria_list'] = $categorias->getAllCategorias();

    $array = array();

    $sql = "SELECT * FROM produtos";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
        $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        
}
    return $array;
}


    public function edit($id) {
        $produtos = new Produtos();
        $categorias = new Categorias();

        $this->arrayInfo['produto_list'] = $produtos->getAllProdutos();
        $this->arrayInfo['categoria_list'] = $categorias->getAllCategorias();


        if(!empty($id)) {
            
            $m = new Produtos();
            $this->arrayInfo['info'] = $m->get($id);

            if(count($this->arrayInfo['info']) > 0 ){
                $this->loadTemplate('produtos_edit', $this->arrayInfo);
               } else {
                header("Location:".BASE_URL."produtos");
                exit;
               }            
            
        } else {
            header("Location:".BASE_URL."produtos");
            exit;
        }
    }

    public function edit_action($id){
        if(!empty($id)) {

            if(!empty($_POST['nome'])) {
                $m = new Produtos();

                $nome = ($_POST['nome']);
                $descricao = ($_POST['descricao']);
                $venda = str_replace(",",".", $_POST['venda']);
                $custo = str_replace(",",".", $_POST['custo']);
                $id_categoria = ($_POST['id_categoria']);


                $m->update($nome, $descricao, $id, $venda, $custo, $id_categoria);
                header("Location:".BASE_URL."produtos");
                exit;


            } else {
                $_SESSION['formError'] = array('nome');
                header("Location:".BASE_URL."produtos/edit/".$id);
                exit;
            }
        } else {
            header("Location:".BASE_URL."produtos");
            exit;
    }
}
public function del($id){
    if(!empty($id)){
      if($this->m->hasProducts($id) == false){
         $this->m->del($id);
      } 
    } 

    header("Location:".BASE_URL."produtos");
    exit;
}
}
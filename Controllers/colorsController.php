<?php 
class colorsController extends Controller{
	private $user;
    private $arrayInfo;
    private $p;
    private $m;
    private $cat;
    private $color;

	public function __construct(){
		$this->user = new User;
        $this->p = new Products();
        $this->m = new Brands();
        $this->cat = new Categories();
        $this->color = new Colors();

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
          'menuActive' => 'products',
          'errorItems' => array(),
          'info' => array()
        );
	}

	public function index(){
		$this->arrayInfo['list'] = $this->color->getList();
		$this->loadTemplate('colors', $this->arrayInfo);
	}

	public function add(){
		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $this->arrayInfo['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }
		$this->loadTemplate('colors_add', $this->arrayInfo);
	}

	public function edit($id){
       if(!empty($id)){
         $this->arrayInfo['color'] = $this->color->get($id);
         $this->loadTemplate('colors_edit', $this->arrayInfo);
       } else {
       	 header("Location:".BASE_URL."colors");
	     exit;
       }
	}

	public function add_action(){
	   if(!empty($_POST['name_color']) && !empty($_POST['cod_exa'])){
			 $name = ucfirst($_POST['name_color']);
			 $cod_exa = $_POST['cod_exa'];
          	$this->color->add($name, $cod_exa);

	   } else {
	   	$_SESSION['formError'] = array('color', 'cod');
	   	 header("Location:".BASE_URL."colors/add");
	     exit;
	   }

	   header("Location:".BASE_URL."colors");
	   exit;	
	}

	public function edit_action($id){
		if(!empty($id)){
		   if(!empty($_POST['name_color'])  && !empty($_POST['cod_exa'])){
				$name = ucfirst($_POST['name_color']);
				$cod_exa = $_POST['cod_exa'];
	          	$this->color->edit($id, $name, $cod_exa);

		   } else {
		   	$_SESSION['formError'] = array('color', 'cod');
		   	 header("Location:".BASE_URL."colors/add");
		     exit;
		   }

		   	
		}
		header("Location:".BASE_URL."colors");
		exit;
	}

	public function del($id){
		if(!empty($id)){
           $this->color->del($id);  
		}

		header("Location:".BASE_URL."colors");
		exit;
	}
}
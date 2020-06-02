<?php
class kitController extends Controller {
	private $user;
    private $arrayInfo;
    private $kit;
	public function __construct(){
		$this->user = new User;
        $this->kit = new Kit();

		if(!$this->user->isLogged()){
       	  header("Location:".BASE_URL."login");
       	  exit;
       } 

       if(!$this->user->hasPermission('ver_kit')){
          header("Location:".BASE_URL);
       	  exit;
       }

       $this->arrayInfo = array(
          'user' => $this->user,
          'menuActive' => 'kit',
          'errorItems' => array(
			'error' => false,
			'msg' => ''
		  ),
          'info' => array()
        );
	}

	public function index(){
		$this->arrayInfo['success'] = array(
			'msg' => '' 
		);
		
		if(isset($_SESSION['formSuccess']) && count($_SESSION['formSuccess']) > 0){
			$this->arrayInfo['success']['msg'] = $_SESSION['formSuccess']['msg'];
            unset($_SESSION['formSuccess']);
		}

		$this->arrayInfo['list'] = $this->kit->getAll();

		$this->loadTemplate('kit', $this->arrayInfo);
	}

	public function add(){
		$product = new Products();
		$catalog = new Catalog();

		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
			$this->arrayInfo['errorItems']['error'] = $_SESSION['formError']['error'];
			$this->arrayInfo['errorItems']['msg'] = $_SESSION['formError']['msg'];
            unset($_SESSION['formError']);
		}
		
		$this->arrayInfo['catalog'] = $catalog->getList();
		$this->arrayInfo['list_products'] = $product->getAll();

		$this->loadTemplate('kit_add', $this->arrayInfo);
	}

	public function add_action(){


		if(!empty($_POST['kit_name']) && !empty($_POST['products']) && !empty($_POST['price_kit'])  
			&& !empty($_FILES['kit_url']['name']) && !empty($_POST['kit_catalog'])){
			
			//recebe os dados
			$name_kit = addslashes(ucfirst($_POST['kit_name']));
			$cod_reference = (!empty($_POST['kit_reference']))?addslashes($_POST['kit_reference']):0;

			//dados da imagem
			$url = $_FILES['kit_url'];
			$type = $url['type'];
			
			$products = $_POST['products'];
			$price_kit = str_replace(',', '.', $_POST['price_kit']);
			$kit_description = (!empty($_POST['kit_description']))?addslashes($_POST['kit_description']):'';
			$kit_catalog = filter_var($_POST['kit_catalog'], FILTER_SANITIZE_NUMBER_INT);
			$featured = (!empty($_POST['kit_featured']))?1:0;
            $sale = (!empty($_POST['kit_sale']))?1:0;
            $bestseller = (!empty($_POST['kit_bestseller']))?1:0;
            $new_kit = (!empty($_POST['kit_new']))?1:0;

			//array com tipos de imagens aceitas
            $allowed_images = array(
				'image/jpeg',
				'image/jpg',
				'image/png'
			);

			//verifica se o tipo de imagem e permitido
			if(in_array($type, $allowed_images) == false){
				$_SESSION['formError'] = array('error' => true, 'msg' => 'Tipo de imagem não aceita!');
				header("Location:".BASE_URL."kit/add");
				exit;
			}

			//verifica se existe código de refêrencia
			if(!empty($cod_reference)){
				if($this->kit->hasCodReference($cod_reference) == true){
					$_SESSION['formError'] = array('error' => true, 'msg' => 'Código de referência já existe!');
					header("Location:".BASE_URL."kit/add");
					exit;
				} 
			}
			
			$this->kit->add($name_kit, $cod_reference,  $url, $price_kit , $products, 
							$kit_description, $kit_catalog, $featured, $sale, $bestseller, $new_kit);
			
			$_SESSION['formSuccess'] = array('msg' => 'Kit inserido com sucesso!');
			
            header("Location:".BASE_URL."kit");
			exit;

		} else {
			$_SESSION['formError'] = array('error' => true, 'msg' => 'Prencha os campos obrigatorios!\nSelecione no mínimo 2 produtos para o kit!');
			header("Location:".BASE_URL."kit/add");
			exit;
		}
	}

	public function edit($id){
		if(!empty($id)){
			$product = new Products();
			$catalog = new Catalog();
			if(filter_var($id, FILTER_VALIDATE_INT) == false){
				header("Location:".BASE_URL."kit");
				exit;
			}
		
			$this->arrayInfo['info'] = $this->kit->get($id);
			$this->arrayInfo['items'] = $this->kit->getItems($id);
			$this->arrayInfo['list_products'] = $product->getAll();
			$this->arrayInfo['catalog'] = $catalog->getList();

			if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
				$this->arrayInfo['errorItems'] = $_SESSION['formError'];
				unset($_SESSION['formError']);
			} 
          
          	$this->loadTemplate('kit_edit', $this->arrayInfo);
		} else {
			header("Location:".BASE_URL."kit");
			exit;
		}
	}

	public function edit_action($id){
		if(empty($id)){
			header("Location:".BASE_URL."kit");
			exit;
		}

		if(!empty($_POST['kit_name']) && !empty($_POST['products']) && 
			!empty($_POST['price_kit']) && !empty($_POST['kit_catalog'])){
            
			//recebe os dados
			$url = '';
			$name_kit = addslashes(ucfirst($_POST['kit_name']));
			$cod_reference = (!empty($_POST['kit_reference']))?addslashes($_POST['kit_reference']):0;
			$products = $_POST['products'];
			$price_kit = str_replace(',', '.', $_POST['price_kit']);
			$kit_description = (!empty($_POST['kit_description']))?addslashes($_POST['kit_description']):'';
			$kit_catalog = filter_var($_POST['kit_catalog'], FILTER_SANITIZE_NUMBER_INT);
			$featured = (!empty($_POST['kit_featured']))?1:0;
            $sale = (!empty($_POST['kit_sale']))?1:0;
            $bestseller = (!empty($_POST['kit_bestseller']))?1:0;
            $new_kit = (!empty($_POST['kit_new']))?1:0;

			//array com tipos de imagens aceitas
            $allowed_images = array(
				'image/jpeg',
				'image/jpg',
				'image/png'
			);

			//dados da imagem
			if(!empty($_FILES['kit_url']['name']) && isset($_FILES['kit_url']['name'])){

				$url = $_FILES['kit_url'];
				$type = $url['type'];

				//verifica se o tipo de imagem e permitido
				if(in_array($type, $allowed_images) == false){
					$_SESSION['formError'] = array('error' => true, 'msg' => 'Tipo de imagem não aceita!');
					header("Location:".BASE_URL."kit/add");
					exit;
				}

			}

			//verifica se existe código de refêrencia
			if(!empty($cod_reference)){
				if($this->kit->hasCodReferenceUpdate($cod_reference, $id) == true){
					$_SESSION['formError'] = array('error' => true, 'msg' => 'Código de referência já existe!');
					header("Location:".BASE_URL."kit/add");
					exit;
				} 
			}
			
			$this->kit->edit($id, $name_kit, $cod_reference,  $url, $price_kit , $products, 
							$kit_description, $kit_catalog, $featured, $sale, $bestseller, $new_kit);
			
			$_SESSION['formSuccess'] = array('msg' => 'Kit editado com sucesso!');
			
            header("Location:".BASE_URL."kit");
			exit;

		}else {
			$_SESSION['formError'] = array('error' => true, 'msg' => 'Prencha os campos obrigatorios!\nSelecione no mínimo 2 produtos para o kit!');
			header("Location:".BASE_URL."kit/add");
			exit;
		}

		
	}

	public function del($id){

		if(empty($id)){
			header("Location:".BASE_URL."kit");
			exit;
		}
		
		if(filter_var($id, FILTER_VALIDATE_INT) == false){
			header("Location:".BASE_URL."kit");
			exit;
		}

		$this->kit->del($id);

		$_SESSION['formSuccess'] = array('msg' => 'Kit excluido com sucesso!');

		header("Location:".BASE_URL."kit");
		exit;

	}
}
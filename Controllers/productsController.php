<?php
class productsController extends Controller{
	private $user;
    private $arrayInfo;
    private $p;
    private $m;
    private $cat;

	public function __construct(){
		$this->user = new User;
        $this->p = new Products();
        $this->m = new Brands();
        $this->cat = new Categories();

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
		$this->arrayInfo['list'] = $this->p->getAll();
		$this->loadTemplate('products', $this->arrayInfo);
	}

  public function add(){
    $cat = new Categories();
    $brand = new Brands();
    $options = new Options();
    $color = new Colors();
    $catalog = new Catalog();

    $this->arrayInfo['brand_list'] = $brand->getAllMarcas();
    $this->arrayInfo['category_list'] = $cat->getAllCategories();
    $this->arrayInfo['options_list'] = $options->getAll();
    $this->arrayInfo['colors'] = $color->getList();
    $this->arrayInfo['catalog'] = $catalog->getList();
    
    if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $array['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
    }

    $this->loadTemplate('products_add', $this->arrayInfo);
  }

  public function edit($id){
      if(!empty($id)){
        $cat = new Categories();
        $brand = new Brands();
        $options = new Options();
        $color = new Colors();
        $catalog = new Catalog();

        $this->arrayInfo['brand_list'] = $brand->getAllMarcas();
        $this->arrayInfo['category_list'] = $cat->getAllCategories();
        $this->arrayInfo['options_list'] = $options->getAll();
        $this->arrayInfo['colors'] = $color->getList();
        $this->arrayInfo['catalog'] = $catalog->getList();
        if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
                $array['errorItems'] = $_SESSION['formError'];
                unset($_SESSION['formError']);
        }

        $this->arrayInfo['info_product'] = $this->p->get($id);

        $this->loadTemplate('products_edit', $this->arrayInfo);
      }
  }

  public function del($id){
      if(!empty($id)){
        $this->p->del($id);
      }

      header("Location:".BASE_URL."products");
      exit;

  }

  public function edit_action($id){
    if(!empty($id)){
            $id_category = $_POST['id_category'];
            $id_brand = $_POST['id_brand'];
            $reference = $_POST['reference'];
            $catalog = $_POST['catalog'];
            $name = ucfirst($_POST['name']);
            $description = $_POST['description'];
            $stock = $_POST['stock'];
            $price_promotion = (!empty($_POST['price_promotion']))?str_replace(".", "", $_POST['price_promotion']):'00,00';
            $price_promotion = str_replace(",",".", $price_promotion);
            $price_sale = str_replace(".", "", $_POST['price_sale']);
            $price_sale = str_replace(",",".", $price_sale);
            $price_cost = str_replace(".", "", $_POST['price_cost']);
            $price_cost = str_replace(",",".", $price_cost);
            $weight = str_replace(",", ".", $_POST['weight']);//peso
            $width = str_replace(",", ".", $_POST['width']);//largura
            $height = str_replace(",", ".", $_POST['height']);//altura
            $length = str_replace(",", ".", $_POST['length']);//comprimento
            $diameter = str_replace(",", ".", $_POST['diameter']);

            $featured = (!empty($_POST['featured']))?1:0;
            $sale = (!empty($_POST['sale']))?1:0;
            $bestseller = (!empty($_POST['bestseller']))?1:0;
            $new_product = (!empty($_POST['new_product']))?1:0;
            $options = $_POST['options'];
            $colors = (!empty($_POST['color']))?$_POST['color']:array();
            $images = (!empty($_FILES['images']))?$_FILES['images']:array();

            $c_images = (!empty($_POST['c_images']))?$_POST['c_images']:array();

            if(!empty($id) && !empty($id_category) && !empty($catalog) && !empty($id_brand) && !empty($stock) && !empty($price_sale) && !empty($price_cost) && !empty($weight) && !empty($width) && !empty($height) && !empty($length) && !empty($diameter)){

                $this->p->edit($id_category, $id_brand, $reference, $catalog, $name, $description, $stock, $price_sale, $price_promotion, 
                  $price_cost, $weight, $width, $height, $length, $diameter, $featured, $sale, $bestseller, $new_product, $options, $colors, $images, $c_images, $id);

            } else {
              $_SESSION['formError'] = array('id_category', 'id_brand', 'catalog', 'name', 'stock', 'price', 'price_vend', 'weight', 'width', 'height', 'length', 'diameter');
              header("Location:".BASE_URL."products/edit/".$id);
              exit;
            }
           

           header("Location:".BASE_URL."products");
           exit;
       
    } else {
      $_SESSION['formError'] = array();
      header("Location:".BASE_URL."products");
      exit;
    }
  }

  public function add_action(){
    if(!empty($_POST['name'])){
            $id_category = $_POST['id_category'];
            $id_brand = $_POST['id_brand'];
            $reference = $_POST['reference'];
            $catalog = $_POST['catalog'];
            $name = ucfirst($_POST['name']);
            $description = $_POST['description'];
            $stock = $_POST['stock'];
            $price_promotion = (!empty($_POST['price_promotion']))?str_replace(".", "", $_POST['price_promotion']):'00,00';
            $price_promotion = str_replace(",",".", $price_promotion);
            $price_sale = str_replace(".", "", $_POST['price_sale']);
            $price_sale = str_replace(",",".", $price_sale);
            $price_cost = str_replace(".", "", $_POST['price_cost']);
            $price_cost = str_replace(",",".", $price_cost);
            $weight = str_replace(",", ".", $_POST['weight']);//peso
            $width = str_replace(",", ".", $_POST['width']);//largura
            $height = str_replace(",", ".", $_POST['height']);//altura
            $length = str_replace(",", ".", $_POST['length']);//comprimento
            $diameter = str_replace(",", ".", $_POST['diameter']);

            $featured = (!empty($_POST['featured']))?1:0;
            $sale = (!empty($_POST['sale']))?1:0;
            $bestseller = (!empty($_POST['bestseller']))?1:0;
            $new_product = (!empty($_POST['new_product']))?1:0;
            $colors = (!empty($_POST['color']))?$_POST['color']:array();
            $options = $_POST['options'];
            $images = (!empty($_FILES['images']))?$_FILES['images']:array();

            if(!empty($id_category) && !empty($catalog) && !empty($id_brand) && !empty($stock) && !empty($price_sale) && !empty($price_cost) && !empty($weight) && !empty($width) && !empty($height) && !empty($length) && !empty($diameter)){

                $this->p->add($id_category, $id_brand, $reference, $catalog, $name, $description, $stock, $price_sale, $price_promotion, 
                $price_cost, $weight, $width, $height, $length, $diameter, $featured, $sale, $bestseller, $new_product, $colors, $options, $images);

            } else {
              $_SESSION['formError'] = array('id_category', 'id_brand', 'catalog', 'name', 'stock', 'price', 'price_vend', 'weight', 'width', 'height', 'length', 'diameter');
              header("Location:".BASE_URL."products/add");
              exit;
            }
           

           header("Location:".BASE_URL."products");
           exit;
       
    } else {
      $_SESSION['formError'] = array('name');
      header("Location:".BASE_URL."products/add");
      exit;
    }
  }

}
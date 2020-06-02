<?php 
class categoriesController extends Controller{

    private $user;
    private $cat;

	public function __construct(){
       $this->user = new User();
       $this->cat = new Categories();
       

       if(!$this->user->isLogged()){
       	  header("Location:".BASE_URL."login");
       	  exit;
       } 

       if(!$this->user->hasPermission('ver_categorias')){
          header("Location:".BASE_URL);
       	  exit;
       }
       
	}

	public function index(){
		
        $array = array(
       	  'user' => $this->user,
       	  'menuActive' => 'categories',
       	  'list' => array()
           
        );

        $array['list'] = $this->cat->getAllCategories();
  
        
      

		$this->loadTemplate('categories', $array);
	}

	public function add(){
		 $array = array(
       	  'user' => $this->user,
       	  'errorItems' => array(),
       	  'menuActive' => 'categories',
       	  'list' => array()
           
        );

        $array['list'] = $this->cat->getAllCategories();

        if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $array['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }

		$this->loadTemplate('categories_add', $array);
	}

	public function edit($id){
		if(!empty($id)){
		   $array = array(
       	    'user' => $this->user,
       	    'errorItems' => array(),
       	    'menuActive' => 'categories',
       	    'list' => array()
           
          );

          $array['list'] = $this->cat->getAllCategories();
          $array['value_cat'] = $this->cat->get($id);
          $array['id_cat'] = $id;

            if(count($array['value_cat']) > 0){

                if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
                   $array['errorItems'] = $_SESSION['formError'];
                   unset($_SESSION['formError']);
                }

		        $this->loadTemplate('categories_edit', $array);

		    } else {
		   	    header("Location:".BASE_URL."categories");
		        exit;
		    }

	    } else{
	       header("Location:".BASE_URL."categories");
		   exit;
	    }
	}

	public function add_action(){
		
		if(!empty($_POST['name'])){

          $id_sub = "";

		  if(!empty($_POST['sub_cat'])){
            $id_sub = $_POST['sub_cat'];
		  }

           $name_cat = ucfirst($_POST['name']);

           $this->cat->addCategorie($name_cat, $id_sub);

           header("Location:".BASE_URL."categories");
		   exit;

		} else {
          $_SESSION['formError'] = array('name');

		  header("Location:".BASE_URL."categories/add");
		  exit;
		}


	}

	public function edit_action($id){

		if(!empty($id)){

	        if(!empty($_POST['name'])){

	          $id_sub = "";

			  if(!empty($_POST['sub_cat'])){
	            $id_sub = $_POST['sub_cat'];
			  }

	           $name_cat = ucfirst($_POST['name']);

	           $this->cat->update($name_cat, $id_sub, $id);

	           header("Location:".BASE_URL."categories");
			   exit;

			} else {
	          $_SESSION['formError'] = array('name');

			  header("Location:".BASE_URL."categories/edit".$id);
			  exit;
			}
	    } else {
          header("Location:".BASE_URL."categories");
		  exit;
	    }


	}

	public function del($id){
		if(!empty($id)){
           
           $cats = $this->cat->scanCategory($id);
           
            if($this->cat->hasProducts($cats) == false){
                $this->cat->deleteCategories($cats);
            }

		}

		header("Location:".BASE_URL."categories");
	}

}
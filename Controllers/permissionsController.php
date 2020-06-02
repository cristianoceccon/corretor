<?php
class permissionsController extends Controller {
    private $user;
    public function __construct(){
    	$this->user = new User();

    	if(!$this->user->isLogged()){
    		header("Location: ".BASE_URL."login");
    		exit;
    	}

      if(!$this->user->hasPermission('ver_permissoes')){
          header("Location: ".BASE_URL."");
          exit;
      }

    }

	public function index() {
		$array = array(
          'user' => $this->user,
          'menuActive' => 'permissions',
          'list' => array()
        ); 
		$p = new Permission();
        $array['list'] = $p->getAllGroups();
		$this->loadTemplate('permissions', $array);
	}

    public function del($id_group){
       $p = new Permission();

       $p->deleteGroup($id_group);

       header("Location:".BASE_URL."permissions");
       exit;
    }

    public function add(){
        $array = array(
          'user' => $this->user,
          'errorItems' => array(),
          'menuActive' => 'permissions',
        );

        $p = new Permission();
        $items_group = new ItemsGroup();

        $array['permissions_item'] = $p->getAllItems();
        $array['items_group'] = $items_group->getList();

        if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $array['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }

        $this->loadTemplate('permissions_add', $array);
    }

    public function items(){
        $array = array(
          'user' => $this->user,
          'list' => array(),
          'menuActive' => 'permissions',
        ); 
        $p = new Permission();
        $array['list'] = $p->getAllItems();
        $this->loadTemplate('permissions_items', $array);
    }

    public function items_add(){
        $array = array(
          'user' => $this->user,
          'errorItems' => array(),
          'menuActive' => 'permissions',
        ); 
        $p = new Permission();
        $items_group = new ItemsGroup();

        $array['items_group'] = $items_group->getList();

        if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $array['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }

        $this->loadTemplate('permissions_items_add', $array);
    }


    public function add_item_action(){

        if(!empty($_POST['item_name']) && !empty($_POST['id_items_group'])){

            $p = new Permission();
            $item_name = addslashes(filter_var($_POST['item_name'], FILTER_SANITIZE_STRING));
            $id_items_group = filter_var($_POST['id_items_group'], FILTER_SANITIZE_NUMBER_INT);
            $p->addItemName($item_name, $id_items_group);
            header("Location:".BASE_URL."permissions/items"); 
            exit;
            
        } else {
            
           $_SESSION['formError'] = array('name');

           header("Location:".BASE_URL."permissions/items_add"); 
           exit;
        }
    }

    public function edit_item_action($id){
        $p = new Permission();
        if(!empty($id) && !empty($_POST['item_name']) && !empty($_POST['id_items_group'])){
            $item_name = addslashes(filter_var($_POST['item_name'], FILTER_SANITIZE_STRING));
            $id_items_group = filter_var($_POST['id_items_group'], FILTER_SANITIZE_NUMBER_INT);
            $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
            $p->editItemName($item_name, $id, $id_items_group);
            header("Location:".BASE_URL."permissions/items"); 
            exit;
        } else {
            
           header("Location:".BASE_URL."permissions/items_edit/".$id); 
           exit;
        }
    }

    public function items_del($id){
        if(empty($id)){
            header("Location:".BASE_URL."permissions/items"); 
            exit;
        }

        if(filter_var($id, FILTER_VALIDATE_INT) == false){
            header("Location:".BASE_URL."permissions/items"); 
            exit;
        }

        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $p = new Permission();
        $p->deleteItems($id);
        header("Location:".BASE_URL."permissions/items"); 
        exit;
        
    }

    public function items_edit($id){
       $array = array(
          'user' => $this->user,
          'errorItems' => array(),
          'menuActive' => 'permissions',
        ); 
        $p = new Permission();
        $items_group = new ItemsGroup();

        $array['info'] = $p->getPermissionItem($id);
        $array['permissions_id_item'] = $id;
        $array['items_group'] = $items_group->getList();
        $this->loadTemplate('permissions_edit_item', $array);
    }

    public function add_action(){
        $p = new Permission();

        if(!empty($_POST['name'])){
            $name = ucfirst($_POST['name']);

            $id = $p->addGroup($name);// adiciona o grupo de permissão
          
            if(isset($_POST['items']) && count($_POST['items']) > 0){
                $items = $_POST['items'];

                foreach($items as $item) {
                  $p->linkItemToGroup($item, $id);
                } 
            }

          header("Location:".BASE_URL."permissions");
          exit;

        } else {
            $_SESSION['formError'] = array('name');
            header("Location:".BASE_URL."permissions/add");
        }
    }
    

    public function edit_action($id){

       $p = new Permission();

        if(!empty($_POST['name'])){
            $name = ucfirst($_POST['name']);

            $p->editName($id, $name);
            $p->clearLinks($id);
          
            if(isset($_POST['items']) && count($_POST['items']) > 0){
                $items = $_POST['items'];

                foreach($items as $item) {
                  $p->linkItemToGroup($item, $id);
                } 
            }

          header("Location:".BASE_URL."permissions");
          exit;

        } else {
            $_SESSION['formError'] = array('name');
            header("Location:".BASE_URL."permissions/edit/".$id);
        }


    }

    public function edit($id){
        if(!empty($id)){
           $array = array(
              'user' => $this->user,
              'errorItems' => array(),
              'menuActive' => 'permissions',
            );

            $p = new Permission();
            $items_group = new ItemsGroup();

            $array['permissions_item'] = $p->getAllItems();
            $array['permissions_id'] = $id;
            $array['permissions_name_group'] = $p->getPermissionGroupName($id);
            $array['permissions_link_group'] = $p->getPermission($id);
            $array['items_group'] = $items_group->getList();

            if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
                $array['errorItems'] = $_SESSION['formError'];
                unset($_SESSION['formError']);
            }

            $this->loadTemplate('permissions_edit', $array); 
        } else {
          header("Location:".BASE_URL."permissions");
          exit; 
        }
    }

}
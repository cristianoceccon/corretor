<?php 
class slidersController extends Controller {
    private $user;
    //private $cat;

    public function __construct(){
        $this->user = new User();

        if(!$this->user->isLogged()){
            header("Location:".BASE_URL."login");
            exit;
        } 

        if(!$this->user->hasPermission('ver_slide')){
            header("Location:".BASE_URL);
            exit;
        }
    }

    public function index(){
        $slide = new Sliders();
        $array = array(
            'user' => $this->user,
            'menuActive' => 'slide',
            'list' => array()
            
        );

       

        $array['list'] = $slide->getAll();



        $this->loadTemplate('sliders', $array);
    }

    public function add(){
        $cat = new Categories();
        $array = array(
            'user' => $this->user,
            'menuActive' => 'slide',
            'errorItems' => array(),
            'img_invalid' => '',
            'dados' => array(
                'locality' => '',
                'id_category' => '',
                'link' => '',
            )
        );

        if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $array['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }
        
        if(isset($_SESSION['img_invalid']) && count($_SESSION['img_invalid']) > 0){
            $array['img_invalid'] = $_SESSION['img_invalid'];
            unset($_SESSION['img_invalid']);
        }

        if(isset($_SESSION['dados']) && count($_SESSION['dados']) > 0){
            $array['dados']['locality'] = $_SESSION['dados']['locality'];
            $array['dados']['id_category'] = $_SESSION['dados']['id_category'];
            $array['dados']['link'] = $_SESSION['dados']['link'];
            unset($_SESSION['dados']);
        }

        

        $array['category_list'] = $cat->getAllCategories();

        $this->loadTemplate('add_slide', $array);
    }

    public function edit($id){
        if(empty($id)){
            header("Location:".BASE_URL);
            exit;
        }
        
        $cat = new Categories();
        $slide = new Sliders();
        $array = array(
            'user' => $this->user,
            'menuActive' => 'slide',
            'errorItems' => array(),
            'img_invalid' => '',
            'info' => array(),
            'dados' => array(
                'locality' => '',
                'id_category' => '',
                'link' => '',
            )
        );

        $array['info'] = $slide->get(intval($id));
        $array['category_list'] = $cat->getAllCategories();

        if(empty($array['info'])){
            header("Location:".BASE_URL);
            exit;
        }

        $this->loadTemplate('slider_edit', $array);
    }

    public function add_action(){
        

        if(!empty($_POST['locality']) && !empty($_FILES['url']['type'])){
            $slide = new Sliders();
            //tipo de imagens aceitas
            $allowed_images = array(
                'image/jpeg',
                'image/jpg',
                'image/png'
             );

            $locality = intval($_POST['locality']);
            $id_category = (!empty($_POST['id_category']))?intval($_POST['id_category']):0;
            $link = filter_var($_POST['link'], FILTER_SANITIZE_URL);
            $image = $_FILES['url'];

            $tmp_name = $image['tmp_name'][0];
            $name = $image['name'][0];
            $type = $image['type'][0];
            

            if(in_array($type, $allowed_images)){
                $slide->add($locality, $id_category, $link, $tmp_name, $name, $type);
                header("Location:".BASE_URL."sliders");
                exit;
            } else {
                $_SESSION['dados'] = array('locality' => $locality, 'id_category' => $id_category, 'link' => $link);
                $_SESSION['img_invalid'] = 'Tipo de imagem inserida não é válido!';
                header("Location:".BASE_URL."sliders/add");
                exit;
            }
            
            
        } else {
            header("Location:".BASE_URL);
            exit;
        }
         
    
     

    }

    public function edit_action($id){
        if(empty($id)){
            header("Location:".BASE_URL);
            exit;
        }

        if(!empty($_POST['locality']) && !empty($_POST['status'])){
            $slide = new Sliders();
            //tipo de imagens aceitas
            $allowed_images = array(
                'image/jpeg',
                'image/jpg',
                'image/png'
            );

            $locality = intval($_POST['locality']);
            $status = $_POST['status'];
            $id_category = (!empty($_POST['id_category']))?intval($_POST['id_category']):0;
            $link = filter_var($_POST['link'], FILTER_SANITIZE_URL);
            $image = (!empty($_FILES['url']['type'][0]))?$_FILES['url']:array();
            
            if(!empty($image)){
                $type = $image['type'][0];
                
              
                if(in_array($type, $allowed_images)){

                } else {
                    $_SESSION['dados'] = array('locality' => $locality, 'id_category' => $id_category, 'link' => $link);
                    $_SESSION['img_invalid'] = 'Tipo de imagem inserida não é válido!';
                    header("Location:".BASE_URL."sliders/edit/".$id);
                    exit;
                }

            }
            
            $slide->edit($id, $locality, $id_category, $link, $status, $image);
            header("Location:".BASE_URL."sliders");
            exit;
            

            
            
            
        } else {
            header("Location:".BASE_URL);
            exit;
        }
         
    
     

    }

    public function del($id, $url){
        if(!empty($id) && !empty($url)){

            $slide = new Sliders();

            $slide->del(intval($id), $url);
  
        }

       header("Location:".BASE_URL."sliders");
       exit;
    }
}
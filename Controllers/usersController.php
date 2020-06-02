<?php 
class usersController extends Controller {
    private $user;
    
    public function __construct(){
        $this->user = new User();

        if(!$this->user->isLogged()){
            header("Location:".BASE_URL."login");
            exit;
        } 

        if(!$this->user->hasPermission('ver_usuarios')){
            header("Location:".BASE_URL);
            exit;
        }
    }

    public function index(){
        $dados = array();
        $dados['user'] = $this->user;
        $dados['menuActive'] = 'usuarios';
        $dados['list'] = $dados['user']->getList();
        $dados['success'] = '';

        if(!empty($_SESSION['success'])){
            $dados['success'] = $_SESSION['success'];
            unset($_SESSION['success']);
        }

        if(!empty($_SESSION['dados'])){
            unset($_SESSION['dados']);
        }

        $this->loadTemplate('users', $dados);
    }

    public function add(){
        if(!$this->user->hasPermission('add_usuarios')){
            header("Location:".BASE_URL);
            exit;
        }

        $catalog = new Catalog();
        $permission = new Permission();
        $sellerPayment = new SellerPayment();
        
        $dados = array();
        $dados['user'] = $this->user;
        $dados['menuActive'] = 'usuarios';
        $dados['errorItems'] = array();
        $dados['catalog'] = $catalog->getList();
        $dados['permissions'] = $permission->getAllGroups();
        $dados['payments'] = $sellerPayment->getList();
        $dados['dados'] = array(
            'name' => '',
            'register' => '',
            'data_nasc' => '',
            'permission' => '',
            'salesman' => '',
            'catalog' => '',
            'email' => '',
        );

        if(!empty($_SESSION['dados'])){
            $dados['dados']['register'] = $_SESSION['dados']['register'];
            $dados['dados']['data_nasc'] = $_SESSION['dados']['data_nasc'];
            $dados['dados']['name'] = $_SESSION['dados']['name'];
            $dados['dados']['permission'] = $_SESSION['dados']['permission'];
            $dados['dados']['salesman'] = $_SESSION['dados']['salesman'];
            $dados['dados']['catalog'] = $_SESSION['dados']['catalog'];
            $dados['dados']['email'] = $_SESSION['dados']['email'];
            unset($_SESSION['dados']);

        }

        if(!empty($_SESSION['errorItems'])){
            $dados['errorItems'] =  $_SESSION['errorItems'];
            unset($_SESSION['errorItems']);
        }

        $this->loadTemplate('user_add', $dados);
    }

    public function add_action(){
        if(!empty($_POST['data_nasc']) && !empty($_POST['register']) && !empty($_POST['name']) && !empty($_POST['permission']) && 
        !empty($_POST['salesman']) && !empty($_POST['catalog']) && !empty($_POST['email']) && 
        !empty($_POST['password']) && !empty($_POST['c_password'])){
            
            $sellerPayment = new SellerPayment();
            $register = addslashes($_POST['register']);
            $name = addslashes($_POST['name']);
            $data_nasc = str_replace('/', '-', $_POST['data_nasc']);
            $data_nasc = date("Y-m-d", strtotime($data_nasc));
            $permission = addslashes($_POST['permission']);
            $salesman = addslashes($_POST['salesman']);
            $catalog = addslashes($_POST['catalog']);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $pass = addslashes($_POST['password']);
            $c_pass = addslashes($_POST['c_password']);
            $payment_type = (!empty($_POST['payment_type']))?$_POST['payment_type']:array();

            $_SESSION['dados'] = array(

                'name' => $name,
                'register' => $register,
                'data_nasc' => $_POST['data_nasc'],
                'permission' => $permission,
                'salesman' => $salesman,
                'catalog' => $catalog,
                'email' => $email,

            );

            //verifica se as senhas são iguais
            if($pass !== $c_pass){
                $_SESSION['errorItems'] = array('v_password');
                header("Location:".BASE_URL."users/add");
                exit;
            }

            //verifica se as senhas tem 6 caracteres
            if(strlen($pass) < 6 && strlen($c_pass) < 6){
                $_SESSION['errorItems'] = array('strlen_pass');
                header("Location:".BASE_URL."users/add");
                exit;
            }

            //verifica se o email é válido
            if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
                $_SESSION['errorItems'] = array('email_invalid');
                header("Location:".BASE_URL."users/add");
                exit;
            }

            //verifica se email já existe
            if($this->user->emailVerify($email)){
                $_SESSION['errorItems'] = array('email_existe');
                header("Location:".BASE_URL."users/add");
                exit;
            }

            //verifica se cpf já existe
            if($this->user->registerVerify($register)){
                $_SESSION['errorItems'] = array('register_existe');
                header("Location:".BASE_URL."users/add");
                exit;
            }

            $id_user = $this->user->add($name, $permission, $salesman, $catalog, $email, $pass, $register, $data_nasc);

            
                foreach($payment_type as $key => $item){
                    $sellerPayment->addUserPayments(intval($key), intval($id_user), intval($item));
                }
            

            $_SESSION['success'] = 'Usuário cadastrado com sucesso!';
            header("Location:".BASE_URL."users");
            exit;






        } else {
            $_SESSION['dados'] = array(

                'name' => $_POST['name'],
                'register' => $_POST['register'],
                'data_nasc' => $_POST['data_nasc'],
                'permission' => $_POST['permission'],
                'salesman' => $_POST['salesman'],
                'catalog' => $_POST['catalog'],
                'email' => $_POST['email']

            );

            $_SESSION['errorItems'] = array('data_nasc', 'register', 'name', 'permission', 'salesman', 'catalog', 'email', 'password', 'c_password');

            header("Location:".BASE_URL."users/add");
            exit;
        }
         
    }

    public function edit($id){
        if(!$this->user->hasPermission('editar_usuarios')){
            header("Location:".BASE_URL);
            exit;
        }

        if(empty($id)){
            header("Location:".BASE_URL);
            exit;
        }

        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        $catalog = new Catalog();
        $permission = new Permission();
        $sellerPayment = new SellerPayment();

        $dados = array();
        $dados['user'] = $this->user;
        $dados['menuActive'] = 'usuarios';
        $dados['errorItems'] = array();
        $dados['catalog'] = $catalog->getList();
        $dados['permissions'] = $permission->getAllGroups();
        $dados['payments'] = $sellerPayment->getList();
        $dados['payments_user'] = $sellerPayment->getInstallmentsByIdUser($id);
        
        $dados['dados'] = array(
            'permission' => '',
            'salesman' => '',
            'catalog' => '',
            'status' => ''
        );
        

        $dados['info'] = $this->user->getUserById($id);

        if(empty($dados['info'])){
            header("Location:".BASE_URL);
            exit;
        }

        if(!empty($_SESSION['errorItems'])){
            $dados['errorItems'] =  $_SESSION['errorItems'];
            unset($_SESSION['errorItems']);
        }

        if(!empty($_SESSION['dados'])){
            $dados['dados']['permission'] = $_SESSION['dados']['permission'];
            $dados['dados']['salesman'] = $_SESSION['dados']['salesman'];
            $dados['dados']['catalog'] = $_SESSION['dados']['catalog'];
            $dados['dados']['status'] = $_SESSION['dados']['status'];
            unset($_SESSION['dados']);

        }

        $this->loadTemplate('user_edit', $dados);
    }

    public function edit_action($id){
        if(empty($id)){
            header("Location:".BASE_URL);
            exit;
        }

        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        
        if(!empty($_POST['permission']) && !empty($_POST['salesman']) && !empty($_POST['catalog']) && 
        !empty($_POST['status'])){

            $sellerPayment = new SellerPayment();

            $permission = addslashes($_POST['permission']);
            $salesman = addslashes($_POST['salesman']);
            $catalog = addslashes($_POST['catalog']);
            $status = addslashes($_POST['status']);
            $payment_type = (!empty($_POST['payment_type']))?$_POST['payment_type']:array();

            $_SESSION['dados'] = array(
                'permission' => $permission,
                'salesman' => $salesman,
                'catalog' => $catalog,
                'status' => $status
            );

            $sellerPayment->delPaymentsUser($id);

            foreach($payment_type as $key => $item){
                $sellerPayment->addUserPayments(intval($key), $id, intval($item));
            }

            $this->user->edit($status, $permission, $salesman, $catalog, $id);


            $_SESSION['success'] = 'Dados alterados com sucesso!';
            header("Location:".BASE_URL."users");
            exit;



        } else {
            $_SESSION['dados'] = array(
                'permission' => $_POST['permission'],
                'salesman' => $_POST['salesman'],
                'catalog' => $_POST['catalog'],
                'status' => $_POST['status']

            );

            $_SESSION['errorItems'] = array('permission', 'salesman', 'catalog', 'status');

            header("Location:".BASE_URL."users/edit/".$id);
            exit;
        }
        
    }
}
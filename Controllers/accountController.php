<?php 
class accountController extends Controller {
    private $user;

    public function __construct(){
        $this->user = new User();

        if(!$this->user->isLogged()){
            header("Location:".BASE_URL."login");
            exit;
        }
    }

    public function index(){
        $customerAddress = new Customeraddress();
        $array = array();
        $array['msg'] = '';
        $array['data'] = array(
            'name' => '',
            'n_pass' => '',
            'c_pass' => ''
        );

        $array['error'] = array(
            'name' => '',
            'n_pass' => '',
            'c_pass' => ''
        );

        $id = $this->user->getId();
        $array['user'] = $this->user;
        $array['menuActive'] = '';
        $array['info'] = $this->user->getUserById($id);
        $array['address'] = $customerAddress->getList($id);

        $array['data']['name'] = $array['info']['name'];
        
        if(!empty($_SESSION['dataAccount'])){
            $array['data']['name'] = $_SESSION['dataAccount']['name'];
            $array['data']['n_pass'] = $_SESSION['dataAccount']['n_pass'];
            $array['data']['c_pass'] = $_SESSION['dataAccount']['c_pass'];
            unset($_SESSION['dataAccount']);
        }

        if(!empty($_SESSION['error'])){
            $array['error']['name'] = $_SESSION['error']['name'];
            $array['error']['n_pass'] = $_SESSION['error']['n_pass'];
            $array['error']['c_pass'] = $_SESSION['error']['c_pass'];
            unset($_SESSION['error']);
        }

        if(!empty($_SESSION['msg'])){
            $array['msg'] = $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
                

        $this->loadTemplate('accountUser', $array);
    }

    public function editAccount(){
        $_SESSION['error'] = array(
            'name' => '',
            'n_pass' => '',
            'c_pass' => ''
        );

        if(!empty($_POST['name'])){
            $name = addslashes($_POST['name']);
            $n_pass = addslashes($_POST['new_pass']);
            $c_pass = addslashes($_POST['c_pass']);
            $id = $this->user->getId();

            $_SESSION['dataAccount'] = array(
                'name' => $name,
                'n_pass' => $n_pass,
                'c_pass' => $c_pass
            );

            //edita o nome
            $this->user->editAccount($name, $id);

            if(!empty($n_pass) && !empty($c_pass)){

                if(strlen($n_pass) < 6){
                    $_SESSION['error']['n_pass'] = 'A senha precisa ter no minímo 6 caracteres!';
                    header("Location:".BASE_URL."account");
                    exit;
                }

                if(strlen($c_pass) < 6){
                    $_SESSION['error']['c_pass'] = 'A senha precisa ter no minímo 6 caracteres!';
                    header("Location:".BASE_URL."account");
                    exit;
                }

                if($n_pass !== $c_pass){
                    $_SESSION['error']['n_pass'] = 'As senhas precisam ser idênticas!';
                    $_SESSION['error']['c_pass'] = 'As senhas precisam ser idênticas!';
                    header("Location:".BASE_URL."account");
                    exit;
                }

                //edita a senha
                $this->user->editPassword($n_pass, $id);      

            }

            $_SESSION['msg'] = 'Dados alterados com sucesso!';
            
        } else {
            $_SESSION['error']['name'] = 'Preencha este campo com seu nome completo!';
            header("Location:".BASE_URL."account");
            exit;
        }

        header("Location:".BASE_URL."account");
        exit;
    }
}
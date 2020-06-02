<?php
class homeController extends Controller {
    private $user;
    public function __construct(){
    	$this->user = new User();

    	if(!$this->user->isLogged()){
    		header("Location:".BASE_URL."login");
    		exit;
    	}

    }

	public function index() {
		$cli = new Clientes();

		$array = array(
          'user' => $this->user,
          'menuActive' => 'dashboard'
        );

		$array['nome'] = 124;

		$exemplo = new Exemplo();

		$this->loadTemplate('home', $array);
	}

}
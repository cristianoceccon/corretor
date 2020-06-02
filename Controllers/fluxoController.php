<?php 
class fluxoController extends Controller {
    
    private $user;
    private $arrayInfo;
    private $m;

	public function __construct(){
       $this->user = new User();
       $this->m = new fluxo();
       

       if(!$this->user->isLogged()){
       	  header("Location:".BASE_URL."login");
       	  exit;
       } 

       if(!$this->user->hasPermission('ver_paginas')){
          header("Location:".BASE_URL);
       	  exit;
       }

       $this->arrayInfo = array(
          'user' => $this->user,
          'menuActive' => 'fluxo',
          'errorItems' => array(),
          'info' => array()
        );
       
	}

	public function index(){
        $fluxo = new fluxo();
		
		$this->arrayInfo['list'] = $fluxo->getAll();
		        
		$this->loadTemplate('fluxo', $this->arrayInfo);
    }
    

	public function add(){
		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $this->arrayInfo['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }
		$this->loadTemplate('fluxo_add', $this->arrayInfo);
	}


	public function del(){
		if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
            $this->arrayInfo['errorItems'] = $_SESSION['formError'];
            unset($_SESSION['formError']);
        }
		$this->loadTemplate('fluxo_del', $this->arrayInfo);
	}

	

	public function add_action(){

		if(!empty($_POST['descricao'])){
			$descricao = ucfirst($_POST['descricao']);
			$valorentrada = ucfirst($_POST['valorentrada']);
			$saldo = ucfirst($_POST['saldo']);
			$this->m->addfluxo($descricao, $valorentrada, $saldo);
			header("Location:".BASE_URL."fluxo");
			exit;
		 } else {
			 $_SESSION['formError'] = array('fluxo');
			 header("Location:".BASE_URL."fluxo/add");
			 exit;
		 }
	 }

	 public function del_action(){
		if(!empty($_POST['descricao'])){
			$descricao = ucfirst($_POST['descricao']);
			$valorsaida = ucfirst($_POST['valorsaida']);
			$saldo = ucfirst($_POST['saldo']);
			$this->m->delfluxo($descricao, $valorsaida, $saldo);
			header("Location:".BASE_URL."fluxo");
			exit;
		 } else {
			 $_SESSION['formError'] = array('fluxo');
			 header("Location:".BASE_URL."fluxo/del");
			 exit;
		 }
	 }




}
/*
	public function edit($id){
		if(!empty($id)){
		    if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){
                $this->arrayInfo['errorItems'] = $_SESSION['formError'];
                unset($_SESSION['formError']);
            }
            $this->arrayInfo['info'] = $this->m->get($id);
            $this->loadTemplate('brands_edit', $this->arrayInfo);
		} else {
		    header("Location:".BASE_URL."brands");
		    exit;
		}
	}

	public function edit_action($id){
		if(!empty($id)){
		    if(!empty($_POST['brand'])){
		    $brand = ucfirst($_POST['brand']);
            $this->m->update($brand, $id);
            header("Location:".BASE_URL."brands");
		    exit;
		   } else {
		   	  $_SESSION['formError'] = array('brand');
		   	  header("Location:".BASE_URL."brands/edit/".$id);
		  exit;
		   }
		} else {
		  header("Location:".BASE_URL."brands");
		  exit;
		}
	}

	public function del($id){
		if(!empty($id)){
          if($this->m->hasProducts($id) == false){
             $this->m->del($id);
          } 
		} 

		header("Location:".BASE_URL."brands");
		exit;
	}

}
*/
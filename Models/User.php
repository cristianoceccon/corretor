<?php 
class User extends Model {
    private $uid;
    private $permission;
    private $username;
    private $isadmin;
	public function isLogged() {
		if(!empty($_SESSION['token'])){
          $token = $_SESSION['token'];

          $sql = "SELECT id, id_permission, name, admin FROM users WHERE token = :token AND admin = 1";
          $sql = $this->db->prepare($sql);
          $sql->bindValue(':token', $token);
          $sql->execute();
            if($sql->rowCount() > 0){
              $p = new Permission();
              $data = $sql->fetch();
			  $this->uid = $data['id'];
              $this->username = $data['name'];
              $this->isadmin = $data['admin'];
              $this->permission = $p->getPermission($data['id_permission']);
              return true;
            }
		}

		return false;
	}

	public function getUserName(){
		return $this->username;
	}
	

	public function isAdmin(){
		if($this->isadmin == '1'){
			return true;
		} else {
			return false;
		}
	}


	public function hasPermission($permission_slug){
		if(in_array($permission_slug, $this->permission)){
			return true;
		} else {
			return false;
		}

	}

	public function validateLogin($user, $pass){
		$p = array('.','-');

		if(is_numeric(str_replace($p, '', $user))){
			$sql = "SELECT * FROM users WHERE register = :register AND password = :password AND admin = 1 AND status = 'ATIVO'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':register', $user);
			$sql->bindValue(':password', md5($pass));
			$sql->execute();
		} else {
			$sql = "SELECT * FROM users WHERE email = :email AND password = :password AND admin = 1 AND status = 'ATIVO'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':email', $user);
			$sql->bindValue(':password', md5($pass));
			$sql->execute();
		}
	
		  if($sql->rowCount() > 0){
		  	$data = $sql->fetch();

		  	$token = md5(time().rand(0,999).$data['id'].time());

		  	$sql = "UPDATE users SET token = :token WHERE id = :id";
		  	$sql = $this->db->prepare($sql);
		  	$sql->bindValue(':token', $token);
		  	$sql->bindValue(':id', $data['id']);
		  	$sql->execute();

			  $_SESSION['token'] = $token;
			  $_SESSION['id_user'] = $data['id'];
			  $_SESSION['permi_salesman'] = $data['salesman'];
			  $_SESSION['permi_catalog'] = $data['catalog'];
			  $_SESSION['isadmin'] = $data['admin'];
		  	
		  	return true;
		  }

		return false;
	}

	public function getId(){
		return $this->uid;
	}

	public function getUserById($id){
		$array = array();
			$sql = "SELECT * FROM users WHERE id = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id', $id);
			$sql->execute();

				if($sql->rowCount() > 0){
					$array = $sql->fetch(\PDO::FETCH_ASSOC);
				}

		return $array;


	}

	
	public function getList(){
		$array = array();

		$sql = "SELECT * FROM users WHERE admin = '1'";
		$sql = $this->db->query($sql);

			if($sql->rowCount() > 0){
				$array = $sql->fetchAll(\PDO::FETCH_ASSOC);
			}


		return $array;
	}

	public function emailVerify($email, $reset = false){
		
		if($reset == false){
			if(!empty($email)){
				$sql = "SELECT COUNT(*) as total FROM users WHERE email = :email";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':email', $email);
				$sql->execute();
				$total = $sql->fetch();
					if($total['total'] > 0){
						return true;
					} else {
						return false;
					}
			}
		} else {
			$array = array();
			$sql = "SELECT id, email FROM users WHERE email = :email";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':email', $email);
				$sql->execute();
				
					if($sql->rowCount() > 0){
						$array = $sql->fetch();
					} 

				return $array;
		}

		
	}

	public function registerVerify($register){// verifica se cpf ou cnpj já existem na base de dados
		
			$sql = "SELECT * FROM users WHERE register = :register";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':register', $register);
			$sql->execute();
		   
				if($sql->rowCount() > 0){
					return true;
				} else {
					return false;
				}
		
	}

	public function add($name, $permission, $salesman, $catalog, $email, $pass, $register, $data_nasc){
		$sql = "INSERT INTO users SET status = 'ATIVO', email = :email, password = :pass, name = :name, person_type = 'FÍSICA', 
		register = :register, admin = '1', salesman = :salesman, data_nasc = :data_nasc, 
		id_permission = :id_permission, catalog = :catalog, notices = 'NAO'";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':email', $email);
		$sql->bindValue(':pass', md5($pass));
		$sql->bindValue(':name', $name);
		$sql->bindValue(':register', $register);
		$sql->bindValue(':salesman', $salesman);
		$sql->bindValue(':data_nasc', $data_nasc);
		$sql->bindValue(':id_permission', $permission);
		$sql->bindValue(':catalog', $catalog);
		$sql->execute();

		return $this->db->lastInsertId();
	}

	public function edit($status, $permission, $salesman, $catalog, $id){
		$sql = "UPDATE users SET status = :status, id_permission = :id_permission, salesman = :salesman, 
		catalog = :catalog WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':status', $status);
		$sql->bindValue(':id_permission', $permission);
		$sql->bindValue(':salesman', $salesman);
		$sql->bindValue(':catalog', $catalog);
		$sql->bindValue(':id', $id);
		$sql->execute();

	}

	public function editAccount(string $name, int $id){
		$sql = "UPDATE users SET name = :name WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':name', $name);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}

	public function editPassword(string $pass, int $id){
		$sql = "UPDATE users SET password = :pass WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':pass', md5($pass));
		$sql->bindValue(':id', $id);
		$sql->execute();
	}

}
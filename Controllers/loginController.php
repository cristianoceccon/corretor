<?php
class loginController extends Controller {

	public function index() {
        $array = array();
        $array['error'] = array(
            'error' => '',
            'msg' => ''
        );

        $array['email'] = array(
            'error' => '',
            'msg' => ''
        );

        if(!empty($_SESSION['error'])){
            $array['error']['error'] = $_SESSION['error']['error'];
            $array['error']['msg'] = $_SESSION['error']['msg'];
            unset($_SESSION['error']);
        }

        if(!empty($_SESSION['send_email'])){
            $array['email']['error'] = $_SESSION['send_email']['error'];
            $array['email']['msg'] = $_SESSION['send_email']['msg'];
            unset($_SESSION['send_email']);
        }
		$this->loadView('login', $array);
	}

    public function index_action(){
        if(!empty($_POST['user']) && !empty($_POST['pass'])){
            $user = addslashes($_POST['user']);
            $pass = addslashes($_POST['pass']);
            $u = new User();
            if($u->validateLogin($user, $pass)){
                header("Location:".BASE_URL."");
                exit;
            }
        } 
        
        $_SESSION['error'] = array(
            'error' => 'true',
            'msg' => 'Usuário e/ou senha inválidos!'
        );
        header("Location:".BASE_URL."login"); 
    
    }


    public function esqueciSenha(){
		if(!empty($_POST['s_email'])){
		   $user = new User();
           $token_user = new Tokenusers();
		   $email = filter_var($_POST['s_email'], FILTER_SANITIZE_EMAIL);
           $info = $user->emailVerify($email, true);
		   if(empty($info)){
			    $_SESSION['send_email'] = array(
                    'error' => true,
                    'msg' => 'E-mail não registrado na base de dados'
                );
			    header("Location:".BASE_URL."login");
			    exit;
		    }

			$token = md5(time().rand(0, 9999).rand(0, 9999));
			$id_user = $info['id'];
			$token_user->insertTokenUser($id_user, $token);
			$link = BASE_URL_SITE."cliente/resetarSenha/".$token;
			$from = "suporte@arteborda.com.br";

            $to = $email;

            $subject = "Arte Borda - Sua Senha";

            $message = '
            <html>
				<head><title>Arte Borda - Sua Senha</title></head>
				<body>
				<img src="'.BASE_URL.'assets/image/banner_arte_borda_4.png" /><br>
				<h2>Olá,</h2>
				
				<p>Recebemos uma solicitação para cadastrar uma nova senha associada a este e-mail.</p>
				<p>Se você fez essa solicitação, por favor, clique no botão abaixo:</p>
				<a href="'.$link.'" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" 
				style="display:block; height:40px; line-height:40px; text-decoration:none; 
				background:#870999; color:#ffffff; font-size:18px; border-radius:4px; text-align:center; max-width:224px">
				Cadastrar  nova senha</a>
				<p>Se você não fez esta solicitação, ignore este email e fique tranquilo, pois sua conta em nosso site está protegida.</p>
				Atenciosamente,<br>
				Equipe de atendimento ao cliente.
				</body>
            </html>';
          
			$headers = "MIME-Version: 1.0\n";
			$headers .= "Content-type: text/html; charset=utf-8\n";
			$headers .= "From:". $from . "\r\n".
						'X-Mailer: PHP/'.phpversion();
			
			mail($to, $subject, $message, $headers);
			$_SESSION['send_email'] = array(
                'error' => false,
                'msg' => 'E-mail enviado com sucesso!'
            );
			header("Location:".BASE_URL."login");
			exit;

			
		}
	}

    public function logout(){
        unset($_SESSION['token']);
        unset($_SESSION['permi_salesman']);
        unset($_SESSION['permi_catalog']);
        unset($_SESSION['isadmin']);
        unset($_SESSION['id_user']);
        header("Location:".BASE_URL."");
        exit;
    }

}
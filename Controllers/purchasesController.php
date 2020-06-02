<?php 
use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;

class purchasesController extends Controller {
    private $user;

    public function __construct(){
        $this->user = new User();

        if(!$this->user->isLogged()){
            header("Location:".BASE_URL."login");
            exit;
        } 

        if(!$this->user->hasPermission('ver_pedidos')){
            header("Location:".BASE_URL);
            exit;
        }
    }

    public function index(){
        $purchase = new Purchases();
        $orderStatus = new Orderstatus();
        $array = array();
        $filters = array();
        $offset = 0;
        $limit = 12;
        $currentPage = 1;

        //filtros de pesquisa
        $filters['search'] = ''; 
        $filters['initial_date'] = '';
        $filters['final_date'] = '';
        $filters['payment_status'] = '';
        $filters['id_user'] = '';


        $array['user'] = $this->user;
        
        /*Verifica se o usuario é um vendedor para mostrar somente os pedidos do vendedor */
        $id_user = $array['user']->getId();
        $data_user = $array['user']->getUserById($id_user);

        if($data_user['salesman'] == 'SIM'){
            $filters['id_user'] = $id_user;
        }
        //-------------------

        $array['menuActive'] = 'purchases';
        $array['initial_date'] = '';
        $array['final_date'] = '';
        $array['payment_status'] = '';
        $array['success'] = '';
        if(!empty($_GET['pagina'])){
            $currentPage = intval($_GET['pagina']);
        }
        
        if(!empty($_GET['search'])){
            $filters['search'] = $_GET['search'];
        }

        if(!empty($_GET['status'])){
            $filters['payment_status'] = filter_var($_GET['status'], FILTER_SANITIZE_NUMBER_INT);
            $array['payment_status'] = $filters['payment_status'];
        }

        if(!empty($_SESSION['success'])){
            $array['success'] = $_SESSION['success'];
            unset($_SESSION['success']);
        }

        if(!empty($_GET['initial_date']) && !empty($_GET['final_date'])){
            $array['initial_date'] = $_GET['initial_date'];
            $array['final_date'] = $_GET['final_date'];
            $initial_date = str_replace("/", '-', $_GET['initial_date']);
            $initial_date = date("Y-m-d", strtotime($initial_date));
            $final_date = str_replace("/", '-', $_GET['final_date']);
            $final_date = date("Y-m-d", strtotime($final_date));
            $filters['initial_date'] = $initial_date;
            $filters['final_date'] = $final_date;
        }
        
        
        
        $offset = ($currentPage * $limit) - $limit;
        $array['list'] = $purchase->getList($offset, $limit, $filters);
        $array['order_status'] = $orderStatus->getList();
        $array['totalItems'] = $purchase->getTotal($filters);
        $array['numberOfPages'] = ceil($array['totalItems']/$limit);
        $array['currentPage'] = $currentPage;
        $array['search'] = $filters['search'];
        $array['qtd'] = $limit;
        
        
        $this->loadTemplate('purchases', $array);

    }

    public function manage($id){
        if(!$this->user->hasPermission('gerenciar_pedidos')){
            header("Location:".BASE_URL);
            exit;
        }

        if(empty($id)){
            header("Location:".BASE_URL."purchases");
            exit;
        }

        $purchase = new Purchases();
        $orderhistory = new Orderhistory();
        $paymentMethod = new PaymentMethod();
        $orderStatus = new Orderstatus();
        $customeraddress = new Customeraddress();
        $shippingAddresses = new ShippingAddresses();
        
        $dados = array();
        $code_transaction = '';
        $dados['user'] = $this->user;
        $dados['menuActive'] = 'purchases';
        $dados['payment_type'] = array(
            'type' => '',
            'flag' => ''
        );
        $dados['sender'] = '';
        $dados['frete'] = 0;
        $dados['qtd_cart'] = '';
        $dados['order_status'] = array();
        $dados['valor_com_desconto'] = 0;
        $dados['seller'] = false;
        $dados['id'] = $id;//id do pedido
        $dados['payment_link'] = '';
        $dados['expire_at'] = '';
        $dados['msg'] = '';
        $dados['shipping_cost'] = '';

        $dados['payment_address'] = array(
            'street' => '',
            'number' => '',
            'complement' => '',
            'district' => '',
            'postalCode' => '',
            'city' => '',
            'state' => '',
            'country' => '',
            'phone' => ''
        );

        $dados['shipping_address'] = array(
            'street' => '',
            'number' => '',
            'complement' => '',
            'district' => '',
            'postalCode' => '',
            'city' => '',
            'state' => '',
            'country' => '',
            'phone' => '',
            'email' => ''
        );

        //dados do pedido
        $dados['info'] = $purchase->get(intval($id));

        //informações do comprador
        $dados['info_user'] = $this->user->getUserById($dados['info']['id_user']);

        //lista de produtos do pedido
        $dados['list_products'] = $purchase->getItems(intval($id));

        //historico do pedido
        $dados['order_history'] = $orderhistory->get(intval($id));
        
        //status disponiveis para um pedido
        $dados['order_status'] = $orderStatus->getList();

        //tipo do pagamento do pedido
        $dados['payment_type']['type'] = ucfirst($dados['info']['payment_type']);

        //seta a quantidade de parcelas que o comprador fez na compra
        $dados['qtd_cart'] = $dados['info']['installments'];

        //seta o frete do pedido
        $dados['frete'] = $dados['info']['shipping_price'];//seta o frete do pedido

        //array com o endereço de entrega do pedido
        $shipping_address = $shippingAddresses->get($id);
        
        //dados da transação do pedido
        $purchase_transaction = $purchase->getPurchaseTransaction(intval($id));

        //se existe transação salva deste pedido no banco de dados salva o id da transação na variavel abaixo
        if(!empty($purchase_transaction)){
            $code_transaction = $purchase_transaction['transaction_code'];
        }


        

        /*Verifica se o usuario logado é um vendedor */
        $id_user = $dados['user']->getId();
        $data_user = $dados['user']->getUserById($id_user);

        if($data_user['salesman'] == 'SIM'){
            $dados['seller'] = true;
        }
        //-------------------
        

        //seta o endereço de entrega do pedido
        if(!empty($shipping_address)){
            $dados['shipping_address']['street'] = $shipping_address['address'];
            $dados['shipping_address']['number'] = $shipping_address['number'];
            $dados['shipping_address']['complement'] = $shipping_address['complement'];
            $dados['shipping_address']['district'] = $shipping_address['neighborhood'];
            $dados['shipping_address']['postalCode'] = $shipping_address['postal_code'];
            $dados['shipping_address']['city'] = $shipping_address['city'];
            $dados['shipping_address']['state'] = $shipping_address['uf'];
            $dados['shipping_address']['email'] = $dados['info_user']['email'];
            $dados['shipping_address']['phone'] = $shipping_address['cell_phone'];
        }

        
        //pegar dados do pedido na api do gerencianet se o pagamento foi feito com boleto
        if($dados['info']['payment_type'] == "boleto"){
            global $config;

            $options = array(
                'client_id' => $config['gerencianet_clientid'],
                'client_secret' => $config['gerencianet_clientsecret'],
                'sandbox' => $config['gerencianet_sandbox']
            );

            $params = ['id' => intval($code_transaction)];

            try {
                $api = new Gerencianet($options);
                $charge = $api->detailCharge($params, []);
                if($charge['code'] == '200'){

                    $dados['payment_link'] = $charge['data']['payment']['banking_billet']['link'];
                    $dados['expire_at'] = $charge['data']['payment']['banking_billet']['expire_at'];
                }
                
            } catch (GerencianetException $e) {
                print_r($e->code);
                print_r($e->error);
                print_r($e->errorDescription);
                exit;
            } catch (Exception $e) {
                print_r($e->getMessage());
                exit;
            }
        }

        //pegar dados do pedido na api do pagseguro se o pagamento foi feito com cartão de crédito
        if($dados['info']['payment_type'] == "psckttransparente"){
            $date = date("Y-m-d", strtotime("-1 month")).'T'.date("H:i");
        
            $options = [
                'initial_date' => $date
            ];
            
            try {
                $response = \PagSeguro\Services\Transactions\Search\Reference::search(
                    \PagSeguro\Configuration\Configure::getAccountCredentials(),
                    intval($id),
                    $options
                );
                
                $r = $response->getTransactions();
        
                if(!empty($r)){
                    $code = $r[0]->getCode();
                    $p = \PagSeguro\Services\Transactions\Search\Code::search(
                        \PagSeguro\Configuration\Configure::getAccountCredentials(),
                        $code
                    );

                    $code_p = $p->getPaymentMethod()->getCode();
                    //$type = $p->getPaymentMethod()->getType();
                    
                    $dados['qtd_cart'] = $p->getInstallmentCount();
                    $dados['payment_type'] = $paymentMethod->typeOfPayment(intval($code_p));
                    
                    $dados['valor_com_desconto'] = $p->getNetAmount();
                    
                } //fim do if
                
            } catch (Exception $e) {
                die($e->getMessage());
            }      
        }//fim do if api pagseguro

        //seta a mesagem de erro se usuario tentou mudar alguma coisa no pedido e deu erro
        if(!empty($_SESSION['msg'])){
            $dados['msg'] = $_SESSION['msg'];
            unset($_SESSION['msg']);
        }

        $this->loadTemplate('visualizar_pedido', $dados);
    }

    public function changeOrder($id){
        if(empty($id)){
            header("Location:".BASE_URL."purchases");
            exit;
        }

        $purchase = new Purchases();
        $orderStatus = new Orderstatus();
        $orderhistory = new Orderhistory();
        $status = (!empty($_POST['status']))?filter_var($_POST['status'], FILTER_SANITIZE_NUMBER_INT):'';
        $info = $purchase->get($id);
        $list = $orderStatus->getList();
        $verify = false;

        if(!empty($status)){
            foreach($list as $item){
                if($item['code'] == $status){
                    $verify = true;
                }
            }
        } else {
            $verify = true;
        }
        

        if($verify == false){
            $_SESSION['success'] = 'Alteração do pedido não foi realizada!';
            header("Location:".BASE_URL."purchases");
            exit;
        }

        if(empty($info)){
            header("Location:".BASE_URL."purchases");
            exit;
        }

        if(!empty($status) && $status != $info['payment_status']){
            $purchase->update($id, $status);//altera status do pedido   
            $orderhistory->createOrderHistory($id, $status);//cria um histórico do pedido
            
            $purchase->updateStock($id, $status);//atualiza o stock dos produtos do pedido
        }
        //se a nova data e o tipo de pagamento for boleto entra nesse if para alterar a data de vencimento do boleto
        if(!empty($_POST['date_venc']) && $info['payment_type'] == 'boleto'){
           
            $date = str_replace('/', '-', $_POST['date_venc']);
            $date = date('Y-m-d', strtotime($date));

            //altera data de vencimento do boleto
            global $config;

            //dados da transação do pedido
            $purchase_transaction = $purchase->getPurchaseTransaction(intval($id));
            if(!empty($purchase_transaction)){
                $code_transaction = $purchase_transaction['transaction_code'];
            }

            $options = array(
                'client_id' => $config['gerencianet_clientid'],
                'client_secret' => $config['gerencianet_clientsecret'],
                'sandbox' => $config['gerencianet_sandbox']
            );

            $params = ['id' => $code_transaction];

            $body = [
                'expire_at' => $date
            ];

            try {
                $api = new Gerencianet($options);
                $charge = $api->updateBillet($params, $body);
                if($charge['code'] != '200'){
                    $_SESSION['msg'] =   'Não foi possível alterar o vencimento!';
                    header("Location:".BASE_URL."purchases/manage/".$id);
                    exit;
                }
            } catch (GerencianetException $e) {
                print_r($e->code);
                print_r($e->error);
                print_r($e->errorDescription);
                $_SESSION['msg'] = $e->errorDescription;
                header("Location:".BASE_URL."purchases/manage/".$id);
                exit;
            } catch (Exception $e) {
                print_r($e->getMessage());
                exit;
            }
        }//fim do if


        $_SESSION['success'] = 'Alteração do pedido feita com sucesso!';
        header("Location:".BASE_URL."purchases");
        exit;

    }

    public function cancelTicket($id){
        if(empty($id)){
            header("Location:".BASE_URL."purchases");
            exit;
        }

        if(!$this->user->hasPermission('alterar_status_pedido')){
            header("Location:".BASE_URL."purchases");
            exit;
        }

        $purchase = new Purchases();
        
        global $config;

        //dados da transação do pedido
        $purchase_transaction = $purchase->getPurchaseTransaction(intval($id));
         if(!empty($purchase_transaction)){
             $code_transaction = $purchase_transaction['transaction_code'];
         }

        $options = array(
            'client_id' => $config['gerencianet_clientid'],
            'client_secret' => $config['gerencianet_clientsecret'],
            'sandbox' => $config['gerencianet_sandbox']
        );

        $params = ['id' => $code_transaction];

        try {
            $api = new Gerencianet($options);
            $charge = $api->cancelCharge($params, []);

            if($charge['code'] == '200'){
                $_SESSION['msg'] = 'Boleto cancelado com sucesso!';
                header("Location:".BASE_URL."purchases/manage/".$id);
                exit;
            }
            
        } catch (GerencianetException $e) {
            print_r($e->code);
            print_r($e->error);
            print_r($e->errorDescription);
            $_SESSION['msg'] = $e->errorDescription;
            header("Location:".BASE_URL."purchases/manage/".$id);
            exit;
        } catch (Exception $e) {
            print_r($e->getMessage());
            exit;
        }
    }

    public function markAsPaidTheBill($id){
        if(empty($id)){
            header("Location:".BASE_URL."purchases");
            exit;
        }

        if(!$this->user->hasPermission('alterar_status_pedido')){
            header("Location:".BASE_URL."purchases");
            exit;
        }

        $purchase = new Purchases();
        
        global $config;

        //dados da transação do pedido
        $purchase_transaction = $purchase->getPurchaseTransaction(intval($id));
         if(!empty($purchase_transaction)){
             $code_transaction = $purchase_transaction['transaction_code'];
         }

        $options = array(
            'client_id' => $config['gerencianet_clientid'],
            'client_secret' => $config['gerencianet_clientsecret'],
            'sandbox' => $config['gerencianet_sandbox']
        );

        $params = ['id' => $code_transaction];

        try {
            $api = new Gerencianet($options);
            $charge = $api->settleCharge($params, []);
         
            if($charge['code'] == '200'){
                $_SESSION['msg'] = 'Boleto liquidado com sucesso!';
                header("Location:".BASE_URL."purchases/manage/".$id);
                exit;
            }

        } catch (GerencianetException $e) {
            print_r($e->code);
            print_r($e->error);
            print_r($e->errorDescription);
            $_SESSION['msg'] = $e->errorDescription;
            header("Location:".BASE_URL."purchases/manage/".$id);
            exit;
        } catch (Exception $e) {
            print_r($e->getMessage());
            exit;
        }
    }

    public function cancelPagSeguro($id){
        if(empty($id)){
            header("Location:".BASE_URL."purchases");
            exit;
        }

        if(!$this->user->hasPermission('alterar_status_pedido')){
            header("Location:".BASE_URL."purchases");
            exit;
        }

        $date = date("Y-m-d", strtotime("-1 month")).'T'.date("H:i");
        
        $options = [
            'initial_date' => $date
        ];
        
        try {
            $response = \PagSeguro\Services\Transactions\Search\Reference::search(
                \PagSeguro\Configuration\Configure::getAccountCredentials(),
                intval($id),
                $options
            );
            
            $r = $response->getTransactions();
    
            if(!empty($r)){
                $code = $r[0]->getCode();
                
                try {
                    $cancel = \PagSeguro\Services\Transactions\Cancel::create(
                        \PagSeguro\Configuration\Configure::getAccountCredentials(),
                        $code
                    );
                    
                    if($cancel->getResult() == 'OK'){
                        $_SESSION['msg'] = 'Pagamento cancelado com sucesso!';
                        header("Location:".BASE_URL."purchases/manage/".$id);
                        exit;
                    }
                        
                } catch (Exception $e) {
                    die($e->getMessage());
                    exit;
                }

            } //fim do if
            
        } catch (Exception $e) {
            die($e->getMessage());
            exit;
        }     

        
    }

    public function reversePaymentPagSeguro($id){
        if(empty($id)){
            header("Location:".BASE_URL."purchases");
            exit;
        }

        if(!$this->user->hasPermission('alterar_status_pedido')){
            header("Location:".BASE_URL."purchases");
            exit;
        }

        $date = date("Y-m-d", strtotime("-1 month")).'T'.date("H:i");
        
        $options = [
            'initial_date' => $date
        ];
        
        try {
            $response = \PagSeguro\Services\Transactions\Search\Reference::search(
                \PagSeguro\Configuration\Configure::getAccountCredentials(),
                intval($id),
                $options
            );
            
            $r = $response->getTransactions();
    
            if(!empty($r)){
                $code = $r[0]->getCode();
                $value = null;
                
                try {
                    $refund = \PagSeguro\Services\Transactions\Refund::create(
                        \PagSeguro\Configuration\Configure::getAccountCredentials(),
                        $code,
                        $value
                    );

                    if($refund->getResult() == 'OK'){
                        $_SESSION['msg'] = 'Pagamento estornado com sucesso!';
                        header("Location:".BASE_URL."purchases/manage/".$id);
                        exit;
                    }
                        
                } catch (Exception $e) {
                    die($e->getMessage());
                    exit;
                }

            } //fim do if
            
        } catch (Exception $e) {
            die($e->getMessage());
            exit;
        }     

    }
}
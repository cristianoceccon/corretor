<?php 
class ajaxController extends Controller {

    public function __construct(){
        $this->user = new User;
        
		if(!$this->user->isLogged()){
       	  header("Location:".BASE_URL."login");
       	  exit;
        } 
    }

    public function getProductForKit(){
        $retorno = array(
            'error' => true,
            'msg' => 'Não foi possível selecionar o produto!',
            'data' => array()
        );

        if(!empty($_POST['id'])){

            if(filter_var($_POST['id'], FILTER_VALIDATE_INT) == false){
                $retorno['msg'] = 'Valor inválido';
                echo json_encode($retorno);
                exit;
            }

            $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
            $product = new Products();

            //informações do produto
            $info = $product->get($id);
            //primeira imagem do produto
            $imagem = $product->primaryImage($id);

            if(!empty($info)){
                $info['image'] = BASE_URL_SITE."media/products/".$imagem;
                $retorno['error'] = false;
                $retorno['msg'] = 'Success';
                $retorno['data'] = $info;
            }
        }

        echo json_encode($retorno);
        exit;
    }

    public function getProduct(int $id)
    {   
        $response = ['error'=>true, 'msg'=>''];
        if(empty($id))
        {   
            $response['msg'] = 'Não foi possível pegar os dados do produto!';
            echo json_encode($response);
            exit;
        }
        $produto = new Produtos();
        $response['data'] = $produto->get($id);
        $response['error'] = false;
        echo json_encode($response);
        exit;

        
    }

    public function index(){}
    

    public function getTiposPagamentosPedidos(int $id)
    {
        $tiposPagamentos = new TiposPagamentos();
        echo json_encode($tiposPagamentos->get($id));
    }
    
    public  function salvaPedido()
    {   
        $response = ['error' => true, 'msg' => ''];
        try
        {
            $data = json_decode(file_get_contents('php://input'), true);
            $user_id = $data['cliente_id'];
            $venc = $data['date_venc'];
            $forma_pagamento_id = $data['forma_pagamento_id'];
            $plano_id = $data['plano_id'];
            $produtos = $data['produtos'];
            $qtd_parc = $data['qtd_parc'];
            $tipo_pagamento_id = $data['tipo_pagamento_id'];           
            $valor_entrada = $data['valor_entrada'];
            $valor_parcela = $data['valor_parcela'];
            if(!empty($data['date_venc']))
            {
                $data['date_venc'] = date("Y-m-d", strtotime(str_replace('/', '-',  $data['date_venc'])));
            } else {
                $data['date_venc'] = null;
            }
            if(!empty($data['valor_parcela']))
            {
                $data['valor_parcela'] = floatval(str_replace(',', '.', $data['valor_parcela']));
            } else {
                $data['valor_parcela'] = floatval(0);
            }
            if(!empty($data['valor_entrada']))
            {
                $data['valor_entrada'] = floatval(str_replace(',', '.', $data['valor_entrada']));
            } else 
            {
                $data['valor_entrada'] = floatval(0);
            }
            $pedidos = new Pedidos();
            $produtosPedidos = new ProdutosPedidos();
            
            $pedido_id = $pedidos->create($data);
            foreach($produtos as $pro)
            {   
                $pro['pedido_id'] = $pedido_id; 
                $produtosPedidos->create($pro);
            }
            $response['error'] = false;
            $response['msg'] = 'Success';
            echo json_encode($response);
            exit;
        } catch( Exception $e )
        {
            $response['msg'] = $e->getMessage();
            echo json_encode($response);
            exit;
        }
    }
}
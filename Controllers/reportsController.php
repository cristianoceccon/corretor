<?php
use Mpdf\Mpdf;

class reportsController extends Controller {

    //* @var User/
    private $user;

    //* @var Mpdf */
    public $mpdf;

    public function __construct(){
        $this->user = new User();

        if(!$this->user->isLogged()){
            header("Location:".BASE_URL."login");
            exit;
        } 

        if(!$this->user->hasPermission('ver_relatorios')){
            header("Location:".BASE_URL);
            exit;
        }

        //Page size & Orientation Mpdf
        $config_pdf = array(
            'mode' => 'utf-8',
            'format' => 'A4-L',
            'orientation' => 'L'
        );

        $this->mpdf = new Mpdf($config_pdf);

    }

    public function index(){
        header("Location:".BASE_URL);
        exit;
    }

    private function header():string {
        // Buffer the following html with PHP so we can store it to a variable later
        ob_start();

        //require html
        $this->loadViewPdf('header', array());

        $header = ob_get_contents();

        ob_end_clean();

        return $header;
    }

    private function footer():string {
        // Buffer the following html with PHP so we can store it to a variable later
        ob_start();

        //require html
        $this->loadViewPdf('footer', array());

        $footer = ob_get_contents();

        ob_end_clean();

        return $footer;
    }


    public function purchases(){
        //verifica se usuário tem permissão para esse relatório
        if(!$this->user->hasPermission('relatorio_pedidos')){
            header("Location:".BASE_URL);
            exit;
        }

        $orderStatus = new Orderstatus();
        $dados = array();
        $filters = array();

        $dados['user'] = $this->user;
        $dados['menuActive'] = 'ver_relatorios';
        $dados['subMenuActive'] = 'reportsPurchases';


        $dados['order_status'] = $orderStatus->getList();


        $this->loadTemplate('purchasesReports', $dados);
    }



    public function purchasesPdf(){

        //verifica se usuário tem permissão para esse relatório
        if(!$this->user->hasPermission('relatorio_pedidos')){
            header("Location:".BASE_URL);
            exit;
        }

        $purchase = new Purchases();
        $orderStatus = new Orderstatus();

        $data = array();
        $filters = array();

        $data['orderStatus'] = $orderStatus;
        $data['total'] = 0;
        $data['status'] = 'TODOS';
        $data['client_type'] = 'TODOS';
        $data['initial_date'] = '';
        $data['final_date'] = '';
        
        if(!empty($_GET['status'])){

            if(filter_var($_GET['status'], FILTER_VALIDATE_INT)){

                $filters['payment_status'] = filter_var($_GET['status'], FILTER_SANITIZE_NUMBER_INT);

                foreach($orderStatus->getList() as $os){
                    if($os['code'] == $filters['payment_status']){
                        $data['status'] = $os['name'];
                    }
                }

            }

        }

        if(!empty($_GET['client_type'])){
            $filters['client_type'] = filter_var($_GET['client_type'], FILTER_SANITIZE_STRING);
            $data['client_type'] = $filters['client_type'];
        }

        if(!empty($_GET['initial_date']) && !empty($_GET['final_date'])){
            $initial_date = str_replace("/", '-', $_GET['initial_date']);
            $initial_date = date("Y-m-d", strtotime($initial_date));
            $final_date = str_replace("/", '-', $_GET['final_date']);
            $final_date = date("Y-m-d", strtotime($final_date));
            $filters['initial_date'] = $initial_date;
            $filters['final_date'] = $final_date;
            $data['initial_date'] = date("d/m/Y", strtotime($initial_date));
            $data['final_date'] = date("d/m/Y", strtotime($final_date));
        }

        //pega os dados para o relatório
        $data['info'] = $purchase->getReports($filters);

        // Buffer the following html with PHP so we can store it to a variable later
        ob_start();

        //require html
        $this->loadViewPdf('purchases', $data);

        // Now collect the output buffer into a variable
        $html = ob_get_contents();
        ob_end_clean();

        $this->mpdf->setAutoTopMargin = 'stretch';

        // Define the Header/Footer before writing anything so they appear on the first page
        $this->mpdf->SetHTMLHeader($this->header(),'O', true);
        $this->mpdf->SetHTMLFooter($this->footer());
        

        // send the captured HTML from the output buffer to the mPDF class for processing
        $this->mpdf->WriteHTML($html);
        $this->mpdf->Output();
        exit;
    }

    public function example(){
        $this->mpdf->setAutoTopMargin = 'stretch';
        // Define the Header/Footer before writing anything so they appear on the first page
        $this->mpdf->SetHTMLHeader($this->header(),'O', true);
        $this->mpdf->SetHTMLFooter($this->footer());
        
        $this->mpdf->WriteHTML('<h1>Hello world!</h1>');
        
        $this->mpdf->Output();

    }

//RELATÓRIO DE CLIENTES

public function clientes(){
    //verifica se usuário tem permissão para esse relatório
    if(!$this->user->hasPermission('ver_clientes')){
        header("Location:".BASE_URL);
        exit;
    }

    $clientes = new Clientes();

    $dados['user'] = $this->user;
    $dados['menuActive'] = 'ver_relatorios';
    $dados['subMenuActive'] = 'reportsClientes';


    $dados['nome'] = $clientes->getAllClientes();


    $this->loadTemplate('clientesReports', $dados);
}












}

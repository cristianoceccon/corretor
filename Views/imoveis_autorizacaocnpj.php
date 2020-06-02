<!-- tab-content START-->
<div class="tab-content">
<!--Detalhes do pedido START-->
<div class="tab-pane active" id="detalhes_pedido">
    <section class="invoice" style="margin:0px;">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header">
                <div class=text-center>
                    <b>Volmir Corretor</b>
                    <h5>Creci 027671</h5>
                    <h6>Rua Carolina, 420, Centro - Bom Jesus do Oeste - SC</h6>                  
                 </div> 
            <h4>
            <div class=text-center>
            <b>Autorização Nº</b> <?php echo $info['id']?> </b>
            <br>
            <strong>Autorização para prestação de serviços de intermediação imobiliária <?php echo $info['exclusividade']?> </b>exclusividade </strong>
            </div>     
            <br>    <!-- /.col -->
            A Empresa <?php echo $info['user']['razao']?>, inscrita no CNPJ sob o nº </strong><?php echo $info['user']['cnpj']?>, neste ato representada por, <?php echo $info['user']['nome']?>, inscrito(a) no CPF sob o nº <?php echo $info['user']['cpf']?>, RG </strong><?php echo $info['user']['rg']?>, 
            residente e domiciliado(a) na <?php echo $info['user']['endereco']?>, <?php echo $info['user']['numero_end']?>, 
            <?php echo $info['user']['bairro']?> de <?php echo $info['user']['cidade']?>, <?php echo $info['user']['estado']?> - de ora em diante nominado CONTRATANTE, na qualidade de proprietário(a) do imóvel abaixo discriminado, em observância ao disposto no art. 20, inciso III, da Lei 6.530/78, vem, juntamente com o Sr. VOLMIR ELEANDRO CECCON, brasileiro, casado, Corretor de Imóveis CRECI nº 027671, portador do CPF nº 017.250.449-00, com endereço profissional na Rua Carolina, n° 420, Centro, na cidade de Bom Jesus do Oeste – SC, devidamente domiciliado na cidade de Bom Jesus do Oeste - SC, de ora em diante nominado simplesmente CONTRATADO, ajustar o seguinte:
            <div class=text-center>
            <br>
                <b>Cláusula Primeira - DO OBJETO </b>
            </div>
            </br>
            O objeto da presente autorização de intermediação imobiliária <?php echo $info['exclusividade']?> exclusividade, é a venda de um imóvel, Matricula: <?php echo $info['matricula']?>, cuja denominação é a seguinte: </br> 
            </b> <?php echo $info['descricao']?>, cujo preço mínimo autorizado para comercialização é de R$ <?php echo $info['valor']?>
            <div class=text-center>
            <br>
                <b>Cláusula Segunda – DA PUBLICIDADE E DAS FERRAMENTAS PARA A REALIZAÇÃO DO OBJETO </b>    
                </br>        
            </div>
            </br>
            
            É reservado ao CONTRATADO, como forma de promover o objeto descrito na cláusula primeira desta AUTORIZAÇÃO DE INTERMEDIAÇÃO IMOBILIÁRIA, o direito de, às suas expensas, utilizar-se das ferramentas e técnicas permitidas em lei, entre elas, a colocação de placas, veiculação de anúncios, inclusive com a utilização de fotografias, em classificados de jornais, na internet e demais meios de comunicação, além de promover, com o prévio consentimento do CONTRATANTE, visitas ao imóvel para mostrá-lo às pessoas interessadas.
            <div class=text-center>
            <br>
                <b>Cláusula Terceira – DOS HONORÁRIOS</b>
            </div>
            </br>
            Realizada a efetiva intermediação do imóvel objeto desta AUTORIZAÇÃO DE INTERMEDIAÇÃO IMOBILIÁRIA pelo CONTRATADO, este terá direito a perceber do CONTRATANTE, a título de honorários, o equivalente a <?php echo $info['porcentagem']?>% 
            
            <?php 
            $i=$info['porcentagem'];
    switch ($i) {
        case 1:
            echo "(um porcento)";
            break;
        case 2:
        echo "(dois porcento)";
        break;
        case 3:
            echo "(três porcento)";
            break;
        case 4:
            echo "(quatro porcento)";
            break;
        case 5:
            echo "(cinco porcento)";
            break;  
        case 6:
            echo "(seis porcento)";
            break; 
            case 7:
                echo "(sete porcento)";
                break;
            case 8:
            echo "(oito porcento)";
            break;
            case 9:
                echo "(nove porcento)";
                break;
            case 10:
                echo "(dez porcento)";
                break;
            case 11:
                echo "(onze porcento)";
                break;  
            case 12:
                echo "(doze porcento)";
                break;             
            
} ?> sobre o valor da compra e venda, devendo tal comissão ser paga no ato da assinatura do contrato de promessa de compra e venda ou da assinatura da escritura definitiva no respectivo cartório de registro imobiliário, o que acontecer primeiro. 
            Caso a presente avença seja contratada com exclusividade, durante sua vigência, ainda que a intermediação se dê através de outro corretor de imóveis ou que a venda seja efetivada diretamente com o CONTRATANTE, o ora CONTRATADO terá direito à percepção de honorários no percentual e na forma acima consignados, bem como também lhe será devida a comissão de corretagem se, mesmo após expirado o prazo prevista na cláusula quarta, a venda se realizar posteriormente como fruto da sua mediação ou por efeito dos seus trabalhos, conforme estabelece o art. 727 do Código Civil Brasileiro (Lei 10.406/2002).

            <div class=text-center>
            <br>
                <b>Cláusula Quarta – DA VIGÊNCIA DA AUTORIZAÇÃO</b>
            </div>
            </br>
            A presente AUTORIZAÇÃO DE INTERMEDIAÇÃO IMOBILIÁRIA tem o prazo até o dia <?php echo date("d/m/Y", strtotime($info['data_final'])); ?>, podendo ser renovado até que se realize a venda.
            E, por assim estarem justos e contratados, CONTRATANTE e CONTRATADO assinam o presente instrumento em duas vias de igual teor e forma.
            </br>
            </br>
            <br>
            <div class=text-center>
            Bom Jesus do Oeste - SC, 

<!-- MOSTRA DATA ATUAL POR EXTENSO -->
            <?php
date_default_timezone_set('America/Sao_Paulo');

$data = new DateTime();
$formatter = new IntlDateFormatter('pt_BR',
                                    IntlDateFormatter::FULL,
                                    IntlDateFormatter::NONE,
                                    'America/Sao_Paulo',          
                                    IntlDateFormatter::GREGORIAN);
echo $formatter->format($data); ?>.

</div>
<div class=text-center>
<br>
<br>
<br>
<br>
<br>
<br>
 <b>___________________________________________</b>
 <br>
 PROPRIETÁRIO(A) / REPRESENTANTE LEGAL 
 <br>
 <br>
 <br>
 <br>
 <br>
 <b>___________________________________________</b>
 <br>
 VOLMIR ELEANDRO CECCON - CRECI 027671
</div>

 
<script type="text/javascript">

window.onload = function(){


}

</script>

<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Main Footer -->


<!-- Add the sidebar's background. This div must be placed
immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<!-- Bootstrap 3.3.7 -->
<script src="https://www.arteborda.com.br/painel/assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="https://www.arteborda.com.br/painel/assets/adminlte/dist/js/adminlte.min.js"></script>
<!-- SlimScroll -->
<script src="https://www.arteborda.com.br/painel/assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="https://www.arteborda.com.br/painel/assets/js/jquery.mask.min.js"></script>
<script src="https://www.arteborda.com.br/painel/assets/js/jquery.maskMoney.js"></script>
<script  src="https://www.arteborda.com.br/painel/assets/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script  src="https://www.arteborda.com.br/painel/assets/adminlte/bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt.min.js"></script>
<script src="https://www.arteborda.com.br/painel/assets/js/script.js"></script>
<!-- iCheck 1.0.1 -->
<script src="https://www.arteborda.com.br/painel/assets/adminlte/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript">
//iCheck for checkbox and radio inputs
$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
checkboxClass: 'icheckbox_minimal-blue',
radioClass   : 'iradio_minimal-blue'
})
</script>
<script src="https://www.arteborda.com.br/painel/assets/js/user_add.js"></script>
</body>
</html>


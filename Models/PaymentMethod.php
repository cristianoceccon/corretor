<?php 
class PaymentMethod extends Model {
    
    //função retorna o tipo do pagamento feito pelo pagseguro checkout transparente
    public function paymentMethodTypePsckttransparente($type){
        $payment = "";

        switch ($type) {

            case 1:
                $payment = "Cartão de crédito";
                break;
            case 2:
                $payment = "Boleto";
                break;
            case 3:
                $payment = "Débito online";
                break;
            case 4:
                $payment = "Saldo PagSeguro";
                break;
            case 5:
                $payment = "Oi Paggo";
                break;
            case 7:
                $payment = "Depósito em conta";
                break;
        }

        return $payment;
    }
    
    //função identifica o tipo de cartao usado ou boleto
    public function typeOfPayment($code){
        $payment = array();
        $payment['type'] = '';
        $payment['flag'] = '';
            switch($code){

                case 101:
                    $payment['type'] = "Cartão de crédito Visa";
                    $payment['flag'] = "visa.png";
                    break;
                case 102:
                    $payment['type'] = "Cartão de crédito MasterCard";
                    $payment['flag'] = "mastercard.png";
                    break;
                case 103:
                    $payment['type'] = "Cartão de crédito American Express";
                    $payment['flag'] = "american-express.png";
                    break;
                case 104:
                    $payment['type'] = "Cartão de crédito Diners";
                    break;
                case 105:
                    $payment['type'] = "Cartão de crédito Hipercard";
                    break;
                case 106:
                    $payment['type'] = "Cartão de crédito Aura";
                    break;
                case 107:
                    $payment['type'] = "Cartão de crédito Elo";
                    break;
                case 108:
                    $payment['type'] = "Cartão de crédito PLENOCard";
                    break;
                case 109:
                    $payment['type'] = "Cartão de crédito PersonalCard";
                    break;
                case 110:
                    $payment['type'] = "Cartão de crédito JCB";
                    break;
                case 111:
                    $payment['type'] = "Cartão de crédito Discover";
                    break;
                case 112:
                    $payment['type'] = "Cartão de crédito BrasilCard";
                    break;
                case 113:
                    $payment['type'] = "Cartão de crédito FORTBRASIL";
                    break;
                case 114:
                    $payment['type'] = "Cartão de crédito CARDBAN";
                    break;
                case 115:
                    $payment['type'] = "Cartão de crédito VALECARD";
                    break;
                case 116:
                    $payment['type'] = "Cartão de crédito Cabal";
                    break;
                case 117:
                    $payment['type'] = "Cartão de crédito Mais!";
                    break;
                case 118:
                    $payment['type'] = "Cartão de crédito Avista";
                    break;
                case 119:
                    $payment['type'] = "Cartão de crédito GRANDCARD";
                    break;
                case 120:
                    $payment['type'] = "Cartão de crédito Sorocred";
                    break;
                case 201:
                    $payment['type'] = "Boleto Bradesco";
                    break;
                case 202:
                    $payment['type'] = "Boleto Santander";
                    break;
                case 301:
                    $payment['type'] = "Débito online Bradesco";
                    break;
                case 302:
                    $payment['type'] = "Débito online Itaú";
                    break;
                case 303:
                    $payment['type'] = "Débito online Unibanco";
                    break;
                case 304:
                    $payment['type'] = "Débito online Banco do Brasil";
                    break;
                case 305:
                    $payment['type'] = "Débito online Banco Real";
                    break;
                case 306:
                    $payment['type'] = "Débito online Banrisul";
                    break;
                case 307:
                    $payment['type'] = "Débito online HSBC";
                    break;
                case 401:
                    $payment['type'] = "Saldo PagSeguro";
                    break;
                case 501:
                    $payment['type'] = "Oi Paggo";
                    break;
                case 701:
                    $payment['type'] = "Depósito em conta - Banco do Brasil";
                    break;
                case 702:
                    $payment['type'] = "Depósito em conta - HSBC";
                    break;
            }

        return $payment;
    }
}
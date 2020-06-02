var listaProdutos = new Array();
async function selectProduct(valor)
{   
    var data = valor.split(';');
    var id = data[0];
    if(id == "")
    {
        return;
    }
    await fetch(window.BASE_URL+'ajax/getProduct/'+id, {
        method: 'GET'
    })
    .then(response => response.json())
    .then(data => mostrarProduto(data))
    .catch(error => console.log(error))
}

function mostrarProduto(data)
{
    var {id, nome, quantidade, custo, venda, estoque} = data.data;
    document.getElementById('valorunit_name').value = venda;
    document.getElementById('subtotal_name').value = venda;

}
function updateQtd(qtd)
{
    var valor = document.getElementById('valorunit_name').value;
    var total = parseInt(qtd) * parseFloat(valor);
    document.getElementById('subtotal_name').value = total;
    return true;

}
function updateValor(valor)
{   
    var qtd = document.getElementById('quantidade_name').value;
    var total = parseInt(qtd) * parseFloat(valor);
    document.getElementById('subtotal_name').value = total;
    return true;
}
function adicionaAoPedido(){
  
    //validar quantidade e valor
    var response = "";
    var produto = document.getElementById('produto_name').value.split(';');
    var id = produto[0];
    var nome = produto[1]; 
    var qtd = document.getElementById('quantidade_name').value;
    var valor = document.getElementById('valorunit_name').value;
    var total = parseInt(qtd) * parseFloat(valor);
    if(listaProdutos.length > 0)
    {
        for(var i in listaProdutos)
        {   
            if(listaProdutos[i].id == id)
            {
                alert('Produto já adicionado no seu pedido!')
                return;
            }
        }
    }
    listaProdutos.push({
        id: id,
        nome: nome,
        qtd: qtd,
        valor: valor,
        total: total
    });
    calculaTotal();
    console.log(listaProdutos)
    response += `
        <tr id="produto${id}">
            <td>${nome}</td>
            <td>${qtd}</td>
            <td>${valor}</td>
            <td>${total}</td>
            <td><a class="btn btn-xs btn-danger" onclick="removeProduto(${id});">Excluir</a></td>
        </tr>
    `;
    
    $("#produtos-pedido").append(response);
    return true;
}
var total = 0;
function calculaTotal()
{   
    let total_pedido = 0;
    if(listaProdutos.length > 0)
    {
        for(var i in listaProdutos)
        {   
            total_pedido += +listaProdutos[i].total
        }
    }
    total = total_pedido;
    $("#total-pedido").html(total_pedido);
    return true;
}
function removeProduto(id)
{   
    if(listaProdutos.length > 0)
    {
        for(var i in listaProdutos)
        {   
            if(listaProdutos[i].id == id)
            {
                listaProdutos.splice(i, 1);
            }
        }
    }
    $("#produto"+id+"").remove();
    console.log(listaProdutos)
    calculaTotal();
    return true;
}
var valor_parcela = 0;
var valor_entrada =  0;
function setValorEntrada(valor)
{   
    let qtd_parc = parseInt(document.getElementById('qtd_parc').value);
    if(parseFloat(valor) >= parseFloat(total))
    {
        alert('Confira o valor da entrada!');
        return;
    }
    if(parseFloat(valor) < parseFloat(total))
    {
        valor_parcela = (parseFloat(total) - parseFloat(valor)) / qtd_parc;
    }
    valor_entrada = parseFloat(valor);
    document.getElementById('valor_parcela').value = valor_parcela;
    return true;
}
function updateQtParcelas(qtd)
{
    valor_parcela = (parseFloat(total) - parseFloat(valor_entrada)) / qtd;
    document.getElementById('valor_parcela').value = valor_parcela;
    return true;
}
async function finalizarPedido()
{   
    let cliente_id = document.getElementById('cliente_id').value;
    let plano_id = document.getElementById('plano_conta_id').value;
    let forma_pagamento_id = document.getElementById('forma_pagamento_id').value;
    let tipo_pagamento_id = document.getElementById('tipo_pagamento_id').value;
    let valor_entrada = document.getElementById('valor_entrada').value;
    let qtd_parc = document.getElementById('qtd_parc').value;
    let date_venc = document.getElementById('date_venc').value;
    let valor_parcela = document.getElementById('valor_parcela').value;
    //verificar se variaveis estão vazios
    //
    var data = {
        cliente_id: cliente_id,
        plano_id: plano_id,
        forma_pagamento_id: forma_pagamento_id,
        tipo_pagamento_id: tipo_pagamento_id,
        valor_entrada: valor_entrada,
        qtd_parc: qtd_parc,
        date_venc: date_venc,
        valor_parcela: valor_parcela,
        valor_total:total,
        produtos: listaProdutos
    }
    //console.log(data)
    //return
    if(listaProdutos.length == 0)
    {
        alert('Pedido vazio!');
        return;
    }
    await fetch(window.BASE_URL+'ajax/salvaPedido', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then((data) => {
        if(data.error == true)
        {
            alert(data.msg);
            return;
        }
        alert('Pedido realizado com sucesso!');
        window.location.href = window.BASE_URL+'pedidos';
        return true;
    })
    .catch(error => console.log(error))
}

async function tiposPagamentos(id)
{
    await fetch(window.BASE_URL+'ajax/getTiposPagamentosPedidos/'+id, {
        method: 'GET'
    })
    .then(response => response.json())
    .then((data) => {
        if(data.length == 0)
        {
            return;
        }
        let select = `<select name="tipo_pagamento" class="form-control" id="tipo_pagamento_id">`;
        select += `<option value="">Selecione o tipo de pagamento</option>`;
        for(var i in data)
        {
            select += `<option value="${data[i].id}">${data[i].nome}</option>`;
        }
        select += `</select>`;
        document.getElementById('valor_entrada').removeAttribute('readonly');
        document.getElementById('qtd_parc').removeAttribute('readonly');
        if(id == 2)
        {
            document.getElementById('valor_entrada').setAttribute('readonly', true);
            document.getElementById('qtd_parc').setAttribute('readonly', true);
        }
        $("#tipos_pagamentos").html(select);

    })
    .catch(error => console.log(error))
    return true;
}


function selectProduct(id){
    var id_product = id;

    let data = new FormData();
    data.append('id', id_product);

    if(id_product != ''){

        fetch(window.BASE_URL+'ajax/getProductForKit', {  
            method: 'POST',  
            body: data,
        })
        .then(response => response.json())
        .then(data => addProductInKit(data))
        
        .catch(erro => console.error(erro))
        
    }//fim do if

}


//função adiciona produto no kit
function addProductInKit(data){
    //informações do produto
    var info = data.data;
    //status do error
    var error = data.error;
    //mensagem de erro
    var msg = data.msg;

    if(error == true){
        alert(msg);
        return false;
    }
    
    if(verifyId(info.id) == true){
        alert('AVISO: produto já existe no seu kit!');
        return false;
    }

    if(info.stock == 0){
        alert('AVISO: não é possível adicionar o produto, o estoque esta vazio!');
        return false;
    }

    if(error == false){
        let select = '<div class="input-group input-group-sm">';
        select += '<select  class="form-control" id="qtd'+info.id+'" onchange="updateQtd('+info.id+', this.value);"> ';

        for(let i=1; i <= 12; i++) {
            select += '<option value="'+i+'">'+i+'</option>';
        };
        select += '</select>';

        select += '</div>';
        
        $("#add_products").append(
            '<tr id="tr'+info.id+'">'+
                '<input type="hidden" class="ids" value="'+info.id+'">'+
                '<input type="hidden" name="products['+info.id+']" value="1;'+info.price_sale+'" data-price="'+info.price_sale+'" id="input_product'+info.id+'">'+
                '<td>'+info.id+'</td>'+
                '<td><img src="'+info.image+'" width="50"></td>'+
                '<td>'+info.name+'</td>'+
                '<td>'+select+'</td>'+
                '<td ><div class="input-group input-group-sm"><input type="text" value="'+info.price_sale.replace('.',',')+'" id="input_price'+info.id+'" class="form-control money"><span class="input-group-btn"><button type="button" class="btn btn-info btn-flat" onclick="buttonProduct('+info.id+');">Alterar</button></span></div></td>'+
                '<td id="td_price'+info.id+'">R$ '+info.price_sale.replace('.',',')+'</td>'+
                '<td><a class="btn btn-xs btn-danger" onclick="removeItem('+info.id+');">Excluir</a></td>'+
                '<input type="hidden"  class="all" id="id_all'+info.id+'" value="'+info.price_sale.replace(',','.')+'"/>'+
            '</tr>'
        );
        
        //pega o valor atual do kit
        let price_kit = $("#price_kit").val().replace(',','.');

        //pega o valor do produto selecionado
        let price_product = info.price_sale.replace(',','.');

        //soma o valor atual do kit com o produto selecionado
        let total = parseFloat(price_kit) + parseFloat(price_product);

        
        
        //atualiza o valor total do kit
        addTotalKitValue();
        
    }//fim do if
}

//altera quantidade de um determinado produto para o kit
function updateQtd(id, qtd){

    if(id == '' && qtd == ''){
        alert('AVISO: não foi possível alterar a quantidade!');
        return false;
    }

    if(Number.isInteger(id) == false && Number.isInteger(qtd) == false){
        alert('AVISO: não foi possível alterar a quantidade!');
        return false;
    }

    //altera quantidade do produto  selecionada pelo usuário
    changeProductValue(id, qtd)

    //pega o preço do produto
    let price = $("#input_product"+id+"").data('price');

    let td_price = parseFloat(price) * parseInt(qtd);

    //atualizar valor total do produto
    $("#td_price"+id+"").html(td_price.toLocaleString("pt-BR", { style: "currency" , currency:"BRL"}));
    $("#id_all"+id+"").val(td_price);
    
    addTotalKitValue()

}

//altera o preço e a quantidade do produto
function changeProductValue(id, qtd){

    var input_price  =  document.getElementById("input_price"+id+"").value.replace(",","."); 
    document.getElementById("input_product"+id+"").value = qtd+';'+input_price;

}

//verifica se já existe esse produto no kit
function verifyId(id){
    var ids = document.querySelectorAll('.ids');

    for(var i=0;i < ids.length;i++){
        if(ids[i].value === id){
            return true;
        }
    }
    return false;
}


//função soma o valor total do kit
function addTotalKitValue(id=''){

    let all_values = document.querySelectorAll(".all"); //selecionando todas as tr com All // 
    var total = 0;

    for(var i= 0; i < all_values.length; i++){
        total += +parseFloat(all_values[i].value.replace(",", "."));
    }

    //input hidden
    document.getElementById("price_kit").value = total;
    
    //input view
    document.getElementById("view_price_kit").innerHTML = total.toLocaleString("pt-BR", { style: "currency" , currency:"BRL"});
}



//função remove produto do kit
function removeItem(id){

    if(id != ''){

        $("#tr"+id+"").remove()

        //atualiza o valor total do kit
        addTotalKitValue()
        return true

    }

}


//função altera valor do produto digitado pelo usuário quando usuário clicar em alterar
function buttonProduct(id){

    if(id == ''){
        alert('ERRO: não foi possível alterar o valor!');
        return false;
    }

    if(Number.isInteger(id) == false){
        alert('ERRO: não foi possível alterar o valor!');
        return false;
    }

    //salva o valor digitado pelo usuário na variavel price_product
    var data_product =   document.querySelector("#input_price"+id+"");
    var price_product =   data_product.value.replace(",", ".");
    
    if(isNaN(price_product)){
        alert("ERRO: valor inválido!");
        return false;
    }

    if(price_product == ''){
        alert("Digite um valor para o produto!");
        return false;
    }


    var data_price = document.getElementById("input_product"+id+"");
    data_price.setAttribute('data-price', price_product);
    
    //pega a quantidade de items do produto
    var qtd = document.getElementById("qtd"+id+"").value;
    
    //atualiza a quantidade e o valor do produto
    document.getElementById("input_product"+id+"").value = qtd+';'+price_product;

    let td_price = parseFloat(price_product) * parseInt(qtd);

    //atualizar valor total do produto
    document.getElementById("td_price"+id+"").innerHTML = td_price.toLocaleString("pt-BR", { style: "currency" , currency:"BRL"});

    document.getElementById("id_all"+id+"").value = td_price;
    
        
    addTotalKitValue()

    return true;
}
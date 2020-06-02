jQuery(function(){
   jQuery('.p_new_image').on('click', function(e){
      e.preventDefault();
      jQuery('.products_file_area').append('<input type="file" class="images_file" name="images[]" />');
   });

   jQuery('.p_image a').on('click', function(){
   	if(confirm('Deseja excluir esta foto?')){
      jQuery(this).parent().remove();
   	}
   });

   //mask inputs valores
    $(".valor").mask('000.000.000.000.000,00', { reverse: true });
    //

    $(".money").maskMoney({prefix:'', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});

   //formata campos de data 
   $('body').on('focus',".datepicker", function(){
         jQuery(this).mask('00/00/0000');
         $(this).datepicker({dateFormat: 'yy/mm/dd',
            language: 'pt-br',
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
            changeMonth: true,
            changeYear: true,
            viewMode: 'years',
            format: 'dd/mm/yyyy',
            autoclose: true,
            orientation: 'bottom'
         });
   });

   $("#user_c_password").keyup(function(){
      var password = $("#user_password").val();
      var password_confirm = $(this).val();

      if(password_confirm !== undefined && password !== password_confirm){
          $("#img_aviso_confirm").css('display', 'none');
          $("#aviso").css('color', '#a94442');
          $("#aviso").css('display', 'block');
      }else {
         if(password_confirm !== ''){
            $("#aviso").css('display', 'none');
            $("#img_aviso_confirm").css('display', 'block');
         }
      }
   });

   $("#user_password").keyup(function(){
         var password = $(this).val().length;
         if(password !== '' && password < '6' ){
            $("#img_aviso").css('display', 'none');
            $(".aviso_senha").css('color', '#a94442');
            $(".aviso_senha").css('display', 'block');
         } else {
            if(password !== ''){
               $(".aviso_senha").css('display', 'none');
               $("#img_aviso").css('display', 'block');
            }
         }
   });
   
$('#busca').on('keyup', function(){
   var datatype = $(this).attr('data-type');
   var q = $(this).val();

   if(datatype != '') {
      $.ajax({
         url:BASE_URL+'ajax/'+datatype,
         type:'GET',
         data:{q:q},
         dataType:'json',
         sucess:function(json) {

         }
      });
}

function selectInstallments(id){
   if(id != ''){
      if($('.payment_select_'+id+'').is(':visible')){
         $('#user_payment'+id+'').val('');
         $('.user_installments'+id+'').css('display', 'none');
         $('#user_installments'+id+'').css('display', 'none');
      } else {
         $('.user_installments'+id+'').css('display', 'block');
         $('#user_installments'+id+'').css('display', 'block');
      }
   }
}

function qtdInstallments(id){
   let parc = $('.payment_select_'+id+'').val();

   $('#user_payment'+id+'').val(parc);
}

});

});
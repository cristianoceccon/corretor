<?php
if(!isset($errorItems)){
    $errorItems = array();
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Páginas
        
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form action="<?php echo BASE_URL."pages/add_action"?>" method="POST">
            <div class="box">
        	    <div class="box-header">
        		    <h3 class="box-title">Nova Página</h3>
        		    <div class="box-tools">
        			   <input type="submit" class="btn btn-success" value="Salvar">
        		    </div>
        	    </div>
        	    <div class="box-body">
        		    <div class="form-group <?php echo (in_array('title', $errorItems))?'has-error':'';?>">
                        <label for="page_title">Nome da Página</label>
                        <input type="text" name="title" class="form-control" id="page_title">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('title', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>
                    <div class="form-group">
                        <label for="page_title">Corpo da página</label>
                        <textarea id="page_body" name="body"></textarea>
                    </div>
        	    </div>
            </div>	
        </form>
    </section>
    
    <script src="https://cdn.tiny.cloud/1/0og1f3baxayusqdv69zraoarpy2j38edqeutp5s2rtk3udwt/tinymce/5/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector:'#page_body',
            height:500,
            menubar:false,
            plugins:[
              'textcolor image media lists'
            ],
            toolbar:'undo redo | formatselect | bold italic backcolor | media image | alignleft aligncenter alignright alignjustify | bullist numlist | removeformat',
            automatic_uploads:true,
            file_picker_types:'images',
            images_upload_url:'<?php echo BASE_URL; ?>pages/upload'
        });
    </script>
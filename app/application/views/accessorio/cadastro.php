<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Cadastro de Accessório</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-8 offset-md-2 col-xs-12">
            <!---Card--->
            <div class="card">
                <h3 class="card-header bg-transparent"> <i class="fas fa-edit"></i>Formulário de Accessório</h3>
                <div class="card-body">
                    <?php echo validation_errors(); ?>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <?php
                        //Mensagem
                        echo ($this->session->flashdata('mensagem')) ? $this->session->flashdata('mensagem') : '';
                        ?>
                        <input type="hidden" name="id" id="id">
                        <!--Campo Nome-->
                        <div>
                            <label for="descricao">Descrição</label>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo set_value('descricao') ?>">
                            </div>
                        </div>
                        <!--Campo Preço-->
                        <div>
                            <label for="preco">Preço</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">R$</div>
                                </div>
                                <input type="text" class="money form-control" id="preco" name="preco" maxlength="13" value="<?php echo set_value('preco') ?>">
                            </div>
                        </div>
                        <!--Campo file-->
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01"><i class="fas fa-image"></i></span>
                            </div>
                            <div class="custom-file">
                                <label class="custom-file-label" for="imagem">Escolha arquivo</label>
                                <input type="file" class="custom-file-input" id="imagem" name="imagem" accept="image/jpg, image/jpeg, image/png">
                            </div>
                        </div>
                        <hr>
                        <img src="" id="view" name="imagemns" width="100" style="max-height:100px" /> <br><br>
                        <!--Button-->
                        <div class="text-center">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Enviar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
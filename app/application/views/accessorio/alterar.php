<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Alteração de Accessório</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-8 offset-md-2 col-xs-12">
            <!---Card--->
            <div class="card">
                <h3 class="card-header bg-transparent"> <i class="fas fa-edit"></i>Alteração de Accessório</h3>
                <div class="card-body">
                    <?php echo validation_errors(); ?>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <?php
                        //Mensagem
                        echo ($this->session->flashdata('mensagem')) ? $this->session->flashdata('mensagem') : '';
                        ?>
                        <input type="hidden" name="id" id="id" value="<?= isset($access) ? $access->id : ''; ?>">
                        <!--Campo Nome-->
                        <div>
                            <label for="descricao">Descrição</label>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" id="descricao" name="descricao" value="<?= (isset($access)) ? $access->descricao : ''; ?>">
                            </div>
                        </div>
                         <!--Campo Preço-->
                         <div>
                            <label for="preco">Preço</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">R$</div>
                                </div>
                                <input type="text" class="money form-control" id="preco" name="preco" value="<?= (isset($access)) ? $access->preco : ''; ?>">
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
                        <?php
                        if (!empty($access->imagem) && file_exists('./public/uploads/' . $access->imagem)) {
                            echo '<img src="' . base_url('./public/uploads/' . $access->imagem) . '" width="100" height="100">';
                        }
                        ?>
                        to
                        <img src="" id="view" name="imagemns" width="100" style="max-height:100px" />
                        <p>
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
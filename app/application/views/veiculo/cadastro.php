<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Cadastro de Veículo</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-8 offset-md-2 col-xs-12">
            <div class="card">
                <h3 class="card-header bg-transparent"> <i class="fas fa-edit"></i>Formulário de Veículo</h3>
                <div class="card-body">
                    <?php echo validation_errors(); ?>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <?php
                        //Mensagem
                        echo ($this->session->flashdata('mensagem')) ? $this->session->flashdata('mensagem') : '';
                        ?>
                        <input type="hidden" name="id" id="id">
                        <!--Modelo-->
                        <div>
                            <label for="id_modelo">Modelo</label>
                            <div class="input-group mb-2">
                                <select id="id_modelo" name="id_modelo" class="form-control">
                                    <option value="">Seleciona uma Modelo</option>
                                    <?php
                                    if (count($modelo) > 0) {
                                        foreach ($modelo as $m) {
                                            echo '<option value="' . $m->id . '" ' . set_select('id_modelo', $m->id) . ' >' . $m->nome . '</option>';
                                        }
                                    } else {
                                        echo '<option value="">Nenhuma Modelo cadastrada.</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!--Marca-->
                        <div>
                            <label for="id_marca">Marca</label>
                            <div class="input-group mb-2">
                                <select id="id_marca" name="id_marca" class="form-control">
                                    <option value="">Seleciona uma Marca</option>
                                    <?php
                                    if (count($marca) > 0) {
                                        foreach ($marca as $mc) {
                                            echo '<option value="' . $mc->id . '" ' . set_select('id_marca', $mc->id) . ' >' . $mc->nome . '</option>';
                                        }
                                    } else {
                                        echo '<option value="">Nenhuma Marca cadastrada.</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!--Cor-->
                        <div>
                            <label for="id_cor">Cor</label>
                            <div class="input-group mb-2">
                                <select id="id_cor" name="id_cor" class="form-control">
                                    <option value="">Seleciona uma Cor</option>
                                    <?php
                                    if (count($cor) > 0) {
                                        foreach ($cor as $c) {
                                            echo '<option value="' . $c->id . '" ' . set_select('id_cor', $c->id) . ' >' . $c->descricao . '</option>';
                                        }
                                    } else {
                                        echo '<option value="">Nenhuma Cor cadastrada.</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!--Preço-->
                        <div>
                            <label for="preco">Preço</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">R$</div>
                                </div>
                                <input type="text" class="money form-control" id="preco" name="preco" maxlength="13" value="<?php echo set_value('preco') ?>">
                            </div>
                        </div>
                        <!--Ano-->
                        <div>
                            <label for="ano">Ano</label>
                            <div class="input-group mb-2">
                                <input type="text" class="year form-control" id="ano" name="ano" value="<?php echo set_value('ano') ?>">
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
                        <!--Campo text area-->
                        <textarea id="texto" name="texto" placeholder="Digite seu texto aqui . . ."></textarea>
                        <br>
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
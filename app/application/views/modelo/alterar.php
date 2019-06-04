<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Alteração de Modelo</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-8 offset-md-2 col-xs-12">
            <!---Card--->
            <div class="card">
                <h3 class="card-header bg-transparent"> <i class="fas fa-edit"></i>Alteração de Modelo</h3>
                <div class="card-body">
                    <?php echo validation_errors(); ?>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <?php
                        //Mensagem
                        echo ($this->session->flashdata('mensagem')) ? $this->session->flashdata('mensagem') : '';
                        ?>
                        <input type="hidden" name="id" id="id" value="<?= isset($modelo) ? $modelo->id : ''; ?>">
                        <!--Marca-->
                        <div>
                            <label for="id_marca">Marca</label>
                            <div class="input-group mb-2">
                                <select id="id_marca" name="id_marca" class="form-control">
                                    <option value="">Seleciona uma Marca</option>
                                    <?php
                                    if (count($marca) > 0) {
                                        foreach ($marca as $m) {
                                            echo '<option ' . ($modelo->cd_marca == $m->id ? 'selected' : null) . ' value="' . $m->id . '">' . $m->nome . '</option>';
                                        }
                                    } else {
                                        echo '<option value="">Nenhuma Marca cadastrada.</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!--Modelo-->
                        <div>
                            <label for="modelo">Modelo</label>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" id="modelo" name="modelo" value="<?= isset($modelo) ? $modelo->nome : ''; ?>">
                            </div>
                        </div>
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
<div class="row">
    <div class="col-md-4">
        <div class="card-deck">
            <div class="card">
                <?php
                if (!empty($veiculo->imagem) && file_exists('./public/uploads/' . $veiculo->imagem)) {
                    echo '<img src="' . base_url('./public/uploads/' . $veiculo->imagem) . '" class="card-img-top" height="250px">';
                }
                ?>
                <div class="card-body">
                    <h5 class="card-title">Modelo:<?= $veiculo->modelo ?></h5>
                    <p class="card-text">Marca: <?= $veiculo->marca ?> </p>
                    <p class="card-text">Cor: <?= $veiculo->cor ?> </p>
                    <p class="card-text">R$: <?= number_format($veiculo->preco, 2, ',', '.') ?> </p>
                    <p class="card-text">Ano: <?= $veiculo->ano ?> </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <h3 class="card-header bg-transparent"> <i class="fas fa-edit"></i>Formulário do Pedido</h3>
            <div class="card-body">
                <?php echo validation_errors(); ?>
                <form method="POST" action="">
                    <?php
                    //Mensagem
                    echo ($this->session->flashdata('mensagem')) ? $this->session->flashdata('mensagem') : '';
                    ?>
                    <input type="hidden" name="id" id="id">
                    <!--Modelo-->
                    <div>
                        <label for="paga">Forma de Pagamento</label>
                        <div class="input-group mb-2">
                            <select id="paga" name="paga" class="form-control">
                                <option value="">Seleciona</option>
                                <?php
                                if (count($paga) > 0) {
                                    foreach ($paga as $p) {
                                        echo '<option value="' . $p->id . '" ' . set_select('paga', $p->id) . ' >' . $p->descricao . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <!--CPF-->
                    <div>
                        <label for="cpf">CPF</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo set_value('cpf') ?>">
                        </div>
                    </div>
                    <!--RG-->
                    <div>
                        <label for="rg">RG</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" id="rg" name="rg" value="<?php echo set_value('rg') ?>">
                        </div>
                    </div>
                    <!--telefone-->
                    <div>
                        <label for="telefone">Telefone</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo set_value('telefone') ?>">
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
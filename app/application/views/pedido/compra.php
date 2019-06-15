<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Lista de Compra</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col">
            <h3 class="card-header bg-transparent"><i class="fas fa-list-alt"></i> Lista de Compra</h3>
            <?php
            //Mensagem
            echo ($this->session->flashdata('mensagem')) ? $this->session->flashdata('mensagem') : '';
            ?>
            <div class="table-responsive">
                <table class="table table-dark table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Forma de Pagamento</th>
                            <th scope="col">Veículos</th>
                            <th scope="col">Acessórios</th>
                            <th scope="col">Nome</th>
                            <th scope="col">CPF</th>
                            <th scope="col">RG</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (count($compra) > 0) {
                            foreach ($compra as $c) {
                                if ($this->session->userdata('idUsuario') == $c->cd_usuario) {
                                    echo '<tr class="text-center">';
                                    echo '<td>' . $c->descricao . '</td>';
                                    if ($c->veiculo != NULL) {
                                        echo '<td><img src="' . base_url('public/uploads/' . $c->veiculo) . '" width="50"></td>';
                                    } else {
                                        echo '<td>' . '</td>';
                                    }
                                    if ($c->acessorio != NULL) {
                                        echo '<td><img src="' . base_url('public/uploads/' . $c->acessorio) . '" width="50"></td>';
                                    } else {
                                        echo '<td>' . '</td>';
                                    }
                                    echo '<td>' . $c->username . '</td>';
                                    echo '<td>' . $c->cpf . '</td>';
                                    echo '<td>' . $c->rg . '</td>';
                                    echo '<td>' . $c->telefone . '</td>';
                                    echo '<td>' . $c->data_pedido . '</td>';
                                }
                            }
                        } else {
                            echo '<tr><td colspan="9">Nenhum Compra efetuada</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
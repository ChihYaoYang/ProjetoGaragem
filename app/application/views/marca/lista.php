<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Lista de Marca</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col">
            <h3 class="card-header bg-transparent"><i class="fas fa-list-alt"></i> Lista de Marca</h3>
            <?php
            //Mensagem
            echo ($this->session->flashdata('mensagem')) ? $this->session->flashdata('mensagem') : '';
            ?>
            <div class="table-responsive">
                <table class="table table-dark table-bordered">
                    <br>
                    <a class="btn btn-success mr-1" href="<?= base_url('Veiculo/cadastrar') ?>"><i class="fas fa-plus"></i> Add Veículo</a>
                    <a class="btn btn-primary mr-1" href="<?= base_url('Marca/cadastrar') ?>"><i class="fas fa-plus"></i> Add Marca</a>
                    <a class="btn btn-info mr-1" href="<?= base_url('Modelo/cadastrar') ?>"><i class="fas fa-plus"></i> Add Modelo</a>
                    <a class="btn btn-success" href="<?= base_url('Cor/cadastrar') ?>"><i class="fas fa-plus"></i> Add Cor</a>
                    <hr>
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Marca</th>
                            <th scope="col">Opção</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (count($marca) > 0) {
                            foreach ($marca as $m) {
                                echo '<tr class="text-center">';
                                //Nome da DB
                                echo '<td>' . $m->nome . '</td>';
                                echo '<td class="text-right">' . '<a class="btn btn-sm btn-outline-danger mr-2 delete" href="' . base_url('Marca/deletar/' . $m->id) . '"><i class="fas fa-trash-alt"></i> Delete</a>' .
                                '<a class="btn btn-sm btn-outline-warning" href="' . base_url('Marca/alterar/' . $m->id) . '"><i class="fas fa-edit"></i> Alterar</a>'
                                . '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="2">Nenhum Marca cadastrado</td></tr>';
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="row">Total de Marca</th>
                            <td colspan="2" class="text-right"><?php echo $total; ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
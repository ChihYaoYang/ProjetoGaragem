<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Lista de Accessório</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col">
            <h3 class="card-header bg-transparent"><i class="fas fa-list-alt"></i> Lista de Accessório</h3>
            <?php
            //Mensagem
            echo ($this->session->flashdata('mensagem')) ? $this->session->flashdata('mensagem') : '';
            ?>
            <div class="table-responsive">
                <table class="table table-dark table-bordered">
                <br>
                    <a class="btn btn-success mr-1" href="<?= base_url('Accessorio/cadastrar') ?>"><i class="fas fa-plus"></i> Add Accessório</a>
                    <hr>
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Imagem</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Opção</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (count($access) > 0) {
                            foreach ($access as $ac) {
                                echo '<tr class="text-center">';
                                echo '<td><img src="' . base_url('public/uploads/' . $ac->imagem) . '" width="50"></td>';
                                echo '<td>' . $ac->descricao . '</td>';
                                echo '<td>R$ ' . number_format($ac->preco, 2, ',', '.') . '</td>';
                                echo '<td class="text-right">' . '<a class="btn btn-sm btn-outline-danger mr-2 delete" href="' . base_url('Accessorio/deletar/' . $ac->id) . '"><i class="fas fa-trash-alt"></i> Delete</a>' .
                                '<a class="btn btn-sm btn-outline-warning" href="' . base_url('Accessorio/alterar/' . $ac->id) . '"><i class="fas fa-edit"></i> Alterar</a>'
                                . '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="4">Nenhum Accessório cadastrado</td></tr>';
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="row">Total de Accessório</th>
                            <td colspan="4" class="text-right"><?php echo $total; ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Perfil de Usuário</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-8 offset-md-2 col-xs-12">
            <!---Card--->
            <div class="card">
                <h3 class="card-header bg-transparent"> <i class="fas fa-edit"></i>Perfil de Usuário</h3>
                <div class="card-body">
                    <?php
                    //Mensagem
                    echo ($this->session->flashdata('mensagem')) ? $this->session->flashdata('mensagem') : '';
                    ?>
                    <div class="table-responsive">
                        <table class="table table-dark table-bordered semdatable">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Opção</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                echo '<tr class="text-center">';
                                echo '<td>' . $this->session->userdata('nome') . '</td>';
                                echo '<td>' . $this->session->userdata('email') . '</td>';
                                echo '<td class="text-right">';
                                echo '<a class="btn btn-sm btn-outline-warning" href="' . base_url() . 'User/alterar/' . $this->session->userdata('idUsuario') . '"><i class="fas fa-edit"></i> Alterar</a>' . '</td>';
                                echo '</tr>';
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Alteração da User</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col">
            <div class="col-md-8 offset-md-2 col-xs-12">
                <!---Card--->
                <div class="card">
                    <h3 class="card-header bg-transparent"><i class="fas fa-edit"></i>Alteração da User</h3>
                    <div class="card-body">
                        <?php echo validation_errors(); ?>
                        <form method="POST" action="">
                            <?php
                            //Mensagem
                            echo ($this->session->flashdata('mensagem')) ? $this->session->flashdata('mensagem') : '';
                            ?>
                            <!--$data['prova'] controller-->
                            <input type="hidden" name="id" id="id" value="">

                            <div>
                                <label for="nome">Nome</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-users"></i></div>
                                    </div>
                                    <input type="text" class="form-control" name="nome" id="nome" value="<?= isset($user) ? $user->nome : ''; ?>">
                                </div>
                            </div>

                            <div>
                                <label for="senha">Senha</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-key"></i></div>
                                    </div>
                                    <input type="password" class="form-control" name="senha" id="senha" value="">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
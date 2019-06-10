<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Fale Conosco</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col">
            <?php
            //Mensagem
            echo ($this->session->flashdata('mensagem')) ? $this->session->flashdata('mensagem') : '';
            ?>
            <?php echo validation_errors() ?>
            <form method="POST" action="">
                <!--Campo Email-->
                <div>
                    <label for="nome">Nome</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-user-alt"></i></div>
                        </div>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo set_value('nome') ?>">
                    </div>
                </div>
                <!--Campo Email-->
                <div>
                    <label for="email">E-mail</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                        </div>
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email') ?>">
                    </div>
                </div>
                <!--Texto-->
                <div class="form-group">
                    <textarea class="form-control" id="texto" name="texto" rows="3" placeholder="Digite seu mensagem aqui . . ."></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Enviar</button>
                </div>
                <br>
            </form>
        </div>
    </div>
</div>
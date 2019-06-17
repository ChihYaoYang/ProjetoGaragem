<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!---Bootstrap CSS--->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/CSS/bootstrap.css'); ?>">
        <!--Fontawesome--->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <!--Login-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/CSS/login.css'); ?>">
        <!--Icone-->
        <link rel="icon" href="<?php echo base_url('/assets/logo/ico.png'); ?>" type="image/x-icon" />
        <link rel="shortcut icon" href="<?php echo base_url('/assets/logo/ico.png'); ?>" type="image/x-icon" />
        <title>Register</title>
    </head>

    <body>
        <div class="container mt-5">
            <div class="card mx-auto box" style="max-width: 450px; background: #000000;">
                <a class="btn btn-light back" href="<?= base_url() . 'Usuario/login' ?>"><i class="fas fa-arrow-left"></i> Back</a>
                <br>
                <h2 class="text-uppercase text-center"><i class="far fa-envelope"></i> Forgot password ?</h2>
                <div class="card-body">
                    <?php
                    //Mensagem
                    echo ($this->session->flashdata('mensagem')) ? $this->session->flashdata('mensagem') : '';
                    ?>
                    <?php echo validation_errors() ?>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <input type="email" name="email" id="email" placeholder="Digite seu Email" value="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="">
                        <div class="text-center">
                            <button type="submit">Enviar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!--Bootstrap-->
        <script type='text/javascript' src="<?php echo base_url('/assets/JS/bootstrap1.js'); ?>"></script>
        <script type='text/javascript' src="<?php echo base_url('/assets/JS/bootstrap2.js'); ?>"></script>
        <script type='text/javascript' src="<?php echo base_url('/assets/JS/bootstrap3.js'); ?>"></script>
    </body>

</html>
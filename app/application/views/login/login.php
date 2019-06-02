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
    <title>Login de Usuário</title>
</head>

<body>
    <div class="container mt-5">
        <div class="card mx-auto box" style="max-width: 450px; background: #000000;">
        <br>
            <h1 class="text-uppercase text-center"><i class="far fa-user"></i> Login</h1>
            <div class="card-body text-center">
                <?php
                //Mensagem
                echo ($this->session->flashdata('mensagem')) ? $this->session->flashdata('mensagem') : '';
                ?>
                <?php echo validation_errors() ?>
                <form method="POST" action="" name="login">
                    <input type="text" name="email" id="email" placeholder="Email or Username" required="">
                    <input type="password" name="senha" id="senha" placeholder="Password" required="">
                    <div class="text-center">
                        <a href="<?= base_url() . 'Usuario/cadastrar' ?>">Register</a>
                        <a href="">Forgot password ?</a>
                    </div>
                    <button type="submit">Acessar</button>
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
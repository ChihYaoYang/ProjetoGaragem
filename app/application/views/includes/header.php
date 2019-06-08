<!DOCTYPE html>
<html>

<head>
    <title>VendCar</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/CSS/bootstrap.css'); ?>">
    <!--Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!--Confirmation-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/CSS/confirmation.css'); ?>">
    <!--Menu-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/CSS/menu.css'); ?>">
    <!--Caousel CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/CSS/carrousel.css'); ?>">
    
</head>

<body>
    <!--Menu Cliente-->
    <nav class="navbar navbar-dark navbar-expand-md sticky-top" style="background:#7ed6df;">
        <a class="navbar-brand" href="<?= base_url() ?>"><img src="<?php echo base_url('/assets/logo/logo.svg'); ?>" class="img-fluid" alt="logomarca"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse-side" data-target-sidebar=".side-collapse-right" data-target-content=".side-collapse-container-right" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
        if ($this->session->userdata('status') == 0 || $this->session->userdata('status') == 2) {
            ?>
            <div class="navbar-collapse side-collapse-right in menu">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active mr-2"><a class="nav-link" href="<?= base_url() ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('Home/veiculo') ?>">Veículo</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('Home/accessorio') ?>">Acessório</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Fale Conosco</a></li>
                </ul>
            <?php
        } else {
            ?>
                <!---Menu Admin--->
                <div class="navbar-collapse side-collapse-right in menu">
                    <ul class="navbar-nav mr-auto">
                        <!--Cadastro Veículo--->
                        <li class="nav-item dropdown">
                            <a href="#" id="menuCliente" class="nav-link dropdown-toggle text-light" data-toggle="dropdown">Automóvel</a>
                            <div class="dropdown-menu" aria-labelledby="menuCliente">
                                <a href="<?= base_url('Home/veiculo') ?>" class="dropdown-item"><i class="fas fa-list-ul"></i> Automóvel</a>
                                <a href="<?= base_url() . 'Veiculo/index' ?>" class="dropdown-item"><i class="fas fa-list-ul"></i> Veículo</a>
                                <a href="<?= base_url() . 'Marca/index' ?>" class="dropdown-item"><i class="fas fa-list-ul"></i> Marca</a>
                                <a href="<?= base_url() . 'Modelo/index' ?>" class="dropdown-item"><i class="fas fa-list-ul"></i> Modelo</a>
                                <a href="<?= base_url() . 'Cor/index' ?>" class="dropdown-item"><i class="fas fa-list-ul"></i> Cor</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" id="menuCliente" class="nav-link dropdown-toggle text-light" data-toggle="dropdown">Accessório</a>
                            <div class="dropdown-menu" aria-labelledby="menuCliente">
                            <a href="<?= base_url('Home/accessorio') ?>" class="dropdown-item"><i class="fas fa-list-ul"></i> Acessório</a>
                                <a href="<?= base_url() . 'Accessorio/index' ?>" class="dropdown-item"><i class="fas fa-list-ul"></i> Lista</a>
                            </div>
                        </li>
                    </ul>
                <?php }
            ?>
                <ul class="navbar-nav justify-content-end">
                    <?php
                    if ($this->session->userdata('idUsuario') <= 0) {
                        echo '<li class="nav-item"><a class="nav-link" href="' . base_url('Usuario/login') . '">Login</a></li>';
                    } else {
                        ?>
                        <li class="nav-item dropdown pull-left">
                            <a href="#" id="menu" class="nav-link dropdown-toggle text-light" data-toggle="dropdown"><i class="fas fa-user"></i> <?= $this->session->userdata('nome'); ?></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="menu">
                                <a class="dropdown-item" href="#">選單1</a>
                                <?php
                                if ($this->session->userdata('status') == '1') {
                                    echo '<a class = "dropdown-item" href="' . base_url('Veiculo/index') . '">Gerenciar Dados</a>';
                                } else {
                                    echo '';
                                }
                                ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url() . 'Usuario/sair' ?>"><i class="fas fa-sign-out-alt"></i> Sair</a>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
    </nav>
    <!--Conteudo-->
    <div class="container-fluid side-collapse-container-right">
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
</head>

<body>
    <!--Menu-->
    <nav class="navbar navbar-dark navbar-expand-md sticky-top" style="background:#64DD17;">
        <a class="navbar-brand" href="#"><img src="<?php echo base_url('/assets/logo/logo.svg'); ?>" class="img-fluid" alt="logomarca"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse-side" data-target-sidebar=".side-collapse-right" data-target-content=".side-collapse-container-right" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse side-collapse-right in menu">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active mr-2"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Veículo</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Acessório</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Fale Conosco</a></li>
            </ul>
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item dropdown pull-left">
                    <a href="#" id="menu" class="nav-link dropdown-toggle text-light" data-toggle="dropdown">Login</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="menu">
                        <a class="dropdown-item" href="#">選單1</a>
                        <a class="dropdown-item" href="#">選單1</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">選單3</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!--Conteudo-->
    <div class="container side-collapse-container-right">
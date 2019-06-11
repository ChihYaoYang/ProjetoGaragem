<div class="row">
    <div class="col">
        <div class="shutter">
            <div class="shutter-img">
                <a href="#"><img src="https://img.ibxk.com.br//2018/08/29/29194642940337-t1200x480.jpg" alt="#"></a>
                <a href="#"><img src="http://www.automotivamotors.com.br/imagens/automotivamotors-banner.jpg" alt="#"></a>
                <a href="#"><img src="http://blog.mixauto.com.br/wp-content/uploads/sites/2/2017/02/guia-compras-acessorios-automotivos.jpg" alt="#"></a>
                <a href="#"><img src="https://draftbox.com.br/dbsite/wp-content/uploads/2019/03/Marketing-Digital-para-o-Mercado-Automotivo.jpg" alt="#"></a>                
            </div>
            <ul class="shutter-btn">
                <li class="prev"></li>
                <li class="next"></li>
            </ul>
        </div>
    </div>
</div>
<div class="row mt-5 back">
    <div class="col-md-6">
        <img src="<?php echo base_url('/assets/logo/logo.svg'); ?>" class="img-fluid" alt="logomarca">
    </div>
    <div class="col-md-6">
        <h3 class="text-justify text-light">VendCar</h3>
        <p>VendCar site de vendas, em geral vendas de veículo e acessório(peças) em geral manutenção de Carros novos. . .
            <br><br><br><br><br><br><br><br><br><br><br></p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h2 class="text-center text-info">Estoque</h2>
        <hr>
    </div>
    <?php
    $i = 0;
    foreach ($veiculo as $v) {
        if ($i++ == 3)
            break;
        echo '<div class="col-md-4">';
        echo '<div class="card mb-4">';
        echo '<img src="' . base_url('public/uploads/' . $v->imagem) . '" class="card-img-top" height="250px">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">Modelo: ' . $v->modelo . '</h5>';
        echo '<p class="card-text">Marca: ' . $v->marca . '</p>';
        echo '<p class="card-text">Cor: ' . $v->cor . '</p>';
        echo '<p class="card-text">R$: ' . number_format($v->preco, 2, ',', '.') . '</p>';
        echo '<p class="card-text">Ano: ' . $v->ano . '</p>';
        if ($this->session->userdata('status') == 1 || $this->session->userdata('status') == 2) {
            echo '<a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Comprar</a>';
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    ?>
    <div class="col text-center">
        <a href="<?= base_url('Home/veiculo') ?>" class="btn btn-info">Show More . . .</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <hr>
        <h2 class="text-center text-info">? ? ?</h2>
    </div>
</div>
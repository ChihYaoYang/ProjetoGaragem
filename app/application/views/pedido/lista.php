<?php
//var_dump($veiculo);
//exit;
?>
<div class="row">
    <div class="card-deck">
        <div class="card">
            <?php
            if (!empty($veiculo->imagem) && file_exists('./public/uploads/' . $veiculo->imagem)) {
                echo '<img src="' . base_url('./public/uploads/' . $veiculo->imagem) . '" class="card-img-top" height="250px">';
            }
            ?>
            <div class="card-body">
                <h5 class="card-title">Modelo:<?= $veiculo->cd_modelo ?></h5>
                <p class="card-text">Marca: <?= $veiculo->cd_marca ?> </p>
                <p class="card-text">Cor: <?= $veiculo->cd_cor ?> </p>
                <p class="card-text">R$: <?= number_format($veiculo->preco, 2, ',', '.') ?> </p>
                <p class="card-text">Ano: <?= $veiculo->ano ?> </p>
            </div>
        </div>
    </div>
</div>
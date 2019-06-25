<div class="row">
    <div class="col-md-4">
        <div class="card-deck">
            <div class="card">
                <?php
                if (!empty($veiculo->imagem) && file_exists('./public/uploads/' . $veiculo->imagem)) {
                    echo '<img src="' . base_url('./public/uploads/' . $veiculo->imagem) . '" class="card-img-top" height="250px">';
                }
                ?>
                <div class="card-body">
                    <h5 class="card-title">Modelo:<?= $veiculo->modelo ?></h5>
                    <p class="card-text">Marca: <?= $veiculo->marca ?> </p>
                    <p class="card-text">Cor: <?= $veiculo->cor ?> </p>
                    <p class="card-text">R$: <?= number_format($veiculo->preco, 2, ',', '.') ?> </p>
                    <p class="card-text">Ano: <?= $veiculo->ano ?> </p>
                </div>
            </div>
        </div>
    </div>
</div>
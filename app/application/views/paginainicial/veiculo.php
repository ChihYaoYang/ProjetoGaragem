<div class="row">
    <div class="col-md-12">
        <h2 class="text-center text-info">Estoque</h2>
        <hr>
    </div>
    <?php
    foreach ($veiculo as $v) {
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
</div>
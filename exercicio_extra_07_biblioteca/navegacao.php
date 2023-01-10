<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">

        <span class="navbar-brand text-warning" href="index.php">Biblioteca</span>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">

                <!-- Home -->
                <?php
                if ($nome_pagina == 'home') { ?>
                    <li class="navbar-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                <?php } else { ?>
                    <li class="navbar-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                <?php } ?>

                <!-- Livros -->
                <?php
                if ($nome_pagina == 'livros') { ?>
                    <li class="navbar-item">
                        <a class="nav-link active" aria-current="page" href="livros.php">Livros</a>
                    </li>
                <?php } else { ?>
                    <li class="navbar-item">
                        <a class="nav-link" href="livros.php">Livros</a>
                    </li>
                <?php } ?>

                <!-- Visualizar Livros -->
                <?php
                if ($nome_pagina == 'visualizar_livros') { ?>
                    <li class="navbar-item">
                        <a class="nav-link text-warning fs-6" aria-current="page" href="livros.php">Voltar</a>
                    </li>
                <?php } ?>

            </ul>
        </div>
    </div>
</nav>
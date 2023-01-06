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

                <!-- Cadastro -->
                <?php
                if ($nome_pagina == 'cadastro') { ?>
                    <li class="navbar-item">
                        <a class="nav-link active" aria-current="page" href="cadastro.php">Cadastro</a>
                    </li>
                <?php } else { ?>
                    <li class="navbar-item">
                        <a class="nav-link" href="cadastro.php">Cadastro</a>
                    </li>
                <?php } ?>

            </ul>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        
        <span class="navbar-brand text-warning" href="index.php">Financeiro</span>

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

                <!-- Receita -->
                <?php
                if ($nome_pagina == 'receita') { ?>
                    <li class="navbar-item">
                        <a class="nav-link active" aria-current="page" href="lista_receita.php">Receita</a>
                    </li>
                <?php } else { ?>
                    <li class="navbar-item">
                        <a class="nav-link" href="lista_receita.php">Receita</a>
                    </li>
                <?php } ?>

                <!-- Despesa -->
                <?php
                if ($nome_pagina == 'despesa') { ?>
                    <li class="navbar-item">
                        <a class="nav-link active" aria-current="page" href="lista_despesa.php">Despesa</a>
                    </li>
                <?php } else { ?>
                    <li class="navbar-item">
                        <a class="nav-link" href="lista_despesa.php">Despesa</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
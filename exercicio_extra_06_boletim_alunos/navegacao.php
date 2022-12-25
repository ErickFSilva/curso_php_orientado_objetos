<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-warning" href="#">Boletim Escolar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
                <li class="nav-item">
                    <?php if($pagina == 'home') { ?>
                        <a class="nav-link active" href="index.php">Home</a>
                    <?php } else { ?>
                        <a class="nav-link" href="index.php">Home</a>
                    <?php } ?>
                </li>

                <li class="nav-item">
                    <?php if($pagina == 'cadastrar') { ?>
                        <a class="nav-link active" href="cadastrar.php">Cadastrar</a>
                    <?php } else { ?>
                        <a class="nav-link" href="cadastrar.php">Cadastrar</a>
                    <?php } ?>
                </li>

            </ul>
        </div>
    </div>
</nav>
<!doctype html>
<html lang="pt-br">
    
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <title> DashBoard - Home </title>
        
        <link href="<?= URL ?>App/Views/templates/dist/css/bootstrap.css" rel="stylesheet">
        <link href="<?= URL ?>App/Views/templates/dist/css/dashboard.css" rel="stylesheet">
        <link href="<?= URL ?>App/Views/templates/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        
        <script src="<?= URL ?>/App/Views/templates/dist/js/jquery-3.6.0.min.js"></script>
        
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>
        
    </head>
    
    <body>
    
        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">SPF</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <input class="form-control form-control-dark w-100" type="text" placeholder="Pesquisar" aria-label="Search">
            <div class="navbar-nav">
                <div class="nav-item text-nowrap">
                    <a class="nav-link px-3" href="#">Sair</a>
                </div>
            </div>
        </header>

        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link <?= ($_SESSION['url'] == "home" ? "active" : "") ?>" aria-current="page" href="<?= URL ?>">
                                    <i class="bi bi-house-door"></i>
                                    Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= ($_SESSION['url'] == "caduser" ? "active" : "") ?>" href="<?= URL ?>adminDashBoard/usuarios">
                                    <i class="bi bi-person"></i>
                                    Novo Usuário
                                </a>
                            </li>                           
                        </ul>
                        
                        <ul class="nav flex-column mb-2">
                            <li class="nav-item">
                                <!--<a class="nav-link <?= ($_SESSION['url'] == "bancodados" ? "active" : "") ?>" href="<?= URL ?>configuracaoSistema/bancodados"> -->
                                <a class="nav-link <?= ($_SESSION['url'] == "confsistema" ? "active" : "") ?>" href="<?= URL ?>adminDashBoard/configuracaoSistema"> 
                                    <i class="bi bi-gear"></i>
                                    Configuração do Sistema
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                   


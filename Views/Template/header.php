<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Instituto Tecnológico "Don Bosquito"</title>
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>Assets/img/logodb2.png" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/style.default.css" id="theme-stylesheet">
    <!--<link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/bootstrap.min.css">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/coloresdetodo.css">
    <script src="<?php echo base_url(); ?>Assets/js/71152334c0.js"></script>
    <script src="<?php echo base_url(); ?>Assets/js/funciones2.js"></script>
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <style>
        .sidebar-dark-blue {
            background: #014ba0 !important;
        }
    </style>
    <style>
        .ul-blue-fast {
            background: #3b8eed !important;
        }
    </style>
    <style>
        .ul-button-navbar {
            background: #97bdf5 !important;
        }
    </style>

</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg sidebar-dark-blue">
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <div class="navbar-header">
                    <input type="hidden" id="url" value="<?php echo base_url(); ?>">
                    <!-- Navbar Header--><a href="<?php echo base_url(); ?>Admin/Listar" class="navbar-brand">
                        <div class="brand-text brand-big visible"><strong class="text-dark">Don Bosquito </strong>
                        </div>
                        <div class="brand-text brand-sm"><strong>D</strong><strong>B</strong></div>
                    </a>
                    <!-- Sidebar Toggle Btn-->
                    <button class="sidebar-toggle"><i class="fa-solid fa-bars"></i></button>
                </div>
                <div class="right-menu list-inline no-margin-bottom">
                    <h4 class="text-dark">Centro Infantil Instituto Tecnológico "Don Bosquito" <strong class="text-white">Bolivia, <?php echo date("d-M-Y") ?></strong></h4>
                </div>
                <!-- Log out               -->
                <div class="list-inline-item logout">
                    <button class="btn btn-black text-white" type="button" data-toggle="modal" data-target="#logout">Salir</button>
                </div>
            </div>
            </div>
        </nav>
    </header>
    <div class="d-flex align-items-stretch sidebar-dark-blue">
        <!-- Sidebar Navigation-->
        <nav id="sidebar" class="sidebar-dark-blue">
            <div class="sidebar-dark-blue">
                <!-- Sidebar Header-->
                <div class="sidebar-header d-flex align-items-center p-1">
                    <div class="avatar" data-toggle="modal" data-target="#cambiarPass"><img src="<?php echo base_url(); ?>/Assets/img/donbsales.png" alt="..." class="img-fluid rounded-circle"></div>
                    <div class="title">
                        <h5 class="h5 text-white"><?php echo $_SESSION['rol']; ?></h5>
                    </div>
                </div>
                <ul class="list-unstyled">
                    <li><a class="h6 text-dark" href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"><i class="fa-regular fa-folder-open"></i><strong class="text-white"> Registro Inscripción </strong></a>
                        <ul id="exampledropdownDropdown" class="collapse list-unstyled sidebar-dark-blue">
                            <li><a class="sidebar-dark-blue h5 text-white fw-bold" href="<?php echo base_url(); ?>regninos/Listar"><i class="fa-solid fa-children"></i> Datos de los niños</a></li>
                            <li><a class="sidebar-dark-blue h5 text-white fw-bold" href="<?php echo base_url(); ?>regapoderado/Listar"><i class="fa-solid fa-users"></i>Datos del apoderado</a></li>
                            <li><a class="sidebar-dark-blue h5 text-white fw-bold" href="<?php echo base_url(); ?>regcontacto/Listar"><i class="fa-solid fa-users"></i>Datos contacto de emergencia</a></li>
                            <li><a class="sidebar-dark-blue h5 text-white fw-bold" href="<?php echo base_url(); ?>documentos/Listar"><i class="fa-solid fa-folder-tree"></i> Documentos</a></li>
                            <li><a class="sidebar-dark-blue h5 text-white fw-bold" href="<?php echo base_url(); ?>inscripcion/Listar"><i class="fa-solid fa-folder"></i> Registro para inscripciòn</a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-dark-blue h6 text-dark" href="#exampledropdownDropdowns" aria-expanded="false" data-toggle="collapse"> <i class="fa-regular fa-folder-open"></i> <strong class="text-white"> Registro Académico</strong></a>
                        <ul id="exampledropdownDropdowns" class="collapse list-unstyled ">
                            <li><a class="sidebar-dark-blue h5 text-white fw-bold" href="<?php echo base_url(); ?>historial/Listar"><i class="fa-solid fa-user-doctor"></i>Historial Médico</a></li>
                            <li><a class="sidebar-dark-blue h5 text-white fw-bold" href="<?php echo base_url(); ?>resultadosarea/Listar"><i class="fa-solid fa-address-book"></i> Resultados por Áreas</a></li>
                            <li><a class=" sidebar-dark-blue h6 text-white fw-bold" href="<?php echo base_url(); ?>pensiones/Listar"> <i class="fa-solid fa-cash-register"></i> Pensiones</a></li>
                        </ul>
                    </li>
                    <?php if ($_SESSION['rol'] == "Administrador") { ?>
                        <li><a class="sidebar-dark-blue h6 text-dark" href="#expandeadministrador" aria-expanded="false" data-toggle="collapse"> <i class="fa-regular fa-folder-open"></i> <strong class="text-white"> Registro Académico</strong></a>
                        <ul id="expandeadministrador" class="collapse list-unstyled ">
                        <li><a class=" sidebar-dark-blue h6 text-white fw-bold" href="<?php echo base_url(); ?>docente/Listar"><i class="fa-solid fa-chalkboard-user"></i> Docentes</a></li>                        
                        <li><a class=" sidebar-dark-blue h6 text-white fw-bold" href="<?php echo base_url(); ?>salas/Listar"><i class="fa-solid fa-school-flag"></i>  Salas</a></li>                        
                        <li><a class=" sidebar-dark-blue h6 text-white fw-bold" href="<?php echo base_url(); ?>gestion/Listar"><i class="fa-regular fa-calendar-days"></i> Gestión</a></li>
                        <li><a class=" sidebar-dark-blue h6 text-white fw-bold" href="<?php echo base_url(); ?>catpago/Listar"><i class="fa-solid fa-hand-holding-dollar"></i>Cat. Pagos</a></li>
                        </ul>
                    </li>                        
                        <li><a class=" sidebar-dark-blue h6 text-dark fw-bold" href="<?php echo base_url(); ?>Usuarios/Listar"> <i class="fa-regular fa-user"></i> <strong class="text-white"> Usuarios </strong></a></li>
                    <?php } ?>

            </div>

        </nav>
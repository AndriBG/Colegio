<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Centro Educativo</title>
    <link href="<?= base_url(); ?>public/css/styles.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>public/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <script src="<?= base_url(); ?>public/js/all.min.js"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= base_url() ?>">Centro Educativo</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url("") ?>">Cursos</a>
                        </nav>
                    </div>
                    <div class="nav">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url("Subject") ?>">Materias</a>
                        </nav>
                    </div>
                    <div class="nav">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url("Student") ?>">Estudiantes</a>
                        </nav>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>

                <div class="container-fluid">

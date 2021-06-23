<?php

if (strlen(session_id()) < 1)
    session_start();
?>

<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    
    <!-- Bootstrap Select -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Font Awesome 4.7 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- DATATABLES -->
    <link rel="stylesheet" href="../public/DataTables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../public/DataTables/css/datatables.min.css">
    <link rel="stylesheet" href="../public/DataTables/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="../public/DataTables/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" href="../public/DataTables/css/select.dataTables.min.css">
    <link rel="stylesheet" href="../public/DataTables/css/colReorder.dataTables.min.css">
    <link rel="stylesheet" href="../public/DataTables/css/scroller.dataTables.min.css">
    <link rel="stylesheet" href="../public/DataTables/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="../public/DataTables/css/fixedColumns.dataTables.min.css">

    <title>Productos Konecta</title>
</head>

<body>
<!-- Menu Principal -->
<header class="header bg-dark">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark container">
  <div class="container-fluid">
    <a class="navbar-brand" href="productos.php">Konecta Productos</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="productos.php">Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="agregarProductos.php">Agregar Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="edicionProductos.php">Edición de Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categorias.php">Categorías</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>

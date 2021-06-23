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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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


    <!-- Bootstrap Select -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg==" crossorigin="anonymous" referrerpolicy="no-referrer" />    

    <title>Productos Konecta</title>
</head>

<body>
<!-- Menu Principal -->
<header class="header bg-dark">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark container">
  <div class="container-fluid">
    <a class="navbar-brand" href="productos.php">Konecta Productos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="productos.php">Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="agregarProductos.php">Agregar Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="agregar_categorias.php">Agregar Categorías</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>

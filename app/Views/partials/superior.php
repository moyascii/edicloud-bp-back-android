<?= view('partials/main', $headerData) ?>

<head>

  <!-- @@include("partials/title-meta.html", {"title": "Dashboard"}) -->
  <?= view('partials/title-meta', $headerData) ?>

  <!-- jsvectormap css -->
  <link href="<?= base_url('assets/libs/jsvectormap/css/jsvectormap.min.css') ?> " rel="stylesheet" type="text/css" />

  <!--Swiper slider css-->
  <link href="<?= base_url('assets/libs/swiper/swiper-bundle.min.css') ?>" rel="stylesheet" type="text/css" />

  <!-- @@include("partials/head-css.html") -->
  <?= view('partials/head-css') ?>

</head>

<body>

  <!-- Begin page -->
  <div id="layout-wrapper">

    <!-- Menú -->
    <?= view('partials/topbar', $user) ?>
    <?= view('partials/sidebar', $headerData) ?>
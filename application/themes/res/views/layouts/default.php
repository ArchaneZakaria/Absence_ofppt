<!DOCTYPE html>
<html lang="en">
  <head>
    <style media="screen">
    *{
      font-size:13px;
    }
    [class*="sidebar-dark"] .brand-link {
      border-bottom: 1px solid #957979c7 !important;
      color: rgba(255,255,255,.8) !important;
    }
    [class*="sidebar-dark"] .user-panel {
      border-bottom: 1px solid #957979c7 !important;
    }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> G.A | <?= $title ?></title>
    <!-- DataTables -->
    
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?=base_url('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?=base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?=base_url('assets/plugins/jqvmap/jqvmap.min.css')?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?=base_url('assets/plugins/summernote/summernote-bs4.css')?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- pace-progress -->
    <link rel="stylesheet" href="<?=base_url('assets/plugins/pace-progress/themes/black/pace-theme-flat-top.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/plugins/daterangepicker/daterangepicker.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/plugins/select2/css/select2.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')?>">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?=base_url('assets/plugins/fontawesome-free/css/all.min.css')?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?=base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url('assets/dist/css/adminlte.min.css')?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- REQUIRED SCRIPTS -->
    <!-- AdminLTE App -->
    <script src="<?=base_url('assets/dist/js/jquery.js')?>"></script>
    <script src="<?=base_url('assets/dist/js/adminlte.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/select2/js/select2.full.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/daterangepicker/daterangepicker.js')?>"></script>
    <!-- InputMask -->
    <script src="<?=base_url('assets/plugins/moment/moment.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js')?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?=base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')?>"></script>
    <!-- Bootstrap Switch -->
    <script src="<?=base_url('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')?>"></script>

    
    <!-- overlayScrollbars -->
    <script src="<?=base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')?>"></script>
    <!-- AdminLTE App -->

    <!-- OPTIONAL SCRIPTS -->
    <script src="<?=base_url('assets/dist/js/demo.js')?>"></script>
    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="<?=base_url('assets/plugins/jquery-mousewheel/jquery.mousewheel.js')?>"></script>
    <script src="<?=base_url('assets/plugins/raphael/raphael.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/jquery-mapael/jquery.mapael.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/jquery-mapael/maps/usa_states.min.js')?>"></script>
    <!-- ChartJS -->
    <script src="<?=base_url('assets/plugins/chart.js/Chart.min.js')?>"></script>
    <script>
      var base_url = '<?= base_url() ?>';
      var site_url = '<?= site_url() ?>';
    </script>

    <?php if (isset($template['metadata'])) echo $template['metadata']; ?>

  </head>
  <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    <?php if (isset($template['body'])) echo $template['body']; ?>

  </body>
  <!-- jQuery -->
  <script src="<?=base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
  <script src="<?=base_url('assets/dist/js/adminlte.js')?>"></script>
  <!-- Bootstrap -->
    <script src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  <link rel="stylesheet" href="<?=base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')?>">
  <!-- DataTables -->
  <script src="<?=base_url('assets/plugins/datatables/jquery.dataTables.js')?>"></script>
  <script src="<?=base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')?>"></script>
</html>

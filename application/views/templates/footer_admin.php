<?php $teks_footer = $this->db->get_where('data_teks', ['id' => 1])->row_array(); ?>
<?php $teks_versi = $this->db->get_where('data_teks', ['id' => 2])->row_array(); ?>
<footer class="main-footer">
	<b>© <?= date('Y') ?> <?= htmlentities($teks_footer['teks']) ?></b>
	<div class="float-right d-none d-sm-inline-block">
		<b>Version</b> <?= htmlentities($teks_versi['teks']) ?>
	</div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>vendor/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap-Iconpicker Bundle -->

<script type="text/javascript" src="<?= base_url() ?>vendor/icon-picker/dist/js/bootstrap-iconpicker.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>vendor/adminlte/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<!-- <script src="<?= base_url() ?>vendor/adminlte/plugins/sparklines/sparkline.js"></script> -->
<!-- JQVMap -->
<!-- <script src="<?= base_url() ?>vendor/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>vendor/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>vendor/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>vendor/adminlte/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>vendor/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>vendor/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>vendor/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>vendor/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>vendor/adminlte/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>vendor/adminlte/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?= base_url() ?>vendor/adminlte/dist/js/pages/dashboard.js"></script> -->

<script src="<?= base_url(); ?>vendor/sweetalert/sweetalert2.all.min.js"></script>

<script src="<?= base_url(); ?>vendor/tagify-master/dist/jQuery.tagify.min.js"></script>



</body>

</html>

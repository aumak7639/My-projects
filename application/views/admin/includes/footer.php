

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>BEST</b> Admin System | Version 1.0
        </div>
        <strong>Copyright &copy; 2020 <a href="<?php echo base_url(); ?>"><?=$this->config->item('app_name')?></a>.</strong> All rights reserved.
    </footer>
    <script src="<?php echo base_url(); ?>assets/admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/admin/dist/js/app.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/validation.js" type="text/javascript"></script>
	<link href="<?php echo base_url() ?>assets/admin/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
	<script src="<?php echo base_url() ?>assets/admin/libs/sweetalert2/sweetalert2.min.js"></script>
    <script type="text/javascript">
        var url = window.location;
		// for sidebar menu but not for treeview submenu
		$('ul.sidebar-menu a').filter(function() {
			return this.href == url;
		}).parent().siblings().removeClass('active').end().addClass('active');
		// for treeview which is like a submenu
		$('ul.treeview-menu a').filter(function() {
			return this.href == url;
		}).parentsUntil(".sidebar-menu > .treeview-menu").siblings().removeClass('active menu-open').end().addClass('active menu-open');
		
		$('.data_table').DataTable();
		$('.data_table_1').dataTable({
			dom: 'Bfrtip',
			buttons: [
				'copy',
				'csv',
				'excel',
				'pdf',
					{
						extend: 'print',
						exportOptions: {
							modifier: {
								selected: null
							}
						}
					}
			],
			select: true,
		});
		$('.select2').select2();
		
		$('input').attr("autocomplete", "off");
    </script>
  </body>
</html>
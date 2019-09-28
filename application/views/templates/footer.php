<!-- jQuery -->
<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?=base_url()?>assets/plugins/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src=".<?=base_url()?>assets/plugins/raphael/raphael.min.js"></script>
<script src="<?=base_url()?>assets/plugins/morrisjs/morris.min.js"></script>
<script src="<?=base_url()?>assets/data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?=base_url()?>assets/js/sb-admin-2.js"></script>

<script>
	$(window).bind("load", function() {
		window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function(){
				$(this).remove();
			});
		}, 4000);
	});
</script>

</body>

</html>

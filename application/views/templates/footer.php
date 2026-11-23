<!-- jQuery -->
<script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap core JavaScript -->
<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript -->
<script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

<script>
	$(window).on("load", function() {
		window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function(){
				$(this).remove();
			});
		}, 4000);
	});
</script>

</body>

</html>

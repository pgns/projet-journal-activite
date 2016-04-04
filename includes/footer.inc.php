
		<!-- Scripts -->
			<!--<script src="../assets/js/jquery.min.js"></script>-->
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>
			
			<script type="text/javascript">
			$(document).ready(function() {
				$(".fancybox-a").click(function() {
					 $.ajax({
					 type: "POST",
					 cache: false,
					 url: 'CandidatRenseigneActivites.ctrl.php',
					 //data: 
					 success: function (data) {
						$.fancybox(data, {
							fitToView: false,
							width: 1100,
							height: 450,
							autoSize: false,
							closeClick: false,
							openEffect: 'none',
							closeEffect: 'none',
							'onClosed': function() {
								parent.location.reload(true);
							} 
						});}
					});
				});
			});
		</script>

	</body>
</html>

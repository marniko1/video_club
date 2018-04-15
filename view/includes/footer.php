			</div>
		</div>
	<script type="text/javascript">
		$(document).ready(function() {
		  $('li.active').removeClass('active');
		  $('a[href="' + location.pathname + '"]').closest('li').addClass('active'); 
		});
		// $(document).on('click', '.pagination a', function(e) {
		//     e.preventDefault();
		//     var page = $(this).attr("href");
		//     $('.table-holder').empty();
		//     $('.table-holder').load('<?php echo INCL_PATH; ?>Rentals/'+ page +' table');
		// });
	</script>
	</body>
</html>
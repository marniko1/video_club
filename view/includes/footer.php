			</div>
		</div>
	<script type="text/javascript">
		$(document).ready(function() {
		  	$('li.active').removeClass('active');
		  	$('a[href="' + location.pathname + '"]').parent('li').addClass('active'); 
		});
		$(document).ready(function() {
			var first_pagination_link = document.querySelectorAll('.pagination li a');
			$(first_pagination_link[1]).parent('li').addClass('active');
		});
	</script>
	</body>
</html>
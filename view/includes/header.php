<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $this->data['title']; ?></title>
		<link rel="stylesheet" type="text/css" href="<?php  echo INCL_PATH.'assets/css/bootstrap.css'?>">
		<link rel="stylesheet" type="text/css" href="<?php  echo INCL_PATH.'assets/css/main.css'?>">
		<script type="text/javascript" src="<?php  echo INCL_PATH.'assets/js/jquery-3.3.1.js'?>"></script>
		<script type="text/javascript" src="<?php  echo INCL_PATH.'assets/js/bootstrap.js'?>"></script>
		<script type="text/javascript" src="<?php  echo INCL_PATH.'assets/js/AjaxFilterAndPagination.js'?>"></script>
		<script type="text/javascript">
			window.onload = function() {
				var controller = window.location.href.split('/').reverse()[1];
				var filter = document.getElementById('filter');
				var pagination_links = document.querySelectorAll(".pagination li a");
				var ajax = new FilterAndPagination(filter, pagination_links, controller);
			}
		</script>
	</head>
	<body>
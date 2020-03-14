<!DOCTYPE html>
<html>
        <head>
          	<meta charset="UTF-8">
        	<title>title</title>
			<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/bootstrap/css/bootstrap.css"/>
			<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/static/custom_css/style.css"/>
			<script src="<?php echo base_url();?>/assets/bootstrap/js/bootstrap.js"></script>
			<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        </head>
        <body>
			<div class="navbar navbar-expand-lg navbar-light bg-dark">
				<a class="navbar-brand">StrawPoll</a>
			</div>
			<?php $ci->load->view($view);?>
        </body>
</html>

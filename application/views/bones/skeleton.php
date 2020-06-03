<!DOCTYPE html>
<html>
        <head>
          	<meta charset="UTF-8">
        	<title>title</title>
			<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
			<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/bootstrap/css/bootstrap.css"/>
			<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/static/custom_css/style.css"/>
			<script src="<?php echo base_url();?>/assets/bootstrap/js/bootstrap.js"></script>
			<script type="text/javascript" src="<?php echo base_url();?>/assets/js/Chart.js"></script>
			<script type="text/javascript" src="<?php echo base_url();?>/assets/js/index.js"></script>
        </head>
        <body>
			<div class="navbar navbar-expand-lg navbar-light bg-dark">
				<a class="navbar-brand">StrawPoll</a>
			</div>
			<?php foreach($results->result() as $row): ?>
				<?php $ci->load->view("menus/main", $row); ?>
			<?php endforeach; ?>
        </body>
</html>

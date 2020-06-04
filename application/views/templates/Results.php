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
			<?php $ci->load->view("menus/menubar");?>
			<h1 class="heading">Results</h1>
			<div class="resultsAlign">
				<?php foreach($data as $row): ?>
        			<h1><?php echo $row["name"];?></h1>        
                    <h1><?php echo $row["left"];?>: <?php echo $row["resLeft"];?></h1>
                    <h1><?php echo $row["right"];?>: <?php echo $row["resRight"];?></h1>
				<?php endforeach; ?>
			</div>
        </body>
</html>

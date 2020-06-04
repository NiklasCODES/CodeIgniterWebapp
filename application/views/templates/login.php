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
        	<?php if(isset($_SESSION)) {
                echo $this->session->flashdata('flash_data');
            } ?>
                	<form action="<?php site_url();?>login" method="post" class="form-horizontal">
                		<div class="form-group">
                			<label class="col-sm-1 control-label">Username:</label>
                			<div class="col-sm-11">
                				<input type="text" class="form-control" name="username" />
                			</div>
                		</div>
                        <div class="form-group">
                        	<label class="col-sm-1 control-label">Password:</label>
                            <div class="col-sm-11">
                            	<input type="text" class="form-control" name="password" />
                    		</div>
                		</div>
                		<div class="form-group">
                			<div class="col-sm-offset-1 col-sm-12">
                				<button type="submit" type="button" class="btn btndefault">Login</button>
                			</div>
                		</div>
                	</form>
        </body>
</html>

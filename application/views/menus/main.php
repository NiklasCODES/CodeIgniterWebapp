<!-- <img class="imageContainer center" src="<?php echo base_url();?>/assets/static/images/voting.jpg"/> -->
<h1 class="heading"><?php echo $name ?></h1>
<div class="btnBox">
	<button id="leftBtn" class="btn btn-dark left" ><?php echo $left?></button>
	<p class="margin-lr-10">or</p>
    <button id="rightBtn" class="btn btn-dark right"><?php echo $right?></button>
</div>
<h1 id="countDown"></h1>
<canvas id="myChart" width="250" height="100"></canvas>


<div class="container body">
	<div class="content">
		<div class="row">
			<div class="span9">
				<!--nocache-->
				<?php 
				echo $this->Session->flash();
				echo $this->Session->flash('auth', array('element' => 'info'));
				?>
				<!--/nocache-->
				<?php echo $this->fetch('content');?>
			</div>
			<div class="span3">
				<?php echo $this->fetch('sidebar');?>
			</div>
		</div>
	</div>
</div>
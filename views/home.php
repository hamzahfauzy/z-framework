<?php 
use vendor\zframework\Session;
$this->load("partial.header");
$this->load("partial.navbar") ?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h2>Home</h2>
			<?php if(Session::get('id')){ ?>

			<pre>
				<?php print_r(Session::user()); ?>
			</pre>
			<form method="post" action="<?= base_url() ?>/logout">
				<button class="btn btn-warning"><i class="fa fa-sign-out"></i> Log Out</button>
			</form>
			<?php }else{ ?>
			<pre>
				<?php 
				foreach ($users as $key => $value) {
					$posts = $value->posts();
					print_r($posts);
				} 
				?>
			</pre>
			<?php } ?>
		</div>
	</div>
</div>
<?php $this->load("partial.footer") ?>

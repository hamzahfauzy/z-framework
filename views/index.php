<?php $this->load("partial.header") ?>
<h2>Hello World</h2>
<form method="post" action="<?=$this->route('/posthandle');?>">
	<input type="hidden" name="data" value="ini data">
	<button>Submit</button>
</form>
<?php $this->load("partial.footer") ?>
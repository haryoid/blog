<?php /**if (count($errors) > 0) {
	foreach ($errors as $error) { ?>
	echo "$error". "<br>";
}
}	
 **/?>
<?php if (count($errors) > 0): ?>
	<?php foreach ($errors as $error): ?>
		<div class="alert alert-warning alert-dismissible fade show">
    		<strong><?php echo "$error"; ?></strong>
    		<button type="button" class="close" data-dismiss="alert">&times;</button><br>
		</div>
	<?php endforeach ?>
<?php endif ?>
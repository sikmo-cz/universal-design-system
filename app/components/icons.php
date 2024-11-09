<?php

	$icon_list = $CL->get_list_of_icons( 'icons' );

	if( ! $icon_list ) 
	{
		return false;
	}

	$CL->load( 'input/text', [], true );

	foreach( (array) $icon_list as $filename => $filepath ) 
	{
?>
<div class="col-4 col-lg-2">
	<div class="icon-tile" data-icon="<?php echo $filename; ?>">
		<img loading="lazy" src="<?php echo $filepath; ?>" alt="<?php echo $filename; ?>">
		<p ><?php echo $filename; ?></p>
	</div>
</div>
<?php } ?>
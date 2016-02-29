<?php
	$attachments = array(
		'post_type' => 'attachment',
		'post_status' => array('publish', 'draft', 'inherit'),
		'numberposts' => -1,
		'posts_per_page' => 10,
		'paged' => $paged,
	);
	query_posts($attachments);

	if (have_posts()) : while (have_posts()) : the_post();
?>

CODE TO DISPLAY YOUR ATTACHMENT

<?php endwhile; else: ?>

NO ATTACHMENTS

<?php endif; ?>
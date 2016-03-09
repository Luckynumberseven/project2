<?php get_header(); ?>
<?php flat_hook_index_before(); ?>
<div id="content" class="site-content hentry" role="main">
	<?php flat_hook_index_top(); ?>
	<header class="entry-header">
		<h2 class="entry-title" itemprop="name">Elever</h2>
	</header>
<?php
$args1 = array(
	'role' => 'student',
	'orderby' => 'user_nicename',
	'order' => 'ASC'
);
$students = get_users($args1);
?>

<?php
foreach ($students as $user) {
	$groups_user = new Groups_User( $user->ID );
	$user_groups = $groups_user->groups;

	$class_info = "";
			
	foreach ($user_groups as $group) {
		if ($group->name != 'Students' && $group->name != NULL) {
			$class_info .=  
					'<div class="entry-content hentry" itemprop="articleBody">
					<b>' . esc_html($user->display_name) . '</b> ['. esc_html($user->user_email) . ']<br>'.
					get_avatar(esc_html($user->ID)). '<br>
					<b>Om mig: </b>'.esc_html($user->description).'<br>
					<b>Klass: </b>' . $group->name .'<br><br></div>';
		}
	}
	echo $class_info;
}

?>
<?php flat_hook_index_bottom(); ?>
</div>
<?php flat_hook_index_after(); ?>
<?php get_footer(); ?>